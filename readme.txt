=== Real Estate Pro ===
Contributors: bhubbard, imforza, sgarza, matoledo
Tags: Real Estate, Zillow, imFORZA, Equal Housing Opportunity, Trulia, IDX
Requires at least: 4.6
Tested up to: 4.9
Stable tag: 1.0.12
Requires PHP: 7
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Real Estate Pro offers Widgets, Badges, and tools for Real Estate Websites.

== Description ==
Real Estate Pro offers Widgets, Badges, and tools for Real Estate Websites.

Please visit our wiki on [GitHub](https://github.com/imFORZA/re-pro/wiki) for more info.

= 3rd Party Integrations =
Real Estate Pro is focused and designed to integrate with many third party sites and services for Real Estate.

= Zillow =
We offer several Zillow integrations, such as WordPress widgets:

* [Zillow] Reviews Widget [Demo](https://www.zillow.com/webtools/widgets/review-widget/)
* [Zillow] Large Search Box [Demo](https://www.zillow.com/webtools/widgets/ZillowLargeSearchBox.htm)
* [Zillow] Most Expensive Homes
* [Zillow] Badges
* [Zillow] Newest For Sale homes

= Equal Housing =
We offer a widget and shortcode to display the Equal Housing logo.

= Google Maps =
We offer Google Map widgets and shortcodes.

= Homes.com =
We offer many widgets for homes.com, here is the list

* [Homes.com] Commute Time Widget
* [Homes.com] Featured Listing Widget
* [Homes.com] Home Values Widget
* [Homes.com] Search Widget
* [Homes.com] Mortgage Calculator Widget
* [Homes.com] Simple Search Widget
* [Homes.com] Tall Search Widget
* [Homes.com] Check for widgets

== Frequently Asked Questions ==
You may have many questions regarding this plugin but this section is dedicated to answering the most common.

= How do I contribute to Real Estate Pro? =
There are opportunities for everyone at all levels to contribute. [Learn more about contributing to Real Estate Pro](https://github.com/imFORZA/re-pro).

= What features are coming? =
At the moment an official roadmap has yet to be planned, but feel free to submit requests on the [Github Repo](https://github.com/imFORZA/re-pro).

== Changelog ==

= 1.0.12 =
* Security: Google Maps info window content is sanitized. Homes.com and Zillow widget attributes are escaped, iframe URLs are escaped, and colors are limited to hex.
* Security: Inman feed titles, links, body HTML, and errors are escaped. StreetAdvisor response text and URLs are escaped.
* Security: GreatSchools requests use HTTPS and the WordPress HTTP API.
* HomeFinder's widget loader is not available over HTTPS. https://www.homefinder.com/widgets/js/widgetLoader.js redirects and returns 404, and the old HTTP URL redirects to that same missing file. The plugin no longer loads that script.
* Google Maps reads the same settings option as the settings screen. On upgrade, map activation, the API key, and map style JSON are copied once from the legacy option when the settings screen does not already have them.
* StreetAdvisor widgets read the Street Advisor API Key setting. Enter your own key. The previous built-in key should be considered compromised and rotated. The widgets output nothing when no key is saved.

= 1.0.11 =
* Fixed a fatal error in the StreetAdvisor location widget when the remote API returns an error or an unexpected response. The StreetAdvisor reviews and GreatSchools widgets use the same guard.

= 1.0.10 =
* Security: Fixed authenticated stored cross-site scripting in settings and widget forms (CVE-2026-1845).

= 1.0.9 =
* Small Performance Improvements
* New User Profile Fields
* Tested with 4.9

= 1.0.8 =
* Needs to be updated.

= 1.0.7 =
* Option to disable zoom on scroll for Google maps module.
* Minor fixes.

= 1.0.4 =
* Fixed issue where files were not being included on certain hosting providers.

= 1.0.3 =
* HTTPS Check for widgets
* New Google Maps module with shortcode, widget, and support for custom map styling.
* Homes.com Commute Time Widget
* Homes.com Featured Listing Widget
* Homes.com Home Values Widget
* Homes.com Search Widget
* Homes.com Mortgage Calculator Widget
* Homes.com Simple Search Widget
* Homes.com Tall Search Widget

= 1.0.2 =
* Removed widgets no longer supported by Zillow. For details please visit https://www.zillow.com/advice-thread/Where-are-the-widgets/684351/

= 1.0.1 =
* New Zillow Widgets

= 1.0.0 =
* First Release
* Offers Several Zillow Widgets
