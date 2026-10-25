# Marketplace commercial integration and acceptance checklist

This checklist is for **teams adopting the source code for a real product**.
Run tests with synthetic accounts, addresses, products, orders and payment
references in a private staging environment. The repository does not grant
permission to deploy untested workflows or use another party's real payment
or SMS credentials. **The adopting integrator/operator owns the verification,
provider setup and sign-off required before handling live users or payments.**

## Automated gate (GitHub-hosted, no local database needed)

Review the three workflows for the currently deployed source SHA on `master`.
The known passing baseline is commit `50daca1` (7/7 jobs):

1. `CI`: repository safety, PHP framework/selected feature checks, Vite build
   and runtime npm audit.
2. `Dependency security audit`: Composer locked audit and full npm
   audit, including development packages. Neither audit has been disabled.
3. `Database migration and feature compatibility`: fresh + repeat
   migration on MySQL 8.4, the full Feature suite with real Vite assets,
   and headless Chrome rendering of four public entry points.

The browser smoke only proves those four unauthenticated routes render; it
does not execute checkout, private dashboards or an OTP/payment provider.
The database workflow provisions six disposable schemas using **test-only**
credentials and never connects to the original marketplace database.
Historical duplicate migrations remain available at
`database/migrations/legacy-snapshots/`. Its success does not establish an
in-place upgrade of an existing database.

## Operator-owned manual browser gate (not yet verified)

Run these in an **isolated local/test environment**, with a freshly created
test database, stubbed payment gateway and stubbed SMS delivery. Do not run
`migrate:fresh` against an existing or production database: it deletes tables.
The [optional Docker acceptance sandbox](tests/docker/README.md) isolates PHP
and MySQL from the host but does not seed a realistic catalog or replace the
required authenticated browser journeys.

- [ ] On desktop and mobile, the public homepage, category pages, search and
  product details load without server errors or browser-console errors.
- [ ] Registration, login, logout, password reset and session expiry work
  using a fake OTP/SMS provider. Confirm another person's address/profile
  cannot be read or modified.
- [ ] A seller can create/edit a test product, offer, stock, color and gallery;
  verify file upload permissions and that assets persist after a reload.
- [ ] Two different synthetic customers cannot change each other's cart,
  shipping address, order or payment. Also test guests from a shared IP;
  known IP-based guest-cart identification is a production limitation.
- [ ] Quantity and stock limits, shipping, voucher expiry, discounts and gift
  credit produce the expected total derived on the server.
- [ ] Redeem an unclaimed synthetic gift in one profile, confirm another
  synthetic user cannot claim or spend it, and verify past-expiry gifts cannot
  reduce the checkout amount. Check the same interactions through the UI.
- [ ] A test payment failure does not fulfill an order or consume credit;
  a fake verified payment fulfills once; duplicate/replayed callbacks do not
  trigger duplicate fulfillment, notifications or charges.
- [ ] Concurrent fake callbacks against MySQL cannot debit one gift twice;
  simulate exhausted credit after gateway verification and verify the
  `reconciliation_required` bank entry is resolved manually (do not retry
  or refund against a live provider for this test).
- [ ] Non-admins cannot reach `/admin`; sellers cannot perform admin-only
  mutations. Review order status transitions and the file manager.
- [ ] Livewire 4 interactions, Select2, image uploads, charts, Jalali dates,
  pagination and responsive Tailwind/Vite styles behave as expected.

For each item, record `PASS`, `FAIL` or `NOT TESTED`, the candidate commit
SHA, browser version and any sanitized repro steps. Never include keys,
personal records or historical SQL dumps in a public issue/PR.

## Provider integration and go-live approval

A commercial integrator must connect its **own** payment gateway and SMS/OTP
providers, use test-mode accounts first, verify callback signatures/references
and exact charged amounts, exercise failure/success/replay/refund flows and
concurrent MySQL callbacks, and implement manual financial reconciliation.
Use no public repository secrets and do not run real transactions in CI.

The operator must also complete cross-account authorization and seller/admin
checks, verify pricing and inventory at checkout, harden uploads and guest
sessions, prove backup/restore and rollback, and maintain security monitoring.
**Do not substitute seven green CI jobs for these acceptance results.**

A release owner should record `PASS`, `FAIL`, or `NOT TESTED` for each checklist
item, evidence links without sensitive information, resolved blocking issues,
operational contact, approval date and deployed commit SHA. Only that operator
can declare **its own installed system** production-ready after meeting its
own legal, security, payment-provider and business requirements.

The source repository can be archived independently. An archive is a record of
source availability, not evidence of a commercially accepted deployment.
See [INTEGRATION_GUIDE.md](INTEGRATION_GUIDE.md).
