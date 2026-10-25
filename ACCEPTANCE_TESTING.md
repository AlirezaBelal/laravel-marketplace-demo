# Marketplace archival acceptance checklist

Use **synthetic accounts, products, addresses, and orders only**. This project
is not production-ready and none of the steps below authorize use of live
payment/SMS credentials, public deployment, or real customer data.

## Automated gate (GitHub-hosted, no local database needed)

Open PR #13 and verify that every job succeeds on the **same head commit**:

1. `CI`: repository safety, PHP framework/selected feature checks, Vite build
   and runtime npm audit.
2. `Dependency security audit`: Composer locked audit and full npm
   audit, including development packages. Neither audit has been disabled.
3. `Database migration and feature compatibility`: fresh + repeat
   migration on MySQL 8.4, and the full Feature suite with real Vite assets.

The database workflow provisions six disposable schemas using **test-only**
credentials and never connects to the original marketplace database.
Historical duplicate migrations remain available at
`database/migrations/legacy-snapshots/`. Its success does not establish an
in-place upgrade of an existing database.

## Manual browser gate (not yet verified)

Run these in an **isolated local/test environment**, with a freshly created
test database, stubbed payment gateway and stubbed SMS delivery. Do not run
`migrate:fresh` against an existing or production database: it deletes tables.

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
- [ ] A test payment failure does not fulfill an order or consume credit;
  a fake verified payment fulfills once; duplicate/replayed callbacks do not
  trigger duplicate fulfillment, notifications or charges.
- [ ] Non-admins cannot reach `/admin`; sellers cannot perform admin-only
  mutations. Review order status transitions and the file manager.
- [ ] Livewire 4 interactions, Select2, image uploads, charts, Jalali dates,
  pagination and responsive Tailwind/Vite styles behave as expected.

For each item, record `PASS`, `FAIL` or `NOT TESTED`, the candidate commit
SHA, browser version and any sanitized repro steps. Never include keys,
personal records or historical SQL dumps in a public issue/PR.

## Archive decision

An all-green automated run is necessary but does not prove the full UI or
payment lifecycle. Keep the modernization PR as a draft while high-impact
manual/provider tests are incomplete. If some checks cannot reasonably be
performed, document them explicitly and obtain the owner's decision about
archiving a **non-production portfolio demo** with those limitations.
