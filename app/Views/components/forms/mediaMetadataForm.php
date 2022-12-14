<?= \Config\Services::validation()->listErrors(); ?>

 

<span class="d-none alert alert-success mb-3" id="res_message"></span>

<form id="mediaForm" enctype='multipart/form-data' action="javascript:void(0);" method="post">
    <input type="hidden" name="id"        value="<?= $id; ?>">
    <input type="hidden" name="userId"    value="1">
    <input type="hidden" name="missionId" value="<?= $missionId; ?>">
    <input type="hidden" name="uri"      value="">

    <div class="form-group">
        <label for="media_file">File</label>
        <input name="userfile" type="file" class="form-control" id="file" aria-describedby="media_file_help" placeholder="Upload file" value="">
    </div>

    <div class="form-group">
        <label for="media_name">Name</label>
        <input name="name" type="text" class="form-control" id="media_name" aria-describedby="media_name_help" placeholder="Enter  name" value="">
    </div>

    <div class="form-group">
        <label for="media_description">Description</label>
        <input name="description" type="text" maxlength="255" class="form-control" id="media_description" aria-describedby="mission_description_help" placeholder="Enter description" value="<?= $data["description"]; ?>">
    </div>


    <div class="form-group">
        <label for="media_datum">Date</label>
        <input name="datum" type="date" class="form-control" id="media_datum" aria-describedby="mission_start_help" placeholder="Date and time" value="">
    </div>

    <div class="hidden" style="display:none;">
        <div class="form-group">
            <label for="media_mimetype">Mimetype</label>
            <input name="mimetype" type="text"   class="form-control" id="media_mimetype" aria-describedby="mission_start_help" placeholder="Mimetype" value="">
        </div>

        <div class="form-group">
            <label for="media_filesize">Filesize</label>
            <input name="filesize" type="text"   class="form-control" id="media_filesize" aria-describedby="mission_start_help" placeholder="File size" value="">
        </div>
    
        <div class="form-group">
            <div id="coordinatemediacontainer"  class="coordinatepicker" width="100%" height="200" style="width:100%; height:200px" data-kml="<?= base_url().'/api/missiontarget/kml/'.$missionId; ?>"></div>
            <label for="coordinate">Coordinate</label>
            <input name="coordinate" type="text" class="form-control" id="coordinatemedia" aria-describedby="missiontarget_coordinate_help" placeholder="Enter coordinate" value="<?= $data["latitude"]; ?>,<?= $data["longitude"]; ?>">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="mediaFormSubmit" class="btn btn-primary" value="Save changes">
      </div>
</form>

 