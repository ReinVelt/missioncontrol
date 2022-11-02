<?= view('components/page/page-header',array("missionId"=>$missionId)); ?>

<!-- CONTENT -->

<section class="container-fluid">
   
    <div class="row">
        <div class="col-md-3">
            <div class="panel border rounded">
                <div class="panel-title">MISSION <?= $missionId; ?></div>
                <small><a data-bs-toggle="modal" data-bs-target="#formModalMission" class="material-icons" onclick="getMissionForm(<?= $missionId; ?>); return false;">edit</a></small>
         
                <div id="missionDetails" class="panel-body">---</div>
            </div>   
            <div class="panel border ">
                <div class="panel-title">MISSION TARGETS <a href="#" onclick="getMissiontargetForm(<?= $missionId; ?>,0);" data-bs-toggle="modal" data-bs-target="#formModalMissionTarget">+</a></div>
                <div id="missionTargets" class="panel-body">---</div>
            </div>   

        
        </div>
        <div class="col-md-6">
            <div class="map" id="map" style="width:100%; height:90vh;" data-kml="http://localhost:8080/api/missiontarget/kml/<?= $missionId; ?>"></div> 
            <div id="info"></div>
        </div>
        <div class="col-md-3">
        <a data-bs-toggle="modal" data-bs-target="#formModalMedia" class="material-icons" onclick="getMediaForm(<?= $missionId; ?>); return false;">upload</a>
        <div class="container-fluid" id="missionMediaList"></div>
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