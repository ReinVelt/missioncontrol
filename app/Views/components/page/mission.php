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



</head>
<body>

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
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Status</a>
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

<!-- CONTENT -->

<section class="container-fluid">
   
    <div class="row">
        <div class="col-md-3">
            <div class="panel border rounded">
                <div class="panel-title">MISSION <?= $missionId; ?></div>
                <div id="missionDetails" class="panel-body">---</div>
            </div>   
            <div class="panel border ">
                <div class="panel-title">MISSION TARGETS <a href="#" onclick="getMissiontargetForm(<?= $missionId; ?>,0);" data-bs-toggle="modal" data-bs-target="#formModal">+</a></div>
                <div id="missionTargets" class="panel-body">---</div>
            </div>   

        
        </div>
        <div class="col-md-6">
            <div class="map" id="map"></div> 
            <div id="info"></div>
        </div>
        <div class="col-md-3">col3
        </div>

    </div>
   
        
    

</section>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>Page rendered in {elapsed_time} seconds</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> Rein Velt.</p>

    </div>

</footer>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">MISSION TARGETS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  id="missionTargetFormContainer">
        ...
      </div>
      
    </div>
  </div>
</div>

<div id="coordinateselector" style="width:100px; height:100px;"></div>

<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>
<script type="text/javascript" src="/vendor/bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" crossorigin src="/js/data/mission.js "></script>
<script type="text/javascript" crossorigin src="/js/forms.js"></script>

<script language="javascript">
  getMissionDetailData(<?= $missionId ?>);
  getMissionTargetData(<?= $missionId ?>);
  </script>
</body>
</html>
