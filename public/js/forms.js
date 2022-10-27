
function responseGetMissionFormHandler () {
    document.getElementById("missionFormContainer").innerHTML=this.responseText;
    missionEditForm();
  };
  
function getMissionForm(missionId=null)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onload = responseGetMissionFormHandler;
  var url="http://localhost:8080/app/missionform";
  if (missionId>0)
  {
     url="http://localhost:8080/app/missionform/"+missionId;
  }
  xhttp.open('GET',url, true);
  xhttp.send();
}


function missionEditForm()
{


   if ($("#missionForm").length > 0) {
      $("#missionForm").validate({

      

    rules: {
      name: {
        required: true,
      },
      description: {
        required: true,
        maxlength: 255,
      }, 
      start: {
        required: true,
      },   
    },

    messages: {
      name: {
        required: "Please enter name",
      },

      description: {
        required: "Please enter a description",
        maxlength: "The description should less than or equal to 255 characters",
        }, 
        
        start: {
          required: "Please enter a start date",
        }
    },

    submitHandler: function(form) {
      //insert(POST) works OK puit update/put does not receive fields. whats comes in?
      console.log("form",form);
      var submitMethod="POST";
      var submitURL="/api/mission";
      var formData=$('#missionForm').serialize();
      var contenttype="";
      if (form.elements.id.value>0)
      {
        submitMethod="PUT";
        submitURL="/api/mission/"+form.elements.id.value;
        contenttype='application/json';
        formData=JSON.stringify({
          "id":           parseInt(form.elements.id.value),
          "name":         form.elements.name.value,
          "description":  form.elements.description.value,
          "data":         form.elements.data.value,
          "start":        form.elements.start.value,
          "end":          form.elements.end.value,
          "finished":     form.elements.finished.value
        });
      }
      $('#missionFormSubmit').html('Sending..');
      

      console.log("formdata",formData);
      $.ajax({
        url:      submitURL,
        type:     submitMethod,
        data:     formData,
        contentType: contenttype,
        dataType: "json",
        encode:   true,
        success: function( response ) {
            console.log(response);
            document.getElementById("missionForm").reset(); 
            $('#formModalMission').modal('hide');
            getMissionData();     
        }
      });
    }
  })
}

}











function responseGetMissiontargetFormHandler () {
  document.getElementById("missionTargetFormContainer").innerHTML=this.responseText;
  missiontargetEditForm();

  coordinateselectorInit('coordinateselectorcontainer');

};

function getMissiontargetForm(missionId=null,missionTargetId=null)
{
var xhttp = new XMLHttpRequest();
xhttp.onload = responseGetMissiontargetFormHandler;
var url="http://localhost:8080/app/missiontargetform/"+missionId;
if (missionTargetId>0)
{
   url="http://localhost:8080/app/missiontargetform/"+missionId+"/"+missionTargetId;
}
xhttp.open('GET',url, true);
xhttp.send();
}


function missiontargetEditForm()
{


 if ($("#missiontargetForm").length > 0) {
    $("#missiontargetForm").validate({

    

  rules: {
    name: {
      required: true,
    },
    description: {
      required: true,
      maxlength: 255,
    }, 
    datum: {
      required: true,
    },   
    coordinate: {
      required: true,
    },
  },

  messages: {
    name: {
      required: "Please enter name",
    },

    description: {
      required: "Please enter a description",
      maxlength: "The description should less than or equal to 255 characters",
      }, 
      
      datum: {
        required: "Please enter a start date",
      },
      coordinate: {
        required: "Please enter location",
      }
  },

  submitHandler: function(form) {
    //insert(POST) works OK puit update/put does not receive fields. whats comes in?
    console.log("form",form);
    var submitMethod="POST";
    var submitURL="/api/missiontarget";
    var formData=$('#missionTargetForm').serialize();
    formData=JSON.stringify({
      "id":           parseInt(form.elements.id.value),
      "missionId" :   parseInt(form.elements.missionId.value),
      "name":         form.elements.name.value,
      "description":  form.elements.description.value,
      "datum":        form.elements.datum.value,
      "coordinate":   form.elements.coordinate.value,
      "finished":     form.elements.finished.value
    });
    var contenttype='application/json';
    if (form.elements.id.value>0)
    {
      submitMethod="PUT";
      submitURL="/api/missiontarget/"+form.elements.id.value;
      contenttype='application/json';
      formData=JSON.stringify({
        "id":           parseInt(form.elements.id.value),
        "missionId" :   parseInt(form.elements.missionId.value),
        "name":         form.elements.name.value,
        "description":  form.elements.description.value,
        "datum":        form.elements.datum.value,
        "coordinate":   form.elements.coordinate.value,
        "finished":     form.elements.finished.value
      });
    }
    $('#missiontargetFormSubmit').html('Sending..');
    

    console.log("formdata",formData);
    $.ajax({
      url:      submitURL,
      type:     submitMethod,
      data:     formData,
      contentType: contenttype,
      dataType: "json",
      encode:   true,
      success: function( response ) {
          console.log(response);
          document.getElementById("missiontargetForm").reset(); 
          $('#formModalMissionTarget').modal('hide');
          //getMissionTargetData(parseInt(form.elements.missionId.value));  
          location.reload();   
      }
    });
  }
})
}

}