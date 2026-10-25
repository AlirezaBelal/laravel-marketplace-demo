# Marketplace modernization status

This branch is an **unmerged modernization candidate** for the public multi-vendor
marketplace. It is **not production-ready**. The original `master` remains the
last accepted portfolio snapshot until application-level compatibility checks
are complete.

## Dependency baseline

The committed lockfiles currently resolve PHP 8.4, Laravel 13.38, Livewire
4.4, Jetstream 5.5, Sanctum 4.3, Vite 8.3 and Tailwind 4.3. Laravel Mix and
webpack were removed from the npm dependency graph. The former Composer audit
ignore list was removed; no new audit suppressions or `continue-on-error`
settings were introduced.

## Verified in GitHub Actions

- Composer dependency installation and metadata validation.
- Framework boot, route listing and Blade view compilation.
- Selected PHPUnit suite: one existing unit test and 20 focused feature tests
  covering guest auth rendering, administrator boundaries, shipping address
  ownership, payment ownership, cart ownership and server-side price derivation.
- Fresh installation of all **106 active migrations** on six disposable MySQL
  8.4 databases, followed by a successful second migration pass.
- The complete Feature suite runs in a separate disposable MySQL environment
  with built Vite assets: **62 tests**, including the original Jetstream tests.
  Eighteen tests for disabled or conditionally unavailable features are
  explicitly reported as skipped; they are not silently excluded.
- Headless Chrome renders the public home, guest registration/login, cart and
  seller-login entry points against the disposable MySQL test application.
  This does **not** exercise authenticated browser mutations or real providers.
- Production Vite build and runtime npm audit.
- Independent `composer audit --locked` and **full**
  `npm audit --audit-level=low`, including development dependencies.
- Source checks reject active Livewire 2 `emit()` calls and removed browser
  initialization hooks.

These are meaningful checks of the committed source and lockfiles, not proof
of correct real-world checkout or deployment behavior.

## Application security improvements

- `/admin` now requires explicit administrator authorization in addition to
  authentication. Staff access needs a separate role-policy review.
- Address creation/deletion routes require authentication; address selection
  and deletion are owner-scoped in the HTTP and Livewire paths.
- Payment type changes, order lookup, and finalization are scoped to the
  authenticated user.
- Cart mutations and additions now resolve items only within the current
  account (or an anonymous IP-scoped cart). Existing account-owned items are
  no longer reassigned merely because they share the visitor's IP address.
- The storefront's legacy Blade sections do not throw exceptions when their
  expected promotional/header/footer records have not been seeded.
- Fortify registration and profile changes do not invoke email verification
  routes when that feature is disabled.
- Shipping subtotal and delivery price, plus the bank payment amount after
  discounts and gift credit, are derived from persisted records rather than
  mutable Livewire properties or event arguments.
- The Livewire notification event API and common Blade initialization hooks
  were migrated from the removed v2 forms.

## Open compatibility and security work

1. **Database baseline:** The historical set contained 180 migration files,
   including 68 repeated named migration classes and six further migrations
   targeting tables that were already created. The 74 later copies have been
   preserved unchanged under
   `database/migrations/legacy-snapshots/`, leaving the earlier definitions
   active. **Fresh schema construction and the complete Feature suite now pass**
   on separate ephemeral GitHub Actions jobs using six disposable databases
   (main plus five historical category connections). An existing database's
   schema and migration ledger still require non-destructive reconciliation.
2. **Checkout integrity:** Verify stored cart prices against current product
   and seller offers, and test quantity, stock, order grouping, shipping,
   discounts, gift expiry/usage and repeated submissions. Gift credit is
   currently consumed before external gateway success, and payment callback
   concurrency/idempotency still needs a dedicated design and test.
3. **Authorization:** Review remaining customer/seller/admin Livewire mutations,
   especially order status updates and file management. Anonymous carts are
   still associated with IP addresses rather than a dedicated session token;
   this is not a sufficient separation for a production deployment.
4. **Runtime/UX:** Execute real browser journeys for registration/login,
   seller listing, cart, delivery selection, discount application, payment
   failure/success callbacks, administration, file uploads, Select2 and chart
   rendering. The successful asset build does not establish visual or
   behavioral equivalence.
5. **Test quality:** Disabled Jetstream Teams is explicitly skipped in its
   old scaffold tests; enabling Teams later requires re-running them and
   adding the missing user-model support. PHPUnit 12's XML configuration was
   updated to the current schema, and the complete suite reports no PHPUnit
   deprecations. External Node/npm packages still print some deprecated-package
   notices even though the full security audits pass. No live payment or SMS
   credentials are used in CI.

## Release and archive gate

Before merging, confirm CI and both independent dependency audits on the
final candidate commit, reconcile the database testing limitation, add
provider-isolated payment tests and complete
[`ACCEPTANCE_TESTING.md`](ACCEPTANCE_TESTING.md) in a disposable, non-public
test environment. Keep
the repository public, retain Apache-2.0, and do not claim production
readiness. Only archive after the owner accepts any remaining documented
limitations and the selected verified changes have been merged to `master`.
