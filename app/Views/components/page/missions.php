<?= view('components/page/page-header'); ?>

<!-- CONTENT -->

<section class="container-fluid" >
   
    <div class="row">
        <div class="col-md-3">
          <div class="container-fluid  rounded border" >
               
                  <div class="container">
                  <a href="#" class="" style="text-decoration:none; float:right; font-size:large " onclick="getMissionForm(0)"  data-bs-toggle="modal" data-bs-target="#formModal"><span class="material-symbols-outlined">add_location</span></a>
                    <h5><span class="material-symbols-outlined">tour</span> MISSIONS</h5>
                   
                    
                  </div>
              
              
               
            <div id="missionsList" class="list-group" style="max-height:85vh; overflow:scroll;">
            </div>
          </div>
        </div>
        <div class="col-md-9 col-auto">
            <div class="map" id="map" style="width:100%; height:90vh" data-kml="http://localhost:8080/api/mission/kml" ></div> 
            <div id="info"></div>
        </div>
       >

    </div>
 
        
    

</section>


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
