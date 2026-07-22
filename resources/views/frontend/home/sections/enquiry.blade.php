
    <section
        class="section light"
        id="enquire"
        aria-labelledby="enq-title"
    >
        <div class="wrap lead-panel">

            <div class="rv">
                <p class="eyebrow">
                    {{ $homeEnquiry?->eyebrow
                        ?? 'Private enquiries' }}
                </p>

                <h2
                    id="enq-title"
                    style="margin-top:20px"
                >
                    {{ $homeEnquiry?->title
                        ?? 'Request the private' }}

                    @if (
                        filled($homeEnquiry?->highlighted_title)
                        || ! $homeEnquiry
                    )
                        <em class="disp-em">
                            {{ $homeEnquiry?->highlighted_title
                                ?? 'brief.' }}
                        </em>
                    @endif
                </h2>

                @if (
                    filled($homeEnquiry?->description)
                    || ! $homeEnquiry
                )
                    <p
                        class="lede"
                        style="margin-top:18px"
                    >
                        {{ $homeEnquiry?->description
                            ?? "The brief includes floor plans, founding-release pricing, payment schedules, and the operator's service charter. A senior advisor — not a call centre — will reply within one business day." }}
                    </p>
                @endif

                <div class="stat-row">
                    <div>
                        <strong>1 day</strong>
                        <span>Advisor response</span>
                    </div>

                    <div>
                        <strong>0</strong>
                        <span>Obligation, ever</span>
                    </div>
                </div>

                @if (
                    filled($siteSettings?->cairo_phone)
                    || filled($siteSettings?->dubai_phone)
                )
                    <p class="form-note">
                        Prefer to speak first?

                        @if (filled($siteSettings?->cairo_phone))
                            Cairo desk
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSettings->cairo_phone) }}">
                                {{ $siteSettings->cairo_phone }}
                            </a>
                        @endif

                        @if (
                            filled($siteSettings?->cairo_phone)
                            && filled($siteSettings?->dubai_phone)
                        )
                            ·
                        @endif

                        @if (filled($siteSettings?->dubai_phone))
                            Dubai desk
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $siteSettings->dubai_phone) }}">
                                {{ $siteSettings->dubai_phone }}
                            </a>
                        @endif
                    </p>
                @endif
            </div>

        <form
            class="rv rv-d1"
            id="lead-form"
            action="{{ route('leads.store') }}"
            method="POST"
            data-success-url="{{ route('thank-you') }}"
            novalidate
        >
            @csrf
            @if (filled($homeEnquiry?->form_title))
                <h3 style="margin-bottom:24px">
                    {{ $homeEnquiry->form_title }}
                </h3>
            @endif
            <div class="form-grid">

                <div class="field">
                    <label for="lf-name">
                        Full name
                        <span
                            class="req"
                            aria-hidden="true"
                        >*</span>
                    </label>

                    <input
                        id="lf-name"
                        name="full_name"
                        type="text"
                        autocomplete="name"
                        placeholder="Your full name"
                        required
                    >

                    <span
                        class="err"
                        role="alert"
                    >
                        Enter your full name.
                    </span>
                </div>

                <div class="field">
                    <label for="lf-phone">
                        Phone
                        <span
                            class="req"
                            aria-hidden="true"
                        >*</span>
                    </label>

                    <input
                        id="lf-phone"
                        name="phone"
                        type="tel"
                        autocomplete="tel"
                        placeholder="+20 · +971 · …"
                        required
                    >

                    <span
                        class="err"
                        role="alert"
                    >
                        Enter a valid phone number.
                    </span>
                </div>

                <div class="field full">
                    <label for="lf-email">
                        Email
                        <span
                            class="req"
                            aria-hidden="true"
                        >*</span>
                    </label>

                    <input
                        id="lf-email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        placeholder="name@example.com"
                        required
                    >

                    <span
                        class="err"
                        role="alert"
                    >
                        Enter a valid email address.
                    </span>
                </div>

                <div class="field">
                    <label for="lf-interest">
                        Interested in
                        <span
                            class="req"
                            aria-hidden="true"
                        >*</span>
                    </label>

                    <select
                        id="lf-interest"
                        name="interest"
                        required
                    >
                        <option
                            value=""
                            selected
                        >
                            Select a collection
                        </option>

                        <option value="river-suites">
                            River Suites — 1BR
                        </option>

                        <option value="corniche-residences">
                            Corniche Residences — 2–3BR
                        </option>

                        <option value="sky-residences">
                            Sky Residences — 3–4BR
                        </option>

                        <option value="crescent-penthouses">
                            The Crescent Penthouses
                        </option>

                        <option value="other">
                            Advising a client / other
                        </option>
                    </select>

                    <span
                        class="err"
                        role="alert"
                    >
                        Choose a collection.
                    </span>
                </div>

                <div class="field">
                    <label for="lf-budget">
                        Budget range

                        <span
                            class="small"
                            style="
                                text-transform: none;
                                letter-spacing: 0;
                                font-weight: 400;
                            "
                        >
                            (optional)
                        </span>
                    </label>

                    <select
                        id="lf-budget"
                        name="budget"
                    >
                        <option
                            value=""
                            selected
                        >
                            Prefer not to say
                        </option>

                        <option value="15-30m">
                            EGP 15 – 30M
                        </option>

                        <option value="30-60m">
                            EGP 30 – 60M
                        </option>

                        <option value="60m-plus">
                            EGP 60M +
                        </option>

                        <option value="usd-equivalent">
                            USD equivalent
                        </option>
                    </select>
                </div>

                <div class="field">
                    <label for="lf-contact">
                        Preferred contact
                    </label>

                    <select
                        id="lf-contact"
                        name="contact_method"
                    >
                        <option
                            value="phone"
                            selected
                        >
                            Phone call
                        </option>

                        <option value="whatsapp">
                            WhatsApp
                        </option>

                        <option value="email">
                            Email
                        </option>
                    </select>
                </div>

                <div class="field full">
                    <label for="lf-message">
                        Message

                        <span
                            class="small"
                            style="
                                text-transform: none;
                                letter-spacing: 0;
                                font-weight: 400;
                            "
                        >
                            (optional)
                        </span>
                    </label>

                    <textarea
                        id="lf-message"
                        name="message"
                        rows="3"
                        placeholder="Anything the advisor should prepare before calling"
                    ></textarea>
                </div>

                <div
                    class="hp-field"
                    aria-hidden="true"
                >
                    <label for="lf-company-website">
                        Company website
                    </label>

                    <input
                        id="lf-company-website"
                        name="company_website"
                        type="text"
                        tabindex="-1"
                        autocomplete="off"
                    >
                </div>

            </div>

            <button
                class="btn btn-crimson btn-arrow"
                type="submit"
                style="margin-top: 28px"
            >
                <span
                    class="spinner"
                    aria-hidden="true"
                ></span>

                <span class="btn-label">
                {{ $homeEnquiry?->submit_button_text
                    ?? 'Send my request' }}
                </span>
            </button>

            <div
                class="form-status"
                role="status"
                aria-live="polite"
            ></div>

            @if (
                filled($homeEnquiry?->privacy_text)
                || ! $homeEnquiry)
                <p class="form-note">
                    {{ $homeEnquiry?->privacy_text
                        ?? 'By sending this request you agree to be contacted about Meridian One. Your details are never shared with third parties.' }}
                </p>
            @endif
        </form>

    </div>
</section>
