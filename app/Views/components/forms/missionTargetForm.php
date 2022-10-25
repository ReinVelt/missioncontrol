<?= \Config\Services::validation()->listErrors(); ?>

 

<span class="d-none alert alert-success mb-3" id="res_message"></span>

<form id="missiontargetForm" action="javascript:void(0);" method="post">
    <input type="hidden" name="id"        value="<?= $id; ?>">
    <input type="hidden" name="missionId" value="<?= $missionId; ?>">
    <div class="form-group">
        <label for="mission_name">Name</label>
        <input name="name" type="text" class="form-control" id="missiontarget_name" aria-describedby="missiontarget_name_help" placeholder="Enter missiontarget name" value="<?= $data["name"]; ?>">
    </div>
    <div class="form-group">
        <label for="mission_description">Description</label>
        <input name="description" type="text" maxlength="255" class="form-control" id="missiontarget_description" aria-describedby="missiontarget_description_help" placeholder="Enter mission target descriprtion" value="<?= $data["description"]; ?>">
    </div>
    <div class="form-group">
        <div id="coordinateselectorcontainer" style="width:100%; height:200px"></div>
        <label for="coordinate">Coordinate</label>
        <input name="coordinate" type="text" class="form-control" id="coordinate" aria-describedby="missiontarget_coordinate_help" placeholder="Enter coordinate" value="<?= $data["latitude"]; ?>,<?= $data["longitude"]; ?>">
    </div>
    <div class="form-group">
        <label for="mission_datum">Datum</label>
        <input name="datum" type="date" class="form-control" id="missiontarget_datum" aria-describedby="missiontarget_datum_help" placeholder="Date" value="<?= substr($data["datum"],0,10); ?>">
    </div>
    <div class="form-group">
        <label for="missiontarget_finished">Finished</label>
        <input name="finished" type="text" class="form-control" id="missiontarget_finished" aria-describedby="missiontarget_finished_help" placeholder="Arrived at point?" value="<?= $data["finished"]; ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="missiontargetFormSubmit" class="btn btn-primary" value="Save changes">
      </div>
</form>

 