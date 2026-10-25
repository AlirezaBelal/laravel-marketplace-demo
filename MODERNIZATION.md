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
- Selected PHPUnit suite: one existing unit test and 17 focused feature tests
  covering guest auth rendering, administrator boundaries, shipping address
  ownership, payment ownership, and server-side price derivation.
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
- Shipping subtotal and delivery price, plus the bank payment amount after
  discounts and gift credit, are derived from persisted records rather than
  mutable Livewire properties or event arguments.
- The Livewire notification event API and common Blade initialization hooks
  were migrated from the removed v2 forms.

## Open compatibility and security work

1. **Database baseline:** The historical set contains 180 migration files,
   including 68 repeated named migration classes and many repeated table
   creations. Do not blindly remove or suppress them: the schema history must
   be reconciled against a representative database. The existing complete
   feature suite cannot be treated as verified; focused tests currently use
   isolated SQLite schemas.
2. **Checkout integrity:** Verify stored cart prices against current product
   and seller offers, and test quantity, stock, order grouping, shipping,
   discounts, gift expiry/usage and repeated submissions. Gift credit is
   currently consumed before external gateway success, and payment callback
   concurrency/idempotency still needs a dedicated design and test.
3. **Authorization:** Review every customer/seller/admin Livewire mutation,
   especially cart identifiers, order status updates and file management.
4. **Runtime/UX:** Execute real browser journeys for registration/login,
   seller listing, cart, delivery selection, discount application, payment
   failure/success callbacks, administration, file uploads, Select2 and chart
   rendering. The successful asset build does not establish visual or
   behavioral equivalence.
5. **Test quality:** PHPUnit currently reports a deprecation warning; the
   complete legacy feature suite remains out of CI. No live payment or SMS
   credentials should be used in automation.

## Release and archive gate

Before merging, confirm CI and both independent dependency audits on the
final candidate commit, reconcile the database testing limitation, add
provider-isolated payment tests and run a browser acceptance checklist. Keep
the repository public, retain Apache-2.0, and do not claim production
readiness. Only archive after the owner accepts any remaining documented
limitations and the selected verified changes have been merged to `master`.
