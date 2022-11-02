<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Mission Control</title>
    <meta name="description" content="R31N">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
   
    <link rel="stylesheet" href="/vendor/bootstrap-5.2.2-dist/css/bootstrap.css"/>
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.1.0/dist/ol.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.1.0/ol.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.1.0/dist/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.1.0/ol.css">
<style>
footer { position:fixed; bottom:0px; left:0px; right:0px; height:32px; background:black; color:white;  font-size:xx-small;}
</style>
<script language="javascript">
var baseUrl="<?= base_url(); ?>";
</script>
</head>
<body onload="initPage();">

<!-- HEADER: MENU + HEROE SECTION -->
<header>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MISSION CONTROL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Missions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/devices">Status</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actions
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>