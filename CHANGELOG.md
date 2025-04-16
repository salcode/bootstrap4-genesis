# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]
- Fix: Resolve warning undefined array key ([#71](https://github.com/salcode/bootstrap4-genesis/issues/71))
- Fix: `add_theme_support()` for `html5` was being called incorrectly ([#72](https://github.com/salcode/bootstrap4-genesis/issues/72))
- Add `.nvmrc` to project, set to `22` to make using the correct Node version easier with [nvm](https://github.com/nvm-sh/nvm) ([#75](https://github.com/salcode/bootstrap4-genesis/issues/75))
- **BREAKING**: Remove Gulp build process (both `npm run build` and `npm run watch`) ([#75](https://github.com/salcode/bootstrap4-genesis/issues/75))
- Add webpack build process `npm run build` ([#75](https://github.com/salcode/bootstrap4-genesis/issues/75))

## [1.3.2] - 2020-05-29
- Update to Bootstrap v4.5.0
- Update Acorn to 5.7.4
- Update other NPM dependencies
### Fixed
- Remove console.log from main.js

## [1.3.1] - 2019-11-29
### Updated
- Update to Bootstrap v4.4.1
- Bump lodash.template from 4.4.0 to 4.5.0

## [1.2.1] - 2019-09-26
### Added
- Theme preview image, screenshot.png
### Fixed
- Apply `nav_menu_submenu_css_class` filter to custom nav walker start_lvl classes
### Updated
- Update npm dependencies for security patches to build tools

## [1.2.0] - 2019-05-17
### Added
- Filter `bs4g_genesis_do_nav_content` to modify the `genesis_do_nav` content between the `<nav>` tags.
- Add Bootstrap markup search box to the navbar via the `bs4g_genesis_do_nav_content` filter.
### Updated
- Update npm dependencies for security patches to build tools

## [1.1.3] - 2019-05-02
### Updated
- CHANGELOG.md

## [1.1.2] - 2019-05-02
### Updated
- Update gulp and some gulp tools

## [1.1.1] - 2019-04-15
### Updated
- Corrected CHANGELOG

## [1.1.0] - 2019-04-15
### Added
- Apply Bootstrap .table and .table-bordered to all tables
- Populate CHILD_THEME_NAME, CHILD_THEME_URL, and CHILD_THEME_VERSION based on values in style.css
### Updated
- Update to Bootstrap v4.3.1

## [1.0.0] - 2019-01-31
### Added
- Initial Release
