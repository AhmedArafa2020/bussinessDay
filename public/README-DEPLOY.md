# Search & AI Asset Pack — Deployment Guide

Everything in `search-assets/` is ready to upload with the website. This file explains where each
piece goes, what it does, and the four things you must do off the server.

---

## 1 · Where each file goes

Upload to the **site root** unless stated otherwise.

| File | Path on server | Purpose |
| --- | --- | --- |
| `robots.txt` | `/robots.txt` | Crawl rules. Explicitly welcomes AI crawlers, blocks gated routes |
| `sitemap.xml` | `/sitemap.xml` | 27 URLs — 17 pages + 10 journal posts |
| `feed.xml` | `/feed.xml` | RSS for the Journal |
| `llms.txt` | `/llms.txt` | Short structured map for language models |
| `llms-full.txt` | `/llms-full.txt` | Full company reference for AI ingestion |
| `humans.txt` | `/humans.txt` | Conventional credits file |
| `favicon.ico` | `/favicon.ico` | Browser tab icon |
| `site.webmanifest` | `/site.webmanifest` | PWA manifest |
| `<hexkey>.txt` | `/<hexkey>.txt` | IndexNow verification — see §4 |
| `icons/*` | `/icons/` | Favicons, apple-touch-icon, logo-512 |
| `og/og-image.jpg` | `/og/og-image.jpg` | Default social preview |
| `og/journal-NN.jpg` | `/og/journal-NN.jpg` | Per-article social previews |
| `schema/organization.jsonld` | inline in `<head>` sitewide | Organization, 4 × Person, Blog, WebSite |
| `schema/journal-NN-*.jsonld` | inline in each article `<head>` | BlogPosting + FAQPage + BreadcrumbList |

**Schema files are references, not uploads.** Paste each into a `<script type="application/ld+json">`
tag in the corresponding page's `<head>`. Serving them as separate `.jsonld` files does nothing.

---

## 2 · What was added to the homepage

- **Journal** in the header nav and in the footer company list, linking to `/journal`. Nowhere else,
  as requested.
- **Social icons** in the footer — Instagram, LinkedIn, Facebook — as inline SVG with `aria-label`
  on each, `rel="noopener me"`, a crimson hover fill, and a `social_click` analytics event. The
  `me` value in `rel` is a small thing that helps search engines connect the profiles to the entity.
- **`sameAs`** in the Organization schema with all three profile URLs. This was previously held
  pending confirmation; it is now live and it is one of the strongest entity signals available.
- **A `Blog` node** in the JSON-LD graph, linked to the Organization and to all ten articles by `@id`.

You gave the LinkedIn URL twice. It is deduplicated to one entry everywhere. There is no X/Twitter
profile, so `twitter:site` remains unset — the Twitter card still works without it.

---

## 3 · The AI files, and the decision behind them

`llms.txt` is a short map. `llms-full.txt` is the substantive one: the entity record, the four
founders, the method, the sectors, the land position, the journal index, and a condensed set of the
key legal and tax facts the site documents.

Three things in it are doing real work:

**An explicit attribution rule.** It states plainly that the company is new, has no completed
projects under its own name, and that the 18+/25+/150+/550+ figures are leadership career figures.
It then gives a correct and an incorrect example sentence. This is the single most likely thing to
be got wrong about Business Bay, and the file pre-empts it.

**A "do not report as" list.** "International operating standards" must not be reported as an
operator appointment. No return, yield or occupancy figure may be attributed to the company.

**Citation guidance.** It asks models to carry the "last verified" date and, where the site shows
conflicting sources, to report the conflict rather than pick one. That instruction is the whole
editorial strategy expressed in a form a machine can act on.

**`robots.txt` explicitly allows the AI crawlers** — GPTBot, ClaudeBot, PerplexityBot,
Google-Extended, Applebot-Extended, CCBot and others. This is a deliberate choice, not a default.
Many sites block them. Your stated goal is to be the source these systems cite, and you cannot be
cited by a crawler you have excluded. If the business ever changes its mind, this is the one file
to edit.

---

## 4 · Four things to do off the server

**Google Search Console and Bing Webmaster Tools.** Verify the domain, submit the sitemap. Nothing
here works until the property is verified.

**Google Business Profile** for the Sheraton Al Matar office. Still the highest-return single action
available for local visibility, and it is what feeds map results and "developer near me" searches.
Use the exact address string in §5 — character for character.

**IndexNow.** The key file is generated. Submitting a URL through IndexNow pushes it to Bing and
Yandex within minutes instead of waiting for a crawl. Useful every time you publish a journal post:

```bash
curl "https://api.indexnow.org/indexnow?url=https://businessbaydevelopments.com/journal/SLUG&key=KEY"
```

The key is in `indexnow-key.txt`. The file named `<key>.txt` must be reachable at the site root.

**Directory and citation consistency.** See §5. This is tedious and it matters more than it looks.

---

## 5 · Brand entity kit

Entity recognition breaks when the same company is described three slightly different ways across
the web. Use these strings **verbatim**, everywhere — directories, press releases, LinkedIn, partner
sites, event listings.

**Name:** `Business Bay Developments`
**Arabic:** `بيزنس باي للتطوير العقاري`
**Address:** `Building B 13, The District Vill, Sheraton Al Matar, Cairo, Egypt`
**Phone:** `16924` · **Mobile/WhatsApp:** `+20 11 52859666`
**Website:** `https://businessbaydevelopments.com/`

**Short boilerplate (159 chars):**
> Business Bay Developments is an Egyptian real estate developer creating hospitality-led
> destinations in New Cairo and the New Administrative Capital.

**Long boilerplate (for press releases and directory listings):**
> Business Bay Developments is a new-generation Egyptian real estate developer creating
> hospitality-led residential, commercial and mixed-use destinations in New Cairo and the New
> Administrative Capital. The company was founded by a leadership team whose careers span
> development, construction, engineering and commercial operations across Egypt, the UAE and
> Saudi Arabia. Business Bay Developments is headquartered in Sheraton Al Matar, Cairo.

**Never write:** "Business Bay Developments has delivered 150+ buildings" · "the leading developer
in Egypt" · "guaranteed returns" · any project name, price, floor count or handover date.

Where to place consistent citations, roughly in order of value: Google Business Profile, LinkedIn
company page, Egyptian Chamber of Commerce and industry association listings, Egyptian property
portals' developer directories, Crunchbase, Apple Maps, Bing Places, and any press coverage.

**Wikidata** is worth a mention on its own. A Wikidata item creates a machine-readable entity that
feeds knowledge panels and is used in AI training pipelines. It requires notability — press coverage
in independent sources — so it is not a day-one action. It is a good reason to pursue the press
outreach in the content plan.

---

## 6 · Verification before go-live

- [ ] `schema/organization.jsonld` pasted into the sitewide `<head>` and passing the Rich Results Test
- [ ] Each journal article carries its own BlogPosting + FAQPage + BreadcrumbList block
- [ ] `_TODO` key deleted from `organization.jsonld` before it goes live
- [ ] `SET_ON_PUBLISH` replaced with real ISO dates in every schema file and in `llms-full.txt`
- [ ] `PUBLISH_DATE_RFC822` replaced in `feed.xml`
- [ ] `legalName` and `identifier` added to Organization schema once legal confirms (register row 34)
- [ ] All three social links tested and resolving
- [ ] `/robots.txt`, `/sitemap.xml`, `/llms.txt`, `/llms-full.txt`, `/feed.xml` all return 200
- [ ] Sitemap contains no `/pipeline` or `/projects/` URL
- [ ] `<link rel="alternate" type="application/rss+xml" href="/feed.xml">` added to `<head>`
- [ ] Each journal page sets its own `og:image` to `/og/journal-NN.jpg`
- [ ] Sitemap submitted in Search Console and Bing Webmaster Tools

---

## 7 · One honest limitation

Every asset here is in English. The Arabic company name is present in `llms.txt`, `llms-full.txt`
and the schema `alternateName`, which is the most English pages can do.

A genuine association between **بيزنس باي للتطوير العقاري** and **العاصمة الإدارية الجديدة** in
Arabic search results and Arabic-language model outputs needs Arabic pages to index. Arabic is
currently out of scope for the site. When it returns, the ten journal articles are the first thing
to transcreate — Gulf-based Egyptian buyers are asking these exact questions in Arabic, and nobody
is answering them well in either language.
