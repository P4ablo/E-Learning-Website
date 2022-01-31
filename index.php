<!-- Pobieranie podstron z bazy danych -->
<?php
  include("./cfg.php");
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// Dynamiczne ładowanie stron

 if($_GET["idp"] == '') $strona = 1;
 if($_GET["idp"] == "ang") $strona = 2;
 if($_GET["idp"] == "fiz") $strona = 3;
 if($_GET["idp"] == "kup_kurs") $strona = 4;
 if($_GET["idp"] == "logowanie") $strona = 5;
 if($_GET["idp"] == "mat") $strona = 6;
 if($_GET["idp"] == "materialy") $strona = 7;
 if($_GET["idp"] == "onas") $strona = 8;
 if($_GET["idp"] == "opinie") $strona = 9;
 if($_GET["idp"] == "rejestracja") $strona = 10;
 
?>
<!-- Strona główna, wszystkie potrzebne style oraz include nawigacji -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/34cdc8bdc5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="js/skrypt.js" defer></script>
    <title>E-Learning</title>
   
</head>
<body>
  
  <?php
    include("html/nav.html");
    
    include("./showpage.php");
	  echo PokazPodstrone($strona);
    
  ?>
  
</body>
</html>
</html>