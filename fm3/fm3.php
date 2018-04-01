<?php
  define('SITE_NAME', 'foldermark.3');
  define('USER', 'tonio@loewald.com');
  define('PASSWORD', '5552199');
  define('PASSWORD_HINT', 'Michelle Pfieffer');
  define('WEB_ROOT', '..');

  session_start([
    'cookie_lifetime' => 86400
  ]);

  global $method, $detail;

  $request = $_GET['request'];
  $method = strtolower($_SERVER['REQUEST_METHOD']);

  list($action, $detail) = explode('/', $request, 2);

  $route = $action . '-' . $method . '.php';

  require($route);
?>