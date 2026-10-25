# Laravel Multi-Vendor Marketplace

[![CI](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/ci.yml/badge.svg)](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/ci.yml)
[![Dependency security audit](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/security-audit.yml/badge.svg)](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/security-audit.yml)
[![Database and Feature checks](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/database-compatibility.yml/badge.svg)](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/database-compatibility.yml)

A modernized Laravel 13 / Livewire 4 multi-vendor marketplace codebase implementing customer, seller and administrator workflows, products, shopping carts, orders, payment records and notification integrations.

**Reusable commercial marketplace source code — integration and deployment owned by the adopter.** The modernized implementation is on `master`. Teams may use and adapt the project-authored code commercially under Apache-2.0; images, brand names, fonts and other third-party material have separate rights. This repository supplies application code, automated checks and development tooling, **not a turnkey production deployment or certification**. Before accepting real customer data or payments, an adopting operator must implement and verify its own gateway, SMS, authorization, security, infrastructure and complete release tests. See [Commercial integration guide](INTEGRATION_GUIDE.md). An archive banner, if present, means the repository is read-only, not that it was production-certified.

This project is independent of and **not affiliated with, endorsed by, or operated by Digikala**.

![Marketplace UI](img.png)

## Implemented workflows

- Customers: registration, authentication, profiles, addresses, wishlists, product browsing, comparisons, comments, carts, shipping and orders.
- Sellers: registration and seller-facing marketplace routes.
- Administrators: product and commerce management components, payment records and dashboard views.
- Integrations: configurable payment drivers, SMS/email notifications, charts, SEO helpers, file management and Persian/Jalali dates.

These are implemented code paths intended for adaptation and integration, not a claim that each workflow has passed end-to-end commercial acceptance or serves deployed customers.

## Stack and boundaries

PHP 8.4, Laravel 13.38, Livewire 4.4, Jetstream 5.5, Sanctum 4.3, Blade, Eloquent, MySQL 8.4, Vite 8 and Tailwind 4, alongside retained Bootstrap and other UI assets. Payment integration uses Shetabit Multipay; SMS integration uses Kavenegar.

Routes, controllers and Livewire components coordinate Eloquent models and external adapters. Payment callbacks call the configured gateway's verification API with the recorded transaction and amount before changing payment/order state. Those database updates run in a transaction; SMS/email delivery follows the commit.

This is a code-level review of the callback, not proof of complete payment correctness, authorization coverage, concurrency safety or certification against a live gateway. No live payment or notification delivery is claimed.

## Development setup

Start in an isolated local environment with synthetic records and non-production credentials. Before any external deployment, the adopting team must complete the [commercial integration and release guide](INTEGRATION_GUIDE.md); this development setup is not a production runbook.

Requirements for **isolated local testing**: PHP 8.4, Composer 2, Node.js 22, npm and MySQL 8.4. Use test-only credentials and avoid importing historical SQL backups.

For Windows hosts with Docker Desktop and Linux containers, an **opt-in local
test sandbox** provides PHP 8.4 and six disposable MySQL 8.4 schemas without
using the host's XAMPP/database. See [Docker acceptance instructions](tests/docker/README.md).

```bash
git clone https://github.com/AlirezaBelal/laravel-marketplace-demo.git
cd laravel-marketplace-demo
cp .env.example .env
composer install
php artisan key:generate
npm ci
npm run build
```

Configure a **new, disposable** main database in `.env` and provision the five additional category databases defined in `config/database.php` before running migrations. The GitHub Actions database workflow provisions all six schemas automatically with synthetic credentials. On an empty test database only:

```bash
php artisan migrate
php artisan serve --host=127.0.0.1
```

The checked-in environment defaults to the local payment driver and disabled debug mode. Keep payment, SMS, mail and database credentials outside Git. **Never use `migrate:fresh` on an existing database**: it drops tables. No comprehensive demo catalog or end-to-end installation/data fixture is claimed. See [the acceptance checklist](ACCEPTANCE_TESTING.md).

## Security and verification status

The original Laravel 9 dependency graph was vulnerable. The modernization branch regenerated both lockfiles, removed the former Composer audit ignore list, and replaced the obsolete Mix/webpack build. All three workflow groups have passed together:

- **CI:** repository safety, framework checks, selected regression tests and Vite build.
- **Dependency security audit:** `composer audit --locked` and the full `npm audit --audit-level=low`, including development packages.
- **Database migration and feature compatibility:** **107 active migrations** (106 reconciled historical + one additive gift-payment migration) on six disposable MySQL 8.4 schemas, a second no-op migration pass, and **74 Feature tests with 134 assertions**. Eighteen tests are explicitly skipped for disabled or conditionally unavailable features, not silently omitted. Chrome Headless also renders four public entry points.

These results were verified on `master` at commit `50daca1` in [GitHub Actions](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions). Historical duplicate migrations (74 files) are preserved at `database/migrations/legacy-snapshots/`. Some obsolete Bootstrap/Popper notices remain even though the full dependency security audits pass. **Green audits do not prove application-level payment correctness, complete authorization, browser compatibility or production readiness.** Adopting teams own these release gates. See [MODERNIZATION.md](MODERNIZATION.md), [SECURITY.md](SECURITY.md) and [ACCEPTANCE_TESTING.md](ACCEPTANCE_TESTING.md).

## Commercial adoption: what the integrating team owns

This repository is a **commercial-use code foundation**, not a hosted service or
a guarantee of successful live orders. The integrator/operator is responsible for:

- **Payment:** selecting and contracting with a provider; obtaining their own
  credentials; implementing sandbox and live callbacks, signature/reference
  verification, idempotency, refunds, failure/reconciliation procedures and
  concurrent transaction tests. Never use an inherited merchant account.
- **Notifications:** configuring their own SMS/email/OTP delivery providers,
  sender identities, rate limits and fraud controls.
- **Quality assurance:** running the documented automated tests, resolving
  all skipped/untested cases that apply, and performing real browser,
  authenticated, cross-account, load and production-staging acceptance tests.
- **Security and operations:** reviewing all authorization paths, replacing
  IP-based guest cart tracking, validating server-side inventory/pricing,
  hardening uploads, implementing HTTPS, secrets, backups, logging, incident
  response and operational monitoring.
- **Data and legal:** independently verifying an upgrade of any existing
  database (no historical dump import), obtaining rights for third-party
  imagery/trademarks and satisfying applicable privacy, payment and consumer
  protection requirements.

See [INTEGRATION_GUIDE.md](INTEGRATION_GUIDE.md) for a practical handoff and
[ACCEPTANCE_TESTING.md](ACCEPTANCE_TESTING.md) for evidence required before launch.
Commercial permission for project-authored code is governed by Apache-2.0; there
is no warranty or provider certification.

## Preservation and public-content review

On 2026-10-25, the owner rewrote both repository branches to remove historical SQL backups and replace Google API key patterns. This does not establish deletion of old pull-request references, cached objects, forks or existing clones. A GitHub Support request has been filed, but server-side cleanup remains pending. The owner reports cancelling Google Cloud; this has not independently established that historically exposed keys are revoked or unusable. Never restore old dumps or merge pre-cleanup history. See [cleanup notes](SECURITY_REMEDIATION.md).

Historical imagery, fonts, branding and UI assets remain in this source as originally supplied. Their presence is **not** a license to reuse third-party material commercially: adopters must audit, replace or separately license these assets and remove misleading branding before launch.

The modernized code was fast-forwarded to `master`, and older feature branches were removed without rewriting the cleaned history. Adopters, rather than this source repository, are responsible for finishing and documenting payment, authentication, security, privacy and deployment acceptance. No security audit was disabled or weakened for archival.

## License

Project-authored code is distributed under the existing [Apache License 2.0](LICENSE). Third-party packages, fonts, images, trademarks and other assets remain subject to their own rights and terms.
