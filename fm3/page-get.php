<?php
// GET page
  global $detail;

  define('FORBIDDEN_ASSET_NAMES', '/^(favicon\..*|.*\.php|index.html)$/');

  $path = $detail ? (WEB_ROOT . '/' . $detail) : WEB_ROOT;
  $list = scandir( $path );
  $filtered = array();
  foreach($list as $item) {
    if (! preg_match(FORBIDDEN_ASSET_NAMES, $item)) {
      $item_path = $path . '/' . $item;
      if ($item[0] != '.' && $item != 'fm3' && ! is_dir($item_path)) {
        $filtered []= ['path' => $item, 'size' => filesize($item_path)];
      }
    }
  }

  echo json_encode($filtered);
?>