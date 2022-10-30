<?= \Config\Services::validation()->listErrors(); ?>

 

<span class="d-none alert alert-success mb-3" id="res_message"></span>

<form id="mediaForm" enctype='multipart/form-data' action="javascript:void(0);" method="post">
    <input type="hidden" name="id"        value="<?= $id; ?>">
    <input type="hidden" name="userId"    value="1">
    <input type="hidden" name="missionId" value="<?= $missionId; ?>">
    

    <div class="form-group">
        <label for="media_file">File</label>
        <input name="userfile[]" id="media_file" type="file" class="form-control" id="file" aria-describedby="media_file_help" placeholder="Upload file" accept="image/jpeg" multiple>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="mediaFormSubmit" class="btn btn-primary" value="Save changes">
      </div>
</form>

 