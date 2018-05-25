# wp-countryclass

=== WP Country Class In Body Tag===
Contributors: kashanshah
Donate link: http://kashanshah.ga/
Tags: developers, country names, body tag
Requires at least: 4.0.1
Tested up to: 4.9.5
Requires PHP: 5.2.4
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is developed to add visitor's country class on the body tag of the page to use in displaying country based content on the website! By using the country class, the developer may show/hide/modify content with css/js.

== Description ==

This plugin is developed to add visitor's country class on the body tag of the page to use in displaying country based content on the website! By using the country class, the developer may show/hide/modify content with css/js. It uses a 3rd Party API (GeoPlugin.net) for this purpose. It send the user's IP Adress to GeoPlugin.net, i.e. http://www.geoplugin.net/json.gp?ip=XXX.XXX.XX.XXX, which in response returns the geo-location information about that IP Adress, out of which our plugin adds the country code as classname in the body tag.

== Frequently Asked Questions ==

= Does it use any third-party API? =
Yes, it uses geoplugin API http://www.geoplugin.net

= Does it add any css or js? =
No, this plugin does not add any css/js. It only adds a body class respective to the country of the website visitor.

= What is the class added in body for a visitor from US? =
'wpcountryclass-US' and 'wpcountryclass-detected' are added as classes in body tag for a user from US. Similarly, 'wpcountryclass-detected' and 'wpcountryclass-PK' will be added when the visitor is from Pakistan. and so on it will add 'wpcountryclass-detected' and 'wpcountryclass-[ISO ALPHA-2 Code]' whenever any visitor visits the website.

= Does it also adds a class if the country is not detected? =
Yes, 'wpcountryclass-not-detected' is added when country of the user's IP is not detected.

== Screenshots ==
1. Activate the plugin
2. Guide about the plugin may be found in "WP Country Class In Body Tag" option under Settings in menu bar.
3. "WP Country Class In Body Tag" page.

== Changelog ==
= 1.0.2 =
* Plugin file comments updated

= 1.0.1 =
* No change in functionality and the code
* Icons, Screenshots, Detailed description and FAQs added
* Plugin name changed to "WP Country Class In Body Tag" from "WP Country Class"
* Compatibility tested upto 4.9.5

= 1.0.0 =
* First release.

== Upgrade Notice ==
= 1.0.2 =
Plugin file comments updated

= 1.0.1 =
Compatibility tested upto 4.9.5
