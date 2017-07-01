=== WP send to Analytics ===
Contributors: simone.p
Tags: Google Analytics, events, tracking
Requires at least: 4.0.1
Tested up to: 4.8
Stable tag: 1.1.2
Donate: https://www.paypal.me/simonepetrucci
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
WP send to Analytics lets you monitor user interactions with the content (pages, posts)
 
== Description ==
 
**This plugin uses the universal Google Analytics script.**
**If you're implementing a different version of Google Analytics, or you have a custom tracker, WP send to Analytics will not work properly.**

WP send to Analytics helps having better data into Google Analytics: through a more accurate monitoring of user behaviour, it reduces the number of "0 seconds sessions".

The plugin automatically traks some user behaviours and sends a hit (event) to Google Analytics:

- By default, the plugin sends an event when the user reaches the end of the content (for Pages and Posts), including a "Value" in seconds, according to the time it takes the user to reach the end, from the first scrolling.
 
- You can ask the plugin to track the view of a custom selector, instead of the end-content one, by simply give that ID in the custom box in your posts and pages. 

 
== Installation ==
 
1. Unzip
2. copy the folder into your wp-content/plugins folder
3. go back to your admin panel => plugins and activate wps2a
4. Be sure you're already using Google Analytics script (analytics.js)
6. That's all. The plugin is working. If you want to monitor a custom element on your pages/posts, use the box in the right side of posts/pages	 to tell the plugin what to look for: if you write "#custom_selector", the plugin will send Analytics an event type hit when user will reach an element with id="custom_selector" attribute.

 
== Frequently Asked Questions ==
 
= Does it work with all the Google Analytics scripts? =
 
Nope, WP send to Analytics works with analytics.js version
 
= What happens if I don't use the metabox for jQuery/CSS selector? =
 
The plugins will be monitoring the content, and will push an event on Google Analytics when the user reaches its end.
 
== Screenshots ==
 
 
== Changelog ==
 
= 1.1.1 =
* Minor fixes to options

= 1.1 =
* Added Option Panel
 
= 1.0 =
* All seems to work properly
 
 
== Upgrade Notice ==
 
= 1.0 =



