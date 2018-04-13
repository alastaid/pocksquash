<?php

  include logic/httpful.phar;
  require_once('logic/Mobile_Detect.php');
  $mobile = new Mobile_Detect;
  $mobile->isMobile();

  // redirect all mobiles to mobile site and all other browsers to desktop site
  if($mobile->isMobile()){
    header('Location:m/mhome.php');
  }else{
    header('Location:home.php');
  }
  exit;

?>

