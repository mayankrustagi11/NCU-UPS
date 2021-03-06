<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

  <title><?php echo SITENAME; ?></title>
</head>
<body>

  <?php require_once APPROOT. '/views/inc/navbar.php'; ?>
  <button class="btn btn-dark" id="backToTopBtn" onclick="topFunction()"><i class="fas fa-angle-up"></i></button>
