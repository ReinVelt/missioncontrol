<?= view('components/page/page-header',array("missionId"=>$missionId,"pagename"=>$pagename)); ?>

<!-- CONTENT -->


   
   
          

        
        
            <div class="map" id="map" style="position:absolute; top:50px; left:20vw; right:10px; bottom:150px;  border:solid 1px darkgray; border-radius:10px; overflow:hidden;" data-kml="<?= base_url(); ?>/api/missiontarget/kml/<?= $missionId; ?>"></div> 
            <div id="info"></div>

            <div class="border rounded"  style="position:absolute; top:50px; left:0; width:20vw; z-index:200; background:black; opacity:0.8;  padding:1em; " >
                <div class="panel-title">MISSION <?= $missionId; ?> <a href="/app/missions/"  style="float:right; "><span class="material-icons" data-bs-toggle="tooltip"  title="go back to missions">arrow_left</span></a></div>
                <small style="float:right;"><a data-bs-toggle="modal" title="edit" data-bs-target="#formModalMission" class="material-icons" onclick="getMissionForm(<?= $missionId; ?>); return false;">settings</a></small>
         
                <div id="missionDetails" class="panel-body">---</div>
              
              <div class="container" style="margin-top:1em" >
                <div class="panel  ">
                    <div class="panel-title">TARGETS 
                      <a href="#" onclick="getMissiontargetForm(<?= $missionId; ?>,0);" style="float:right" data-bs-toggle="modal" data-bs-target="#formModalMissionTarget">
                        <span class="material-icons" data-bs-toggle="tooltip" title="add mission objective">add_location</span>
                      </a>
                    </div>
                    <div id="missionTargets" class="panel-body">---</div>
                </div>   
              </div>
            </div> 
    
        <div class="col-md-9" style="position:absolute; bottom:0px; left:20vw; right:0px; height:130px; overflow:scroll; ; z-index:200; " >
          <a style="float:right;" data-bs-toggle="modal" data-bs-target="#formModalMedia" class="material-icons" onclick="getMediaForm(<?= $missionId; ?>); return false;">upload</a>
          <div class="container-fluid" id="missionMediaList" style="width:100%;"></div>
        </div>

    </div>
   
        
    





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
<div class="modal fade" id="formModalMissionTarget" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
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

<div class="modal fade" id="formModalMission" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
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

<div class="modal fade" id="formModalMedia" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">MEDIA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"  id="mediaFormContainer">
        ...
      </div>
      
    </div>
  </div>
</div>



<script type="text/javascript" crossorigin src="/js/data/mission.js"></script>
<script language="javascript">
function initPage()
{
  getMissionDetailData(<?= $missionId ?>);
  getMissionTargetData(<?= $missionId ?>);
  getMissionMedia(<?= $missionId ?>);
}
  </script>

<?= view('components/page/page-footer',array("missionId"=>$missionId)); ?>