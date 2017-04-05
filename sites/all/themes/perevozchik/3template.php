<?php



function phptemplate_preprocess_page(&$vars)
{
  $css = $vars['css'];
//Запрет на загрузку файла стилей системного модуля.
  unset($css['all']['module']['modules/system/system.css']);
  unset($css['all']['module']['modules/system/defaults.css']);

//Если есть надобность запретить загрузку других файлов стилей, то вписываем и их тоже.

  $vars['styles'] = drupal_get_css($css);
} 

?>