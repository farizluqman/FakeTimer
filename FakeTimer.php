<?php
/**
 * Plugin Name: FakeTimer
 * Plugin URI: https://nakwebsite.com
 * Description: Per visitor countdown plugin that will continue when the visitor left the website.
 * Version: 2020.1
 * Author: Fariz Luqman
 * Author URI: https://nakwebsite.com
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 **/
include_once('classes/FakeTimer.php');
include_once('classes/TodaysDate.php');

// Add Shortcode
function fake_timer_shortcode($attrs)
{
    wp_enqueue_style('faketimer.css');
    wp_enqueue_script("jquery");
    wp_enqueue_script('moment.min.js');
    wp_enqueue_script('faketimer.js');
    $fake_timer = new FakeTimer();
    return $fake_timer->generateHtml($attrs);
}

function todays_date_shortcode($attrs)
{
    wp_enqueue_script("jquery");
    wp_enqueue_script('moment.min.js');
    $todays_date = new TodaysDate($attrs);
    return $todays_date->get($attrs);
}

wp_register_script('moment.min.js', 'https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js', null, null, true);
wp_register_script('faketimer.js', plugins_url('/js/faketimer.js', __FILE__), null, null, true);
wp_register_style('faketimer.css', plugins_url('/css/faketimer.css', __FILE__), null, null);


add_shortcode('faketimer', 'fake_timer_shortcode');
add_shortcode('FakeTimer', 'fake_timer_shortcode');
add_shortcode('Faketimer', 'fake_timer_shortcode');
add_shortcode('fakeTimer', 'fake_timer_shortcode');

add_shortcode('todaysdate', 'todays_date_shortcode');
add_shortcode('todaysDate', 'todays_date_shortcode');
add_shortcode('Todaysdate', 'todays_date_shortcode');
add_shortcode('TodaysDate', 'todays_date_shortcode');