<?php
// GET tree
  global $detail;

  define('FORBIDDEN_PAGE_NAMES', '/^(fm3|images|style|css|js|lib|components)$/');


  function folder($path, $url=false) {
    $list = scandir( $path ? WEB_ROOT . '/' . $path : WEB_ROOT );
    $tree = array();
    foreach($list as $item) {
      $item_path = $path ? $path . '/' . $item : $item;
      if (
        $item[0] != '.' 
        && ! preg_match(FORBIDDEN_PAGE_NAMES, $item)
        && is_dir(WEB_ROOT . '/' . $item_path)
      ) {
        $name = array_pop(explode('_', $item));
        $name = str_replace(' ', '-', $name);
        $name_path = $url ? $url . '/' . $name : $name;
        $tree []= [
          'name' => $name,
          'url' => $name_path,
          'path' => $item_path,
          'children' => folder($item_path, $name_path)
        ];
      }
    }
    return $tree;
  }

  $tree = [
    'name' => SITE_NAME,
    'url' => '',
    'path' => '',
    'children' => folder($detail, $url)
  ];

  echo json_encode($tree);
?>