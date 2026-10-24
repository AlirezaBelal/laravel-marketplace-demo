# Laravel Multi-Vendor Marketplace

[![CI](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/ci.yml/badge.svg)](https://github.com/AlirezaBelal/laravel-marketplace-demo/actions/workflows/ci.yml)

A completed Laravel 9 and Livewire 2 multi-vendor marketplace project implementing customer, seller and administrator workflows, product management, shopping carts, orders, payment records and notification integrations.

**Completed legacy project:** no routine feature development is planned. This unsupported runtime is retained for code review and portfolio reference, not production deployment. GitHub's native archive banner is the authoritative read-only status.

This project is independent of and **not affiliated with, endorsed by, or operated by Digikala**.

![Marketplace UI](img.png)

## Implemented workflows

- Customers: registration, authentication, profiles, addresses, wishlists, product browsing, comparisons, comments, carts, shipping and orders.
- Sellers: registration and seller-facing marketplace routes.
- Administrators: product and commerce management components, payment records and dashboard views.
- Integrations: configurable payment drivers, SMS/email notifications, charts, SEO helpers, file management and Persian/Jalali dates.

These are implemented code paths, not claims of comprehensive acceptance testing, deployed customers or commercial operation.

## Stack and boundaries

Laravel 9.52.22, Livewire 2.12.8, Blade, Jetstream/Fortify/Sanctum, Eloquent, MySQL-oriented migrations, Tailwind, Bootstrap and Alpine.js. Payment integration uses Shetabit Multipay; SMS integration uses Kavenegar.

Routes, controllers and Livewire components coordinate Eloquent models and external adapters. Payment callbacks call the configured gateway's verification API with the recorded transaction and amount before changing payment/order state. Those database updates run in a transaction; SMS/email delivery follows the commit.

This is a code-level review of the callback, not proof of complete payment correctness, authorization coverage, concurrency safety or certification against a live gateway. No live payment or notification delivery is claimed.

## Local inspection and setup

Use an isolated local environment with synthetic records only. Do not expose this application publicly or supply production credentials.

Requirements: PHP 8.2 (the CI environment), Composer 2, Node.js/npm and a database compatible with the migrations. CI used Node.js 20; that historical toolchain is not a recommendation for a newly deployed service.

```bash
git clone https://github.com/AlirezaBelal/laravel-marketplace-demo.git
cd laravel-marketplace-demo
cp .env.example .env
composer install
php artisan key:generate
npm ci
npm run dev
```

Configure a local database in `.env`, then:

```bash
php artisan migrate
php artisan serve --host=127.0.0.1
```

The checked-in environment defaults to the local payment driver and disabled debug mode. Keep payment, SMS, mail and database credentials outside Git. Migrations are the supported schema source; no complete synthetic catalog or end-to-end installation/data fixture is claimed. Do not restore historical development dumps.

## Security and verification status

Laravel 9's security support ended on February 6, 2024. Livewire 2 and the frontend stack are legacy dependencies; no ongoing security-support guarantee is made.

CI runs three jobs: repository safety checks/PHP lint, framework boot/routes plus **one PHPUnit test with one assertion**, and frontend build/runtime dependency audit. On the sanitized documentation branch reviewed on 2026-10-25, repository safety and frontend build/runtime audit pass; the PHP job fails at the locked dependency audit. CI does not test complete customer, seller, administrator or payment workflows.

A fresh locked-dependency audit on **2026-10-24** failed: Composer reported six non-ignored advisories across Laravel, CommonMark and Symfony, in addition to four existing Laravel exceptions. The complete npm graph reported 69 findings. Counts are a dated dependency snapshot, not proof that every issue is reachable in this application; inspect the actual dependency tree and [security policy](SECURITY.md). Old green CI is not a current security clearance.

No advisory exception was added or validation weakened for this presentation update. A supported runtime would require separately authorized modernization and application-level security/integration tests.

## Preservation and public-content review

On 2026-10-25, the owner rewrote both repository branches to remove historical SQL backups and replace Google API key patterns. This does not establish deletion of old pull-request references, cached objects, forks or existing clones. GitHub Support cleanup remains pending; historical Google Cloud credential revocation/restriction has not been confirmed. Never restore old dumps or merge pre-cleanup history. See [cleanup notes](SECURITY_REMEDIATION.md).

The owner approved retention of the existing imagery, fonts and UI assets for this portfolio artifact. They remain unchanged. This records the owner's decision, not an independent legal clearance; Apache-2.0 does not grant rights over third-party material.

The owner accepts preservation of this unsupported source archive with known dependency failures disclosed. No security checks or advisory exceptions are weakened for archival.

## License

Project-authored code is distributed under the existing [Apache License 2.0](LICENSE). Third-party packages, fonts, images, trademarks and other assets remain subject to their own rights and terms.
