<?php
/*
Plugin Name: GR Canvas Home Full Slider
Plugin URI: https://github.com/GrandRapidsWeb/canvas-home-page
Description: Adds full width slider widget area and headline text area to homepage on a Canvas theme. Now With Plugin Auto Update Functionality.
Version: 1.0
Author: John Wierenga
Author URI: http://johnewierenga.com

/*  Copyright 2014 John Wierenga (email : johnewierenga@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/      

require_once( 'BFIGitHubPluginUploader.php' );
if ( is_admin() ) {
    new BFIGitHubPluginUpdater( __FILE__, 'grandrapidsweb', "canvas-home-page" );
}
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Home Slider Widget',
'id' => 'home-slider-widget',
'description' => 'The widget area for the slideshow on the homepage',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>'
));
}
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Home Text Widget',
'id' => 'home-text-widget',
'description' => 'The widget area for the text  slideshow on the homepage',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>'
));
}

function gr_home_widget() {
    if (is_front_page()) { ?><ul style="margin: 0 auto; text-align: center;"><div class="home-slider-widget"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Slider Widget')) :

endif; ?></div><div class="home-text-widget"> <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Text Widget')) :

endif;?></div></ul><?php }
}
add_action('woo_content_before','gr_home_widget');
?>
