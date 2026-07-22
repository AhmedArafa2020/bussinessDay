/* ============================================================
   MERIDIAN ONE — shared behaviour
   nav · scroll reveals · parallax · lightbox · lead form
   ============================================================ */
(function () {
  "use strict";

  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ---------- header ---------- */
  var header = document.querySelector(".site-header");
  if (header) {
    var onScroll = function () {
      header.classList.toggle("scrolled", window.scrollY > 40);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    var toggle = header.querySelector(".nav-toggle");
    if (toggle) {
      toggle.addEventListener("click", function () {
        var open = header.classList.toggle("menu-open");
        toggle.setAttribute("aria-expanded", open ? "true" : "false");
        document.body.style.overflow = open ? "hidden" : "";
      });
      header.querySelectorAll(".nav a").forEach(function (a) {
        a.addEventListener("click", function () {
          header.classList.remove("menu-open");
          toggle.setAttribute("aria-expanded", "false");
          document.body.style.overflow = "";
        });
      });
    }
  }

  /* ---------- scroll reveals ---------- */
  var revealed = document.querySelectorAll(".rv");
  if ("IntersectionObserver" in window && !reduceMotion) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("in");
            io.unobserve(e.target);
          }
        });
      },
      { threshold: 0.14, rootMargin: "0px 0px -6% 0px" }
    );
    revealed.forEach(function (el) { io.observe(el); });
  } else {
    revealed.forEach(function (el) { el.classList.add("in"); });
  }

  /* ---------- gentle parallax on interlude images ---------- */
  var plx = document.querySelectorAll("[data-parallax]");
  if (plx.length && !reduceMotion) {
    var raf = null;
    var apply = function () {
      raf = null;
      var vh = window.innerHeight;
      plx.forEach(function (img) {
        var r = img.parentElement.getBoundingClientRect();
        if (r.bottom < 0 || r.top > vh) return;
        var p = (r.top + r.height / 2 - vh / 2) / vh; // -0.5 … 0.5
        img.style.transform = "translateY(" + (p * -36).toFixed(1) + "px)";
      });
    };
    window.addEventListener("scroll", function () {
      if (!raf) raf = requestAnimationFrame(apply);
    }, { passive: true });
    apply();
  }

  /* ---------- lightbox ---------- */
  var lb = document.querySelector(".lightbox");
  if (lb) {
    var lbImg = lb.querySelector("img");
    var lbCap = lb.querySelector("figcaption");
    var lastFocus = null;

    var openLB = function (src, cap) {
      lbImg.src = src;
      lbCap.textContent = cap || "";
      lb.classList.add("open");
      document.body.style.overflow = "hidden";
      lastFocus = document.activeElement;
      lb.querySelector(".lightbox-close").focus();
    };
    var closeLB = function () {
      lb.classList.remove("open");
      document.body.style.overflow = "";
      if (lastFocus) lastFocus.focus();
    };

    document.querySelectorAll(".gallery figure").forEach(function (fig) {
      fig.setAttribute("tabindex", "0");
      fig.setAttribute("role", "button");
      var act = function () {
        var img = fig.querySelector("img");
        openLB(img.dataset.full || img.src, fig.querySelector("figcaption") && fig.querySelector("figcaption").textContent);
      };
      fig.addEventListener("click", act);
      fig.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") { e.preventDefault(); act(); }
      });
    });
    lb.querySelector(".lightbox-close").addEventListener("click", closeLB);
    lb.addEventListener("click", function (e) { if (e.target === lb) closeLB(); });
    document.addEventListener("keydown", function (e) { if (e.key === "Escape") closeLB(); });
  }

  /* ---------- sticky CTA (short lander) ---------- */
  var sticky = document.querySelector(".sticky-cta");
  var stickyAnchor = document.querySelector("[data-sticky-until]");
  if (sticky && stickyAnchor) {
    window.addEventListener("scroll", function () {
      var past = window.scrollY > window.innerHeight * 0.6;
      var before = stickyAnchor.getBoundingClientRect().top > window.innerHeight;
      sticky.classList.toggle("on", past && before);
    }, { passive: true });
  }

  /* ==========================================================
     LEAD FORM
     POSTs JSON to the endpoint in data-endpoint (default /api/leads),
     then redirects to data-redirect (default thank-you.html).
     Swap the endpoint by editing the data-endpoint attribute only.
     ========================================================== */
  document.querySelectorAll("form[data-lead-form]").forEach(function (form) {
    var endpoint = form.dataset.endpoint || "/api/leads";
    var redirect = form.dataset.redirect || "thank-you.html";
    var statusBox = form.querySelector(".form-status");
    var submitBtn = form.querySelector('button[type="submit"]');

    var setInvalid = function (field, invalid) {
      var wrap = field.closest(".field");
      if (!wrap) return;
      wrap.classList.toggle("invalid", invalid);
      field.setAttribute("aria-invalid", invalid ? "true" : "false");
    };

    var validators = {
      fullName: function (v) { return v.trim().length >= 2; },
      phone: function (v) { return /^[+\d][\d\s\-()]{6,19}$/.test(v.trim()); },
      email: function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim()); },
      interest: function (v) { return v !== ""; }
    };

    // live re-validation once a field has been touched
    form.querySelectorAll("input,select,textarea").forEach(function (f) {
      f.addEventListener("blur", function () {
        if (validators[f.name]) setInvalid(f, !validators[f.name](f.value));
      });
      f.addEventListener("input", function () {
        if (f.closest(".field") && f.closest(".field").classList.contains("invalid") && validators[f.name]) {
          setInvalid(f, !validators[f.name](f.value));
        }
      });
    });

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      statusBox.className = "form-status";
      statusBox.textContent = "";

      // honeypot: bots fill it, humans never see it
      var hp = form.querySelector('[name="company_website"]');
      if (hp && hp.value !== "") return; // silently drop

      var ok = true;
      var firstBad = null;
      Object.keys(validators).forEach(function (name) {
        var f = form.elements[name];
        if (!f) return;
        var valid = validators[name](f.value);
        setInvalid(f, !valid);
        if (!valid) { ok = false; firstBad = firstBad || f; }
      });
      if (!ok) { firstBad.focus(); return; }

      var payload = {
        fullName: form.elements.fullName.value.trim(),
        phone: form.elements.phone.value.trim(),
        email: form.elements.email.value.trim(),
        interest: form.elements.interest.value,
        budget: form.elements.budget ? form.elements.budget.value : null,
        contactMethod: form.elements.contactMethod ? form.elements.contactMethod.value : null,
        message: form.elements.message ? form.elements.message.value.trim() : "",
        source: form.dataset.source || "long-landing",
        page: location.pathname,
        locale: document.documentElement.lang || "en",
        submittedAt: new Date().toISOString()
      };

      submitBtn.disabled = true;
      submitBtn.classList.add("loading");

      fetch(endpoint, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
      })
        .then(function (res) {
          if (!res.ok) throw new Error("HTTP " + res.status);
          return res.json().catch(function () { return {}; });
        })
        .then(function () {
          window.location.href = redirect;
        })
        .catch(function () {
          submitBtn.disabled = false;
          submitBtn.classList.remove("loading");
          statusBox.className = "form-status error";
          statusBox.textContent =
            "The request didn't go through. Check your connection and try again, or call +20 2 0000 0000.";
        });
    });
  });
})();
