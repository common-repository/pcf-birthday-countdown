=== PCF Birthday Countdown ===
Contributors: PCFDev
Donate link: http://www.example.com/
Tags: birthday, countdown, count, down, date, calendar, birth, day, pcf
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin that creates an easy to use birthday countdown for your WordPress sites.

== Description ==

= Basic Instructions =

Once the plugin is installed, go to **`Settings > General > PCF Countdown Options`** to input a name and date for the countdown.

Use the shortcode **`[pcf_bday_countdown]`** to output the countdown.

The countdown will output in days by default (e.g '105 days until `name`s Birthday').


= Changing output type =

The shortcode can be given a 'type' attribute, like so:

    [pcf_bday_countdown type="days|weeks|sleeps"]
    
This enables you to change the output type.

There are 3 types to choose from:

* Days
* Weeks
* Sleeps

If you do not specify the type attribute, or specify an invalid type, it will default to 'days'.

Example:

    [pcf_bday_countdown type="weeks"]

will output as

    It's `x` weeks and `y` days until `name`s Birthday!


= Styling the output =

*Styling the output is an advanced setting, that involves writing custom CSS.*

The shortcode can be given an 'id' attribute, which can then be used to style the output using CSS.

For example,

    [pcf_bday_countdown id="my-id"]

would output in HTML as

    <p id="my-id">...</p>

You can then add custom CSS through **`Appearance > Editor`**. If your theme supports custom CSS, you may be able to add your styles in Theme Options. If there is a custom css file in Editor, it is advised to use that for custom styles.

Here is an example of some custom styles:

    #my-id{
        color: blue;
        font-size: 16px;
        text-decoration: underline;
    }

This will set the output to be blue, underlined, and to have a font size of 16px.

== Installation ==

1. Upload 'pcf-birthday-countdown.zip' to WordPress
1. Activate the plugin once installed.
1. Configure all settings in **`Settings > General > PCF Countdown Options`**.
1. Place shortcode where you want the countdown to appear!

== Frequently Asked Questions ==

= Can I style the outputted text? =

Yes! You can add an ID using the id `id` attribute. See 'Description' for more information.

= Can I change the output text? =

No, you need the premium version of our plugin to do this.

== Screenshots ==

1. 'Days and Weeks' Countdown
1. 'Days' Countdown
1. 'Weeks' Countdown
1. 'Sleeps' Countdown

== Changelog ==

= 2.2 =

* [Fixed] Fixed a bug that caused the admin notice to appear on every page.

= 2.1 =

* [Added] Added widget feature for users who don't want to use shortcodes. The widget takes 2 inputs: type and id, which work in the same way as the shortcode attributes.
* [Update] Rewrote some algorithms for more robustness and efficiency.

= 2.0 =

* [Updated] Rewrote a large amount of the output code and changed the counter so that it is accurate.
* [Added] Added a new output for when the event is on the same day as viewing. i.e on the set date the output will be "It's `event`!".

= 1.3 =

* [Updated] Made the plugin show the word 'day' instead of 'days' when applicable. Same applies to 'weeks'.

= 1.2 =

* [Updated] Changed how 'weeks' outputs. Makes more sense now.

= 1.1 =

* [Added] Added a verification to make sure that the date entered is valid. (i.e if 30th of February is entered, it will automatically switch to the 28th or 29th, depending on whether it's a leap year.

= 1.0 =

* Published Plugin

== Upgrade Notice ==

= 2.2 =

* Fixed a bug, upgrading advised.

= 2.1 =

* Added some new features that may be useful, see changelog.
* Changed some algorithms so that the plugin is less buggy, upgrade if you can.

= 2.0 =

* Rewrote a large amount of the plugin for functionality. Upgrade as soon as you can.

= 1.3 =

* Changes plugin output to make more sense, upgrading is advised.

= 1.2 =

* Makes plugin make more sense. Upgrading is advisable.

= 1.1 =

* Makes plugin more robust, upgrading is advised.

= 1.0 =

N/A