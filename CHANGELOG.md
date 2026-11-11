# Real Estate Pro Changelog
This is the up-to-date changelog for [Real Estate Pro](https://wordpress.org/plugins/re-pro/).
## [1.0.12] - 2026-11-11
- Security: Google Maps info window content is sanitized. Homes.com and Zillow widget attributes are escaped, iframe URLs are escaped, and colors are limited to hex.
- Security: Inman feed titles, links, body HTML, and errors are escaped. StreetAdvisor response text and URLs are escaped.
- Security: GreatSchools requests use HTTPS and the WordPress HTTP API.
- HomeFinder's widget loader is not available over HTTPS. The plugin no longer loads that script because the HTTPS URL returns 404 and the old HTTP URL redirects to the same missing file.
- Google Maps reads the same settings option as the settings screen. On upgrade, map activation, the API key, and map style JSON are copied once from the legacy option when the settings screen does not already have them.
- StreetAdvisor widgets read the Street Advisor API Key setting. Site owners need to enter their own key. The previous built-in key should be considered compromised and rotated. The widgets output nothing when no key is saved.

## [1.0.11] - 2026-11-11
- Fixed a fatal error in the StreetAdvisor location widget when the remote API returns an error or an unexpected response. The StreetAdvisor reviews and GreatSchools widgets use the same guard.

## [1.0.10] - 2026-11-11
- Security: Fixed authenticated stored cross-site scripting in settings and widget forms (CVE-2026-1845).

## [1.0.4] - 2017-02-16
- Fixed issue where files were not being included on certain hosting providers.

## [1.0.3] - 2017-02-06
- New Google Maps module with shortcode, widget, and support for custom map styling.
- HTTPS Check for widgets
- Homes.com Commute Time Widget
- Homes.com Featured Listing Widget
- Homes.com Home Values Widget
- Homes.com Search Widget
- Homes.com Mortgage Calculator Widget
- Homes.com Simple Search Widget
- Homes.com Tall Search Widget

## [1.0.2] - 2017-01-25
- Removed widgets no longer offered by Zillow.

## [1.0.1] - 2016-12-26
- More Zillow Widgets
- Support for Zillow Badges Widget

## [1.0.0] - 2016-10-28
- First Release
- Offers Several Zillow Widgets


---
<sup>The format of this changelog is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).</sub>
