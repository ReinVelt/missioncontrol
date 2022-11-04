<?= view('components/page/page-header'); ?>
<style>
  html, body {
	width:100%; 
	height:100%; 
	padding:0px; 
	margin:0px;
	overflow: hidden;
	background: #191d1e; /* Old browsers */
	background: -moz-linear-gradient(0deg,  #191d1e 50%, #283139 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right bottom, color-stop(50%,#191d1e), color-stop(100%,#283139)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(0deg,  #191d1e 50%,#283139 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(0deg,  #191d1e 50%,#283139 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(0deg,  #191d1e 50%,#283139 100%); /* IE10+ */
	background: linear-gradient(0deg,  #191d1e 50%,#283139 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#191d1e', endColorstr='#283139',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
	background-attachment: fixed
}

#projector {
  position: absolute; 
  top: 0px;
  left: 0px;
  width:100%;
  height:100%;
} 

.center-div {
	width:580px;
    height:374px;
    position:absolute;
    left:50%;
    top:50%;
    margin-left: -290px;
    margin-top:  -187px;
}

#preloaderDiv
{
	position:absolute;
	left:50%;
    top:50%;
    margin-left: -27px;
    margin-top:  -27px;
}

#logo{
	opacity:0;
    filter: alpha(opacity=0);
}

#date2014
{
	position:absolute;
	padding-left: 210px;
	padding-top:15px;
	opacity:0;
	top:303px;
	left:0;
    filter: alpha(opacity=0);
}

#buttonsDiv
{
	position:absolute;
	
    top:50%;
    left:20%;
    right:20%;
    margin-left: -27px;
    margin-top:  -27px;
    text-align: center; float:center;
}

#logom
{
	position:absolute;
	left:10%;
  right:10%;
    top:20%;
   text-align:center;
   font-size:64px;
   color:white;
   opacity:0.7; 
   font-weight:bold;
}

#backgroundcontainer {transition: background-image 5s; }

</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


<!-- CONTENT -->

<section id="backgroundcolor" class="container-fluid"   style="background-color:black; position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100vh; ">
  
</section>

<section id="backgroundcontainer0" class="container-fluid"   style="background-color:black; position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100vh; background:url('/wallpaper/dark1.jpg'); opacity:0; transition: background-image 5s; background-attachment:fixed; background-size: cover; background-repeat: no-repeat; background-position: center bottom;">
  
</section>

<section id="backgroundcontainer1" class="container-fluid"   style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100vh; background:url('/wallpaper/dark1.jpg'); opacity:1; transition: background-image 5s; background-attachment:fixed; background-size: cover; background-repeat: no-repeat; background-position: center bottom;">
  
</section>


<section id="content" class="container-fluid"   style=" position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100vh;">
   <canvas id="projector" style="width:100%; height:100%;">canvas not supported</canvas>
   <div id="logom" >M I S S I O N C O N T R O L
  </div>
    <div id="buttonsDiv"  >
      <center>
      <a class="btn btn-primary" onclick="$('#formModalLogin').modal('show');" title="accessability settings">
        <span class="material-symbols-outlined" >settings_accessibility</span>
        </a>
          <a class="btn btn-primary" onclick="$('#formModalLogin').modal('show');" title="login"  tooltip=ogin">
        <span class="material-symbols-outlined" >login</span>
        </a>
      
        <a class="btn btn-primary" onclick="$('#formModalLogin').modal('show');" title="Help">
        <span class="material-symbols-outlined" >Help</span>
        </a>
      <center>
    </div>
</section>

<div class="modal fade hide" tabindex="-1" id="formModalLogin" aria-labelledby="formModalLabel" aria-hidden="false" style="top:30vh; ">
  <div class="modal-dialog" id="dd">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">MISSIONCONTROL LOGIN</h1>
      </div>
      <div class="modal-body show active"  id="loginContainer">
        <form method="get" action="/app/missions/">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="passworde">
          </div>
          <div class="form-group">
          <label >&nbsp;</label>
            <input type="submit" value="login" class=" btn btn-primary form-control">
           </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
        <div id="map" width="0" height="0"></map>

<script language="javascript">

var backgrounds=['dark1.jpg','dark2.jpg','dark3.jpg','dark4.jpg','dark5.jpg','dark6.jpg','dark7.jpg','dark8.jpg','dark9.jpg','dark10.jpg','dark11.jpg','dark12.jpg','dark13.jpg','dark14.jpg'];
var backgroundseq=0;
function initPage()
{
  //if (!loggedIn)
  //{
  //$('#formModalLogin').modal({backdrop:'static'});
  $('#formModalLogin').modal('show');
  //}
 setInterval(newbackground,100);
}

function newbackground()
{
  var l=backgrounds.length;
  var b=document.getElementById("backgroundcontainer0");
  var c=document.getElementById("backgroundcontainer1");
  c.style.opacity=parseFloat(c.style.opacity)+0.01;
  b.style.opacity=parseFloat(b.style.opacity)-0.01;
  console.log(c.style.opacity);
  if (c.style.opacity>1)
  {
    backgroundseq++;
    if (backgroundseq==l ){backgroundseq=0;}
    b.style.backgroundImage = c.style.backgroundImage;
    c.style.backgroundImage = "url('"+baseUrl+"/wallpaper/"+backgrounds[backgroundseq]+"')";
    c.style.opacity=0
    b.style.opacity=1;
    //c.style.backgroundImage = "url('"+baseUrl+"/wallpaper/"+backgrounds[backgroundseq]+"')";
    
    //$("#backgroundcontainer").css("background-image", "url('"+baseUrl+"/wallpaper/"+backgrounds[backgroundseq]+"')");
   
  }
  //alert();

}
</script>

<script type="text/javascript" crossorigin src="/js/fx/easeljs-0.7.1.min.js"></script>
<script type="text/javascript" crossorigin src="/js/fx/TweenMax.min.js"></script>
<script type="text/javascript" crossorigin src="/js/bg.js"></script>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<?= view('components/page/page-footer'); ?>
