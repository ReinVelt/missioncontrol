<?= view('components/page/page-header',array("pagename"=>$pagename)); ?>

<!-- CONTENT -->
<div class="map" id="map" style="position:absolute; top:50px; left:20vw; right:10px; bottom:32px;  border:solid 1px darkgray; border-radius:10px; overflow:hidden;" data-kml="http://localhost:8080/api/mission/kml" ></div> 

   
    <div style="position:absolute; top:50px; left:0px; width:20vw; z-index:1000;">
      
               
                  <div class="container">
                  <a href="#" class="" style="text-decoration:none; float:right; font-size:large " onclick="getMissionForm(0)"  data-bs-toggle="modal" data-bs-target="#formModal"><span class="material-symbols-outlined">add_location</span></a>
                    <h5><span class="material-symbols-outlined">tour</span> MISSIONS</h5>
                   
                    
                  </div>
              
              
               
            <div id="missionsList" class="list-group" >
            </div>
        
       

       
      

    </div>
 
                 
<!--<div class="timeline" id="timeline" style="position:absolute; bottom:0px; width:20vw; left:0vw; height:40vh;; z-index:1001;"></div>-->
    




<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">MISSION</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  id="missionFormContainer">
        ...
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript" crossorigin src="/js/data/main.js"></script>
<script language="javascript">
function initPage()
{
 
}
  </script>


<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<?= view('components/page/page-footer'); ?>
