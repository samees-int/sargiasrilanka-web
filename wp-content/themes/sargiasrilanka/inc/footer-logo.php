<?php
function sargia_footer_logo_customize_register($wp_customize)
{
    // Add a control to upload the footer logo inside the "Site Identity" section
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Footer Logo',
        'section' => 'title_tagline', // This places the control inside the "Site Identity" section
        'settings' => 'footer_logo',
        'priority' => 8, // Set the priority to control its position
    )));
}
add_action('customize_register', 'sargia_footer_logo_customize_register');


//Secound Logo
function sargia_logo_secound_customize_register($wp_customize)
{
    // Add a control to upload the footer logo inside the "Site Identity" section
    $wp_customize->add_setting('logo_secound', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_secound', array(
        'label' => 'Secound Logo',
        'section' => 'title_tagline', // This places the control inside the "Site Identity" section
        'settings' => 'logo_secound', 'priority' => 9, // Set the priority to control its position
    )));
}
add_action('customize_register', 'sargia_logo_secound_customize_register');


function get_secondary_logo()
{
    // Get the footer logo setting
    $secondary_logo = get_theme_mod('logo_secound', '');

    // Check if a footer logo has been set
    if (!empty($secondary_logo)) {
        $html = sprintf(
            '<a href="%1$s" class="secondary-logo-link " style="display:none" rel="home" ><img src="%2$s" class="secondary-logo navbar-brand"/></a>',
            esc_url(home_url('/')),
            $secondary_logo
        );
        return $html;
    }

    return false; // Return false if no footer logo is set
}
