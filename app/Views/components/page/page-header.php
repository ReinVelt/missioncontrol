<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Mission Control</title>
    <meta name="description" content="R31N">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
   
    <link rel="stylesheet" href="/vendor_ext/bootstrap-5.2.2-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/vendor_ext/timeline-master/dist/css/timeline.min.css"/>
    <script src="/vendor_ext/timeline-master/dist/js/timeline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.1.0/dist/ol.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.1.0/ol.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.1.0/dist/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.1.0/ol.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<style>
  body { background:black;}
  body, td, div, span, a, .navbar { color:silver;}
footer { position:fixed; bottom:0px; left:0px; right:0px; height:20px;  color:white;  font-size:xx-small; z-index:2000; opacity:0.7; text-align:center;}
.list-group-item { background: #444444; color:#cccccc;}
.list-group-item .title { font-size:large; font-weight:bold; color:White;}
.list-group-item .description { font-size:x-small;  overflow:hidden;}
.list-group-item .subtitle { font-size:x-small; color:darkgray; }
.list-group-item .badge { border-radius:1em; border:solid 1px silver; color:black; ; font-size:x-small; }
.list-group-item a {text-decoration:none;}
.active  a { color:white;}
.list-group-item * .hover {opacity:0}
.list-group-item:hover * .hover {opacity:1;}
.title { font-weight:bold; font-size:large;}
.navbar-brand {font-size:small; font-weight:bold; color:yellow;}
.material-symbols-outlined { font-size:large; padding:2px; margin:0px;} 
.material-icons { vertical-align:sub; font-size:16px; font-weight:normnal; color:white;}
a .material-icons {text-decoration:none;}
.nav-link {padding:2px;; font-size:small; color:white; text-align:center; vertical-align:baseline;} 
.list-group-item .missioninfo {position:absolute; left:20vw;;  font-size:large; margin-top:-50px; width:20vw; background:#333333; color:white; z-index:1000; display:none; border:solid 1px darkgray; border-radius: 10px; padding:0.2em;}
.timeline__content .missioninfo {position:fixed; top:-100px; font-size:large;  width:20vw; background:#333333; color:white; z-index:1000; display:none; border:solid 1px darkgray; border-radius: 10px; padding:0.2em;}

.missioninfo .description {font-size:large;}
.list-group-item:hover  .missioninfo { display:block;}
.timeline__content {  height:100px; opacity:0.3;}
.timeline__content:hover  .missioninfo { display:block;}

* {
	opacity: 1;
	animation-name: fadeInOpacity;
	animation-iteration-count: 1;
	animation-timing-function: ease-in;
	animation-duration: 500ms;
}

@keyframes fadeInOpacity {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}
</style>
<script language="javascript">
var baseUrl="<?= base_url(); ?>";
</script>
</head>
<body onload="initPage();">

<!-- HEADER: MENU + HEROE SECTION -->
<header>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand btn btn-outline-primary" href="/app">MISSIONCONTROL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link  btn btn-outline-secondary <?php if ($pagename=="index") { print "active"; } ?>" aria-current="page" href="/app/">
            <span class="material-symbols-outlined"  data-bs-toggle="home"  title="go home">home</span>Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  btn btn-outline-secondary <?php if ($pagename=="missions") { print "active"; } ?>" aria-current="page" href="/app/missions"><span class="material-symbols-outlined"  data-bs-toggle="home"  title="go home">place</span>Missions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-secondary <?php if ($pagename=="devices") { print "active"; } ?>" href="/app/devices"><span class="material-symbols-outlined"  data-bs-toggle="home"  title="go home">airport_shuttle</span>Devices</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-togglev btn btn-outline-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="material-symbols-outlined"  data-bs-toggle="home"  title="go home">settings</span>Settings
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"  data-bs-toggle="home"  title="go home">Action</a></li>
            <li><a class="dropdown-item" href="#"  data-bs-toggle="home"  title="go home">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"  data-bs-toggle="home"  title="go home">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  data-bs-toggle="home"  title="go home">
        <button class="btn btn-outline-success" type="submit"  data-bs-toggle="home"  title="go home">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>

