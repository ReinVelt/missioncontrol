<?= \Config\Services::validation()->listErrors(); ?>

 

<span class="d-none alert alert-success mb-3" id="res_message"></span>

<form id="missionForm" action="javascript:void(0);" method="post">
    <input type="hidden" name="id"        value="<?= $id; ?>">
    <input type="hidden" name="missionId" value="<?= $id; ?>">
    <input type="hidden" name="data"     value="">
    <div class="form-group">
        <label for="mission_name">Name</label>
        <input name="name" type="text" class="form-control" id="mission_name" aria-describedby="mission_name_help" placeholder="Enter mission name" value="<?= $data["name"]; ?>">
    </div>
    <div class="form-group">
        <label for="mission_description">Description</label>
        <input name="description" type="text" maxlength="255" class="form-control" id="mission_description" aria-describedby="mission_description_help" placeholder="Enter mission descriprtion" value="<?= $data["description"]; ?>">
    </div>
    <div class="form-group">
        <label for="mission_start">Startdate</label>
        <input name="start" type="date" class="form-control" id="mission_start" aria-describedby="mission_start_help" placeholder="Enter mission start date" value="<?= substr($data["start"],0,10); ?>">
    </div>
    <div class="form-group">
        <label for="mission_start">Enddate</label>
        <input name="end" type="date" class="form-control" id="mission_end" aria-describedby="mission_end_help" placeholder="Enter mission end date" value="<?= substr($data["end"],0,10); ?>">
    </div>
    <div class="form-group">
        <label for="mission_finished">Finished</label>
        <input name="finished" type="text" class="form-control" id="mission_finished" aria-describedby="mission_finished_help" placeholder="Is mission finished" value="<?= $data["finished"]; ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="missionFormSubmit" class="btn btn-primary" value="Save changes">
      </div>
</form>

 