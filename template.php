<?php

/**
 * Implements hook_preprocess_maintenance_page().
 */
function summer_fun_mobile_preprocess_maintenance_page(&$variables) {
  backdrop_add_css(backdrop_get_path('theme', 'topcoat_mobile') . '/css/maintenance-page.css');
}

/**
 * Implements hook_preprocess_layout().
 */
function summer_fun_mobile_preprocess_layout(&$variables) {
  if ($variables['content']['header']) {
    $variables['content']['header'] = '<div class="l-header-inner">' . $variables['content']['header'] . '</div>';
  }
}


/**
 * Implements theme_field__field_type().
 */
function summer_fun_mobile_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $item_attributes = (isset($variables['item_attributes'][$delta])) ? backdrop_attributes($variables['item_attributes'][$delta]) : '';
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $item_attributes . '>' . backdrop_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the surrounding DIV with appropriate classes and attributes.
  if (!in_array('clearfix', $variables['classes'])) {
    $variables['classes'][] = 'clearfix';
  }
  $output = '<div class="' . implode(' ', $variables['classes']) . '"' . backdrop_attributes($variables['attributes']) . '>' . $output . '</div>';

  return $output;
}


function summer_fun_preprocess_image_style(&$vars) {
  $vars['attributes']['class'][] = 'pure-img';
}

function summer_fun_button(&$vars) {

$classes = array('button-success', 'pure-button-primary', 'button-xlarge', 'pure-button');

if (!isset($vars['#attributes']['class'])) {
        $vars['#attributes'] = array('class' => $classes);
      }
      else {
        $vars['#attributes']['class'] = array_merge($vars['#attributes']['class'], $classes);
      }

if (!isset($vars['element']['#attributes']['class'])) {
        $vars['element']['#attributes'] = array('class' => $classes);
      }
      else {
        $vars['element']['#attributes']['class'] = array_merge($vars['element']['#attributes']['class'], $classes);
      }

return theme_button($vars);
dsm($vars);
}


/**
 * Implements hook_form_alter()
 */
function summer_fun_form_alter(&$form, &$form_state, $form_id) {
$classes = array('pure-form', 'pure-form-aligned');
if (!isset($form['#attributes']['class'])) {
        $form['#attributes'] = array('class' => $classes);
      }
      else {
        $form['#attributes']['class'] = array_merge($form['#attributes']['class'], $classes);
      }
}

function summer_fun_menu_tree($variables) {
return '<ul class="menu">' . $variables['tree'] . '</ul>';
}

/**
 * Overrides theme_form_element_label().
 */
function summer_fun_form_element_label(&$variables) {
  $element = $variables['element'];
  $title = filter_xss_admin($element['#title']);
 // If the element is required, a required marker is appended to the label.
  $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';
//   // This is also used in the installer, pre-database setup.
   $t = get_t();
   $attributes = array();

   if (!empty($element['#id'])) {
     $attributes['for'] = $element['#id'];
   }

   $output = '';
   if (isset($variables['#children'])) {

    if ($element['#type'] === "radio")
    {
    $output .= $variables['#children'];
    }

    if ($element['#type'] === "checkbox")
    {
    $output .= $variables['#children'];
    }

   }
   return ' <label' . drupal_attributes($attributes) . '></label><div>' . $t('!title', array('!title' => $title)) .  "</div> \n";
}
