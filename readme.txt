=== WP Snack Menu ===
Contributors: johnjamesjacoby
Tags: admin, menus, admin menu
Requires at least: 4.3
Tested up to: 4.3
Stable tag: 1.1.0

== Description ==

Put the WordPress admin menu in your admin toolbar.

WP Snack Menu comes with a few filters to let you customize the menu if needed.

== Installation ==

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* No further setup or configuration is necessary.

== Frequently Asked Questions ==

= Does this create new database tables? =

No. There are no new database tables with this plugin.

= Does this modify existing database tables? =

No. All of WordPress's core database tables remain untouched.

= Does this work with other plugins and themes? =

Maybe. This depends on how those plugins and themes were designed to work. Many plugins use `is_admin()` checks to make sure their code only executes within the dashboard, which means their menus will not appear when visiting the front-end of your site.

= Where can I get support? =

The WordPress support forums: https://wordpress.org/tags/wp-snack-menu/

= Where can I find documentation? =

http://github.com/johnjamesjacoby/wp-snack-menu/

== Changelog ==

= 1.1.0 =
* Refresh

= 1.0.2 =
* Sanitize menu ID's
* Ensure all menu items have ID's for WordPress 3.3

= 1.0.1 =
* Strip tags from menu items to prevent alignment issues

= 1.0 =
* Public release
