var request;
// bind to the submit event of our form
$("#loginForm").submit(function(event){
  // abort any pending request
  if (request) {
    request.abort();
  }
  // setup some local variables
  var $form = $(this);

  // let's select and cache all the fields
  var $inputs = $form.find("input, select, button, textarea");

  // serialize the data in the form
  var serializedData = $form.serialize();

  // let's disable the inputs for the duration of the ajax request
  $inputs.prop("disabled", true);

  // fire off the request to /form.php
  var request = $.ajax({
    url: "../home/login",
    type: "post",
    data: serializedData
  });

  // callback handler that will be called on success
  request.done(function (response, textStatus, jqXHR){

    if(response==="loginError"){
      document.getElementById('errorMsg').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Hey!</h4>Something wrong.. Check your username and password</div>';
    } else {
      window.location.href=response;
    }

  });

  // callback handler that will be called on failure
  request.fail(function (jqXHR, textStatus, errorThrown){
      // log the error to the console
      console.error(
        "The following error occured: "+
        textStatus, errorThrown
        );
    });

  // callback handler that will be called regardless
  // if the request failed or succeeded
  request.always(function () {
      // reenable the inputs
      $inputs.prop("disabled", false);
    });

  // prevent default posting of form
  event.preventDefault();

});