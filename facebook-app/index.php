<?php
//Always place this code at the top of the Page
session_start();
if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    header("location: home.php");
}
else{
  header("location: login-facebook.php");
}
?>
<head>
<title>Soulmate from IT BHU!!</title>
<meta name="description" content="if you have ever thought of having a soulmate on valentine day ,still after fewer attempts yor are unlucky then here is a chnace to play your luck::chooseout your real soulmate from IT BHU">
</head>