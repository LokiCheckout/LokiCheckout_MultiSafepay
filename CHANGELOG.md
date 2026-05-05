# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.0.17] - 05 May 2026
### Fixed
- Filter recurring methods from the checkout

## [2.0.16] - 17 March 2026
### Fixed
- Update IconResolver.php

## [2.0.15] - 12 March 2026
### Fixed
- Wrong procedure of adding JS error message
- Add integration flag to MODULE.json

## [2.0.14] - 12 January 2026
### Fixed
- Make sure to install multisafepay/magento2-frontend
- Add new GitHub Action workflows
- Copy generic CI/CD files

## [2.0.13] - 11 December 2025
### Fixed
- iRemove redundant quote save

## [2.0.12] - 27 November 2025
### Fixed
- Get component from Alpine store by name, not element ID
- Fix potential JS error when component is not in Alpine store
- Fix error on container not found with payment components
- Update composer keywords
- Update composer keywords
- Update composer keywords

## [2.0.11] - 22 October 2025
### Fixed
- Do not escape `$css()` with `escapeHtmlAttr()` but `escapeHtml()`

## [2.0.10] - 01 October 2025
### Fixed
- Greatly simplify image rendering
- Add proper XML layout names to all block

## [2.0.9] - 29 September 2025
### Fixed
- Sort entries of module.xml file
- Sort dependencies of composer.json
- Copy generic CI/CD files
- Add gitignore file

## [2.0.8] - 24 September 2025
### Fixed
- Change containers into blocks to allow for caching
- Rename Alpine store checkout to LokiCheckout, components to LokiComponents
- Rename loki-components container to loki.components

## [2.0.7] - 16 September 2025
### Fixed
- Copy generic CI/CD files

## [2.0.6] - 02 September 2025
### Fixed
- Change loki-checkout.payment.payment-methods to loki-checkout.payment.methods
- Refactor Loki-library location in Playwright tests

## [2.0.5] - 28 August 2025
### Fixed
- Add CI files
- Replace yireo/opensearch with yireo/opensearch-dummy in Gitlab CI

## [2.0.4] - 21 August 2025
### Fixed
- Add dependency with loki/magento2-css-utils
- Fix duplicate import
- Replace LokiComponentsUtilBlockCssClass with LokiCssUtilsUtilCssClass
- Declare used PHP namespaces
- Document latest version of template
- Add missing strict_types declaration

## [2.0.3] - 18 August 2025
### Fixed
- Lower requirements to PHP 8.1

## [2.0.2] - 06 August 2025
### Fixed
- Lower PHP requirement to PHP 8.2+

## [2.0.1] - 01 August 2025
### Fixed
- Add dep with Loki_FieldComponents anyway

## [2.0.0] - 22 July 2025
### Fixed
- Bump loki/magento2-components to major 2.0
- Bump `LokiCheckout_Core` to 2.0.0
- Rename PHP namespace from `Yireo_Loki*` to `Loki*`
- Rename composer package from `yireo/magento2-loki*` to `loki/magento2*`

## [1.0.2] - 19 June 2025
### Fixed
- Use Loki test-case in Playwright to detect JS errors automatically
- Rewrite @helpers to @loki in Playwright tests
- Draft of ApplePay behaviour
- Fix malfunctioning integration test

## [1.0.1] - 22 May 2025
### Fixed
- Switch test vs live mode for component URLs
- Implement MultiSafepayPaymentComponent object in Playwright
- Rename MultiSafepay object to MultiSafepayPortal
- Rename LokiCheckoutPaymentComponent to LokiCheckoutMultiSafepayPaymentComponent

## [1.0.0] - 21 May 2025
### Fixed
- Fix payment component was always rendered
- Add `MultiSafepay_ConnectFrontend` as dep
- Add integration tests
- Add Playwright tests
- Add support for creditcard custom image
- Add support for gateway image
- Put all components in a group

## [0.0.2] - 19 May 2025
### Fixed
- Add Payment Components where needed
- Do not hide "multisafepay"
- Redirect also method "multisafepay"
- Add initial tests

## [0.0.1] - 14 May 2025
- Initial release
