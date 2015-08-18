<?php
/*
 * Spectaculous v1.0 - simple captcha script
 * (c) Web factory Ltd
 * www.webfactoryltd.com
**/

define('MAX_RAND_NB', 20);

/**** DO NOT EDIT BELOW THIS LINE ****/
/**** DO NOT EDIT BELOW THIS LINE ****/
  ob_start();
  session_start();

  // only AJAX calls allowed
  if (!isset($_SERVER['X-Requested-With']) && !isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    response('err', 'ajax');
  }

  if (isset($_GET['generate'])) {
    $a = rand(0, MAX_RAND_NB);
    $b = rand(0, MAX_RAND_NB);

    if ($a > $b) {
      $out = "$a - $b";
      $_SESSION['captcha'] = $a - $b;
    } else {
      $out = "$a + $b";
      $_SESSION['captcha'] = $a + $b;
    }
    die($out);
  } elseif (isset($_GET['captcha'])) {
      if($_GET['captcha'] == $_SESSION['captcha']) {
        die('true');
      } else {
        die('false');
      }
  }

  die('0');
?>