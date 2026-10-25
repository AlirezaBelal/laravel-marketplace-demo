# Commercial marketplace integration guide

**Purpose:** This repository provides reusable **source code** for building
a commercial Laravel multi-vendor marketplace. It is not a hosted marketplace,
a managed gateway service or a turnkey production-certified release.
Project-authored code is available under Apache-2.0; audit and license any
third-party assets independently.

## What is included

- Laravel 13 / PHP 8.4 / Livewire 4 source for customer, seller and admin
  flows; storefront, listings, carts, shipping, orders and payments.
- Versioned Composer/npm lockfiles, Vite/Tailwind assets, audited dependency
  baseline and CI checks on the `master` branch.
- Historical schema compatibility work and **107 active migrations** across
  a main and five category MySQL 8.4 databases.
- Provider-isolated automated payment regressions plus a disposable Docker
  test stack. The successful baseline at commit `50daca1` ran **7/7 GitHub
  Actions jobs** and **74 Feature tests / 134 assertions / 18 explicit skips**.

The repository shows public home and login entry points under test data. It
does **not** supply validated production customer credentials, merchant
accounts, a production database, a production-ready container architecture,
or an endorsement from Digikala.

## What the integrating developer/operator must deliver

### 1. Own payment gateway integration and acceptance

- Contract with a supported gateway and configure your own merchant identity,
  callbacks, HTTPS certificates and secret storage. Treat
  `PAYMENT_METHOD=local` in `.env.example` as a development-only default.
- Validate the provider's **current** API requirements: amount and currency,
  transaction/reference identity, request signing where applicable,
  success/failure/cancel states, return URLs, duplicate notifications,
  retries, timeouts, refunds and dispute handling.
- Test with provider sandbox transactions before an approved, low-risk
  live-pilot. Never share credentials in GitHub Actions, public issues,
  screenshots or test logs.
- Revalidate product prices/stock/quantities at checkout, test simultaneous
  callbacks and gift-credit contention on MySQL, and explicitly manage
  `reconciliation_required` records. A verified callback is **not**
  equivalent to an automatically completed refund.

### 2. Build and test your own notification and identity flows

Set up your SMS/OTP provider (for example Kavenegar if applicable), mail
sender, templates, delivery callbacks, retry limits, rate limiting,
password-reset recovery and bot/fraud controls. Use synthetic accounts and
stubbed providers in automated CI; verify the real integrations privately
in a staging environment.

### 3. Own application security, isolation and permissions

Review customer, seller and administrator roles, all Livewire mutations,
order-state transitions, file-manager boundaries, input validation and
upload security. Replace **IP-based guest cart identity** with per-session
isolation. Run cross-user and shared-IP tests, security scans, and an
independent security review appropriate for the intended traffic, threat
model and jurisdiction.

### 4. Rehearse infrastructure and database operations

Provision separate development, staging and production environments with
PHP 8.4, a supported database setup and secure networking. The
`compose.acceptance.yml` environment is **temporary test infrastructure**:
it has fixed test-only credentials, a volatile database and is not intended
for production use.

Plan HTTPS, secrets management, least-privilege database accounts, durable
storage, monitoring, job workers, caching, queues, backups, disaster
recovery and rollback. Verify data retention, privacy and applicable
consumer/payment rules. For any **existing** database, reconcile its schema
and migration ledger non-destructively; only a fresh six-schema install
has been tested here. Do not import historical SQL backups or use
`migrate:fresh` on real data.

### 5. Complete release testing and record acceptance

Use [ACCEPTANCE_TESTING.md](ACCEPTANCE_TESTING.md) as the test record. Test
realistic browser and mobile flows for registration, seller listings, stock,
cart, shipping, vouchers, gift credit, orders, authenticated panels,
uploads, Livewire, refunds and notifications. Include failure cases,
concurrent requests, cross-account access, accessibility, performance,
session expiry and recovery. Do not count **18 skipped tests** as passed.

A release owner for the **downstream deployment** should sign off the
deployed commit, evidence, remaining risks, runbook, incident contact,
rollback rehearsal and payment-provider acceptance before traffic or real
transactions are enabled.

## Source status versus deployed-product status

The source may be used to **develop a production product**; the status of
the resulting product depends on the adopter's implementation and tests.
The source repository's green CI provides useful evidence for its own
codebase, but **does not certify any particular downstream deployment**.
Archiving a source repository freezes development; it does not make a
deployment safe, resolve historical secret exposure or authorize reuse of
third-party trademarks.

Related documentation:
[README](README.md) · [modernization status](MODERNIZATION.md) ·
[acceptance checklist](ACCEPTANCE_TESTING.md) ·
[security policy](SECURITY.md) ·
[historical credentials note](SECURITY_REMEDIATION.md).
