<?php
/**
 * @file
 * Theme settings for Summer Fun parent theme
 *
*/

function summer_fun_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {

if (isset($form_id)) {
   return;
  }

$form['disclaimer00'] = array(
  '#markup' => '<p><strong>' . t('These settings for the parent theme do NOT extend into the subtheme.') . '</strong></p>',
);

$form['use_max_width'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('<b>Check to use the admin settings below </b> to control the theme max-width. <b>Uncheck</b> to write CSS to control the theme max-width.'),
    '#default_value' => theme_get_setting('use_max_width', 'summer_fun'),
  );

$layouts = layout_load_all();
$layout_items = array();
$options = array();
foreach ($layouts as $layout => $item) {
    $options[$item->name] = check_plain($item->title);
}


$form['maxwidth1'] = array(
        '#title' => t('Theme Max-Width 1'),
        '#type' => 'fieldset',
    );
$default_layout_items = config_get('summer_fun.settings', 'site_layouts1');
$default_value = array();
foreach ($default_layout_items as $default_layout_item) {
   if (isset($options[$default_layout_item])) {
       $default_value[$default_layout_item] = $default_layout_item;
   }
}

  $form['maxwidth1']['site_layouts1'] = array(
        '#title' => t('Set a site max-width on these layouts:'),
        '#type' => 'checkboxes',
        '#options' => $options,
        '#default_value' => $default_value
    );

  $form['maxwidth1']["max_width_element1"] = array(
        '#title' => t('For this page area:'),
        '#type' => 'select',
        '#options' => array("full page", "page content"),
        '#default_value' => config_get('summer_fun.settings', 'max_width_element1')
    );

  $form['maxwidth1']["max_width_number1"] = array(
        '#title' => t('At: '),
        '#type' => 'select',
        '#options' => array("800px", "960px", "Bootstrap container default", "1200px", "1440px"),
        '#default_value' => config_get('summer_fun.settings', 'max_width_number1')
    );




$form['maxwidth2'] = array(
        '#title' => t('Theme Max-Width 2'),
        '#type' => 'fieldset',
    );
$default_layout_items = config_get('summer_fun.settings', 'site_layouts2');
$default_value = array();
foreach ($default_layout_items as $default_layout_item) {
   if (isset($options[$default_layout_item])) {
       $default_value[$default_layout_item] = $default_layout_item;
   }
}

  $form['maxwidth2']['site_layouts2'] = array(
        '#title' => t('Set another site max-width on these layouts:'),
        '#type' => 'checkboxes',
        '#options' => $options,
        '#default_value' => $default_value
    );

  $form['maxwidth2']["max_width_element2"] = array(
        '#title' => t('For this page area:'),
        '#type' => 'select',
        '#options' => array("full page", "page content"),
        '#default_value' => config_get('summer_fun.settings', 'max_width_element2')
    );

  $form['maxwidth2']["max_width_number2"] = array(
        '#title' => t('At: '),
        '#type' => 'select',
        '#options' => array("800px", "960px", "Bootstrap container default", "1200px", "1440px"),
        '#default_value' => config_get('summer_fun.settings', 'max_width_number2')
    );




$form['maxwidth3'] = array(
        '#title' => t('Theme Max-Width 3'),
        '#type' => 'fieldset',
    );
$default_layout_items = config_get('summer_fun.settings', 'site_layouts3');
$default_value = array();
foreach ($default_layout_items as $default_layout_item) {
   if (isset($options[$default_layout_item])) {
       $default_value[$default_layout_item] = $default_layout_item;
   }
}

  $form['maxwidth3']['site_layouts3'] = array(
        '#title' => t('Set another site max-width on these layouts:'),
        '#type' => 'checkboxes',
        '#options' => $options,
        '#default_value' => $default_value
    );

  $form['maxwidth3']["max_width_element3"] = array(
        '#title' => t('For this page area:'),
        '#type' => 'select',
        '#options' => array("full page", "page content"),
        '#default_value' => config_get('summer_fun.settings', 'max_width_element3')
    );

  $form['maxwidth3']["max_width_number3"] = array(
        '#title' => t('At: '),
        '#type' => 'select',
        '#options' => array("800px", "960px", "Bootstrap container default", "1200px", "1440px"),
        '#default_value' => config_get('summer_fun.settings', 'max_width_number3')
    );

$form['summer_fun_cdn'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('<b>Use Cloudflare CDN</b> instead of this website to serve the base CSS file.'),
    '#default_value' => theme_get_setting('summer_fun_cdn', 'summer_fun'),
  );

$form['disclaimer'] = array(
  '#markup' => '<p>' . t('You may choose to include these Javascript files into your page to help enable these certain components.  WARNING: some of the components may rely on multiple scripts, and you are responsible for adding the theme template functions to utilize these functionalities.  If you do not need these functionalities for this website, you may leave each unchecked.') . '</p>',
);

$form['summer_fun_script1'] = array(
      '#type' => 'checkbox',
      '#title' => t('Load script modernizr.js'),
      '#default_value' => theme_get_setting('summer_fun_script1', 'summer_fun'),
    );

$form['summer_fun_script2'] = array(
      '#type' => 'checkbox',
      '#title' => t('Load script jquery-validate.js'),
      '#default_value' => theme_get_setting('summer_fun_script2', 'summer_fun'),
    );

$form['summer_fun_script3'] = array(
      '#type' => 'checkbox',
      '#title' => t('Load script fastclick.js'),
      '#default_value' => theme_get_setting('summer_fun_script3', 'summer_fun'),
    );

$form['summer_fun_script4'] = array(
      '#type' => 'checkbox',
      '#title' => t('Load script hammer.js'),
      '#default_value' => theme_get_setting('summer_fun_script4', 'summer_fun'),
    );

// backgrounds
$form['summer_fun_backgrounds'] = array(
        '#title' => t('Set background images for site regions'),
        '#type' => 'fieldset',
    );

// body area
$form['summer_fun_backgrounds']["disclaimer"] = array(
  '#markup' => '<p>' . t('An image style such as [mywebsite.com/]files/styles/[large or custom]/[path to image] or one of these services may be helpful here: imgix.com, imagefly.io, cloudinary.com, imageresizer.io or aws.amazon.com/s3.') . '</p>',
);

$form['summer_fun_backgrounds']['summer_fun_body_main_background'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for the main page area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_body_main_background', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_body_main_background_retina'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for high resolution screens for the main page area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_body_main_background_retina', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_body_main_background_blurred'] = array(
      '#type' => 'checkbox',
      '#title' => t('Blur this background'),
      '#default_value' => theme_get_setting('summer_fun_body_main_background_blurred', 'summer_fun'),
    );




//l-calltoaction area
$form['summer_fun_backgrounds']['summer_fun_footer_main_background'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for the call to action area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_footer_main_background', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_footer_main_background_retina'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for high resolution screens for the call to action area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_footer_main_background_retina', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_footer_main_background_blurred'] = array(
      '#type' => 'checkbox',
      '#title' => t('Blur this background'),
      '#default_value' => theme_get_setting('summer_fun_footer_main_background_blurred', 'summer_fun'),
    );


//juiced-main area
$form['summer_fun_backgrounds']['summer_fun_juiced_main_background'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for the main page area when you are using a Juiced layout'),
      '#default_value' => theme_get_setting('summer_fun_juiced_main_background', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_juiced_main_background_retina'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for high resolution screens for the main page area when you are using a Juiced layout'),
      '#default_value' => theme_get_setting('summer_fun_juiced_main_background_retina', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_juiced_main_background_blurred'] = array(
      '#type' => 'checkbox',
      '#title' => t('Blur this background'),
      '#default_value' => theme_get_setting('summer_fun_juiced_main_background_blurred', 'summer_fun'),
    );






//statement 1
$form['summer_fun_backgrounds']['summer_fun_statement1_background'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for the big statement 1 area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_statement1_background', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_statement1_background_retina'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for high resolution screens for the big statement 1 area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_statement1_background_retina', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_statement1_background_blurred'] = array(
      '#type' => 'checkbox',
      '#title' => t('Blur this background'),
      '#default_value' => theme_get_setting('summer_fun_statement1_background_blurred', 'summer_fun'),
    );






//statement 2
$form['summer_fun_backgrounds']['summer_fun_statement2_background'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for the big statement 2 area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_statement2_background', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_statement2_background_retina'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for high resolution screens for the big statement 2 area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_statement2_background_retina', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_statement2_background_blurred'] = array(
      '#type' => 'checkbox',
      '#title' => t('Blur this background'),
      '#default_value' => theme_get_setting('summer_fun_statement2_background_blurred', 'summer_fun'),
    );





//statement 3
$form['summer_fun_backgrounds']['summer_fun_statement3_background'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for the big statement 3 area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_statement3_background', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_statement3_background_retina'] = array(
      '#type' => 'textarea',
      '#title' => t('Enter the URL to your desired background image for high resolution screens for the big statement 3 area in a layout.'),
      '#default_value' => theme_get_setting('summer_fun_statement3_background_retina', 'summer_fun'),
    );

$form['summer_fun_backgrounds']['summer_fun_statement3_background_blurred'] = array(
      '#type' => 'checkbox',
      '#title' => t('Blur this background'),
      '#default_value' => theme_get_setting('summer_fun_statement3_background_blurred', 'summer_fun'),
    );


$form['css_helpers'] = array(
  '#markup' => '<p>' . t('Looking for CSS theming help?  You can use these CSS class selectors from layouts in your theme: <br /> l-header <br /> l-wrapper <br /> l-top <br /> l-content <br /> l-sidebar1 <br /> l-sidebar2 <br /> l-halfs <br /> l-half1 <br /> l-half2 <br /> l-thirds <br /> l-third1 <br /> l-third2 <br /> l-third3 <br /> l-quarters <br /> l-quarter1 <br /> l-quarter2 <br /> l-quarter3 <br /> l-quarter4 <br /> l-statement1 <br /> l-statement2 <br /> l-statement3 <br /> l-secondary1 <br /> l-secondary2 <br /> l-bottom <br /> l-calltoaction <br /> l-footer <br />') . '</p>',
);

$form['recommended'] = array(
  '#markup' => '<p>' . t('Looking for additional theme features?  You might find what you are looking in layouts or modules.  Some common items to add to your site might be:<br><a href="https://backdropcms.org/modules">Modules</a><br><a href="https://backdropcms.org/layouts">Layouts</a><br>Menus<br><a href="https://backdropcms.org/project/mobile_navigation">Mobile Navigation</a><br><a href="https://backdropcms.org/project/responsive_menus">Responsive Menus</a><br><a href="https://backdropcms.org/project/wpmenu">WPMenu</a><br>Widgets<br><a href="https://backdropcms.org/project/google_fonts">Google Fonts</a><br><a href="https://backdropcms.org/project/back_to_top">Back To Top</a><br><a href="https://backdropcms.org/project/fanciblock">FanciBlock</a><br><a href="https://backdropcms.org/project/flexslider">FlexSlider</a><br>Parallax<br><a href="https://backdropcms.org/project/parallax_bg">Parallax_BG</a><br><a href="https://backdropcms.org/project/scrollreveal">Scroll Reveal</a><br><a href="https://backdropcms.org/project/void_menu">Void Menu</a> ') . '</p>',
);

}
