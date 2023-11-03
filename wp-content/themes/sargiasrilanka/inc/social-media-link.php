<?php

function custom_social_media_links_customize_register($wp_customize)
{
    // Add the "Social Media Links" section
    $wp_customize->add_section('social_media_links_section', array(
        'title' => 'Social Media Links',
        'priority' => 30,
    ));

    // Add setting and control for Facebook link
    $wp_customize->add_setting('facebook_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // You can add a custom sanitization function
    ));

    $wp_customize->add_control('facebook_link', array(
        'label' => 'Facebook Link',
        'section' => 'social_media_links_section',
        'type' => 'text',
    ));

    // Add setting and control for Twitter link
    $wp_customize->add_setting('twitter_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('twitter_link', array(
        'label' => 'Twitter Link',
        'section' => 'social_media_links_section',
        'type' => 'text',
    ));

    // Add setting and control for Instagram link
    $wp_customize->add_setting('instagram_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('instagram_link', array(
        'label' => 'Instagram Link',
        'section' => 'social_media_links_section',
        'type' => 'text',
    ));

    // Add setting and control for Youtube link
    $wp_customize->add_setting('youtube_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('youtube_link', array(
        'label' => 'Youtube Link',
        'section' => 'social_media_links_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'custom_social_media_links_customize_register');
