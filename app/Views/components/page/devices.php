<?= view('components/page/page-header'); ?>

<!-- CONTENT -->

<section class="container-fluid">
   
    <div class="row">
        <div class="col-md-3">
          <div class="container " >
               
                  <div class="container rounded border">
                  <a href="#" class="" style="text-decoration:none; float:right; font-size:large " onclick="getMissionForm(0)"  data-bs-toggle="modal" data-bs-target="#formModal">+</a>
                    <h4>STATUS</h4>
                   
                    
                  </div>
              
              
               
            <div id="deviceList" class="list-group" style="max-height:85vh; overflow:scroll;">
              <div class="list-group-item">POWER 220V input</div>
              <div class="list-group-item">POWER 12V input</div>
              <div class="list-group-item">Temperature</div>
              <div class="list-group-item">Humidity</div>
              <div class="list-group-item">GPS</div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-auto">
           <img src="/busje.jpg" style="width:80%;">
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


<script language="javascript">
function initPage()
{
 
}
  </script>


<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<?= view('components/page/page-footer'); ?>
