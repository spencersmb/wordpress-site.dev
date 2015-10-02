<?php
/**
 * Custom Footer Settings
 */

if( isset( $wp_customize )){
  $wp_customize->add_section( 'custom_footer_settings' , array(
    'title'      => __('Footer Settings','bootstrap2wordpress'),
    'panel'      => 'general_settings',
    'priority'   => 1000
  ) );

//footer text box
  $wp_customize->add_setting(
    'w2b_footer_text',
    array(
      'default'         => __('Change Footer Text','bootstrap2wordpress'),
      'transport'       => 'postMessage',
      'sanitize_callback' => 'sanitize_text'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'custom_footer_settings',
      array(
        'label'      => __( 'Footer Text', 'bootstrap2wordpress' ),
        'section'    => 'custom_footer_settings',
        'settings'   => 'w2b_footer_text',
        'type'    => 'text'
      )
    )
  );

//footer social icon
  $wp_customize->add_setting(
    'w2b_footer_facebook',
    array(
      'default'         => __('','bootstrap2wordpress'),
      //'transport'       => 'postMessage',
      'sanitize_callback' => 'sanitize_text'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'custom_facebook_icon',
      array(
        'label'      => __( 'Facebook Username', 'bootstrap2wordpress' ),
        'section'    => 'custom_footer_settings',
        'settings'   => 'w2b_footer_facebook',
        'type'    => 'text'
      )
    )
  );

  // Add Custom Footer Logo Settings
  $wp_customize->add_setting(
    'w2b_footer_logo',
    array(
      'default'         => get_template_directory_uri() . '/assets/images/logo.png',
      //'transport'       => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'custom_footer_logo',
      array(
        'label'      => __( 'Footer Logo', 'bootstrap2wordpress' ),
        'section'    => 'custom_footer_settings',
        'settings'   => 'w2b_footer_logo',
        'context'    => 'w2b-footer-logo'
      )
    )
  );
}
