<section
    class="section light"
    id="enquire"
    aria-labelledby="enq-title"
    data-sticky-until
>
    <div class="wrap lead-panel">

        <div class="rv">
            <p class="eyebrow">
                {{ $campaignEnquiry?->eyebrow
                    ?? 'Request the private brief' }}
            </p>

            <h2 style="margin-top:20px">
                {{ $campaignEnquiry?->title
                    ?? 'Receive pricing, plans and' }}

                @if (
                    filled($campaignEnquiry?->highlighted_title)
                    || ! $campaignEnquiry
                )
                    <em class="disp-em">
                        {{ $campaignEnquiry?->highlighted_title
                            ?? 'founding terms.' }}
                    </em>
                @endif
            </h2>

            @if (
                filled($campaignEnquiry?->description)
                || ! $campaignEnquiry
            )
                <p
                    class="lede"
                    style="margin-top:18px"
                >
                    {{ $campaignEnquiry?->description
                        ?? 'Complete the form to receive current residence availability, founding-release pricing, floor plans, payment schedules, and the project service charter.' }}
                </p>
            @endif

            @if (
                filled($siteSettings?->cairo_phone)
                || filled($siteSettings?->dubai_phone)
            )
                <p class="form-note">
                    Prefer to speak directly?

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

            <input
                type="hidden"
                name="source"
                value="campaign-short"
            >

            <input
                type="hidden"
                name="contact_method"
                value="phone"
            >
            @if (filled($campaignEnquiry?->form_title))
                <h3 style="margin-bottom:24px">
                    {{ $campaignEnquiry->form_title }}
                </h3>
            @endif
            <div class="form-grid">

                <div class="field full">
                    <label for="cf-name">
                        Full name
                        <span class="req" aria-hidden="true">*</span>
                    </label>

                    <input
                        id="cf-name"
                        name="full_name"
                        type="text"
                        autocomplete="name"
                        placeholder="Your full name"
                        required
                    >

                    <span class="err" role="alert">
                        Enter your full name.
                    </span>
                </div>

                <div class="field">
                    <label for="cf-phone">
                        Phone
                        <span class="req" aria-hidden="true">*</span>
                    </label>

                    <input
                        id="cf-phone"
                        name="phone"
                        type="tel"
                        autocomplete="tel"
                        placeholder="+20 · +971 · …"
                        required
                    >

                    <span class="err" role="alert">
                        Enter a valid phone number.
                    </span>
                </div>

                <div class="field">
                    <label for="cf-email">
                        Email
                        <span class="req" aria-hidden="true">*</span>
                    </label>

                    <input
                        id="cf-email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        placeholder="name@example.com"
                        required
                    >

                    <span class="err" role="alert">
                        Enter a valid email address.
                    </span>
                </div>

                <div class="field full">
                    <label for="cf-interest">
                        Interested in
                        <span class="req" aria-hidden="true">*</span>
                    </label>

                    <select
                        id="cf-interest"
                        name="interest"
                        required
                    >
                        <option value="" selected>
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
                    </select>

                    <span class="err" role="alert">
                        Choose a collection.
                    </span>
                </div>

                <div
                    class="hp-field"
                    aria-hidden="true"
                >
                    <label for="cf-hp">
                        Company website
                    </label>

                    <input
                        id="cf-hp"
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
                style="
                    margin-top: 28px;
                    width: 100%;
                "
            >
                <span
                    class="spinner"
                    aria-hidden="true"
                ></span>

                <span class="btn-label">
                    {{ $campaignEnquiry?->submit_button_text
                        ?? 'Send my request' }}
                </span>
            </button>

            <div
                class="form-status"
                role="status"
                aria-live="polite"
            ></div>

            @if (
                filled($campaignEnquiry?->privacy_text)
                || ! $campaignEnquiry)
                <p class="form-note">
                    {{ $campaignEnquiry?->privacy_text
                        ?? 'Your details will only be used to respond to your enquiry and provide information about Meridian One. They will not be shared with third parties.' }}
                </p>
            @endif
        </form>

    </div>
</section>
