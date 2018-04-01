<?php
// POST auth

  $data = json_decode(file_get_contents('php://input'), true);
  $user = $data['user'];
  $pw = $data['pw'];

  $_SESSION['auth'] = 'false';

  if ($user == USER && $_SESSION['code'] && $pw == $_SESSION['code']) {
    $_SESSION['auth'] = 'true';
    echo json_encode('ok');
  } else if ($user == USER && ! $pw) {
    $_SESSION['code'] = PASSWORD; // should make it str_pad(rand(0,999999), 6)
    echo json_encode(PASSWORD_HINT); // should email / text it to user
    // mail($user, SITE_NAME . ' authentication', $_SESSION['code'])
  } else {
    echo json_encode('rejected');
  }
?>