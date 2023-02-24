function deleteUser(rowId) {
  swal(
      {
          title: "Are you sure?",
          text: "Do you want to delete this user.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false,
      },
      function (isConfirm) {
          if (isConfirm) {
              $.ajax({
                  url: "usersajax.php",
                  type: "post",
                  data: { userId: rowId, ajaxRequest: true },
                  success: function (res) {
                      if (res == true) {
                          swal("Deleted!", "Record Deleted", "success");
                          $("#" + rowId).fadeOut("slow", function () {
                              $("#" + rowId).remove();
                          });
                      }
                  },
              });
          } else {
              swal("Cancelled", "", "error");
          }
      }
  );
}

function checkEmailId(email) {
  if (email != "") {
      $.ajax({
          url: "usersajax.php",
          type: "post",
          data: { email: email },
          success: function (response) {
              if (response == true) {
                  $("#emailError").html('<span style="color:red">Email address already registred.</span>');
                  $("#addUserBtn").attr("disabled", "disabled");
              } else {
                  $("#emailError").html("");
                  $("#addUserBtn").removeAttr("disabled");
              }
          },
      });
  }
}

// validate form
$(function () {
  $("#addUserModal").modal({
      backdrop: "static",
      keyboard: false,
  });
  $("form[name='myForm']").validate({
      // Specify validation rules
      rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          name: "required",
          email: {
              required: true,
              email: true,
          },
          mobile: {
              required: true,
              minlength: 10,
          },
          password: {
              required: true,
              minlength: 5,
          },
          cpassword: "required",
      },
      // Specify validation error messages
      messages: {
          mobile: {
              required: "Please enter mobile number",
              minlength: "Mobile number must be 10 digits",
          },
          password: {
              required: "Please enter password",
              minlength: "Password must be at least 5 characters long",
          },
          email: "Please enter a valid email address",
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function (form, e) {
          // form.submit();
          e.preventDefault();
          var actionUrl = $("#myForm").attr("action");
          var formId = document.getElementById("myForm");
          $.ajax({
              url: actionUrl,
              type: "post",
              data: new FormData(formId),
              processData: false,
              contentType: false,
              cache: false,
              // dataType : 'JSON',
              // beforeSend: function () {}, //if you like to do something before submit
              // complete: function () {}, //if you like to do something before submit

              success: function (response) {
                  res = response.replace(1, "");
                  const obj = JSON.parse(res);
                  if (obj.status == true) {
                      $("#myForm")[0].reset();
                      $("#addUserModal").modal("hide");
                      swal("" + obj.message + "", "", "success");
                      setTimeout(function () {
                          window.location.reload(1);
                      }, 2000);
                  } else {
                      swal("" + obj.message + "", "", "error");
                      return false;
                  }
              },
          });
      },
  });
});

//  Edit users
function editUser(rowId) {
  if (rowId != "") {
      $.ajax({
          url: "usersajax.php",
          type: "post",
          data: { userId: rowId, editajaxRequest: true },
          dataType: "JSON",
          success: function (res) {
              $("#addUserModal").modal("show");
              $("#modalHeading").text("Edit User Profile");
              $("#passwordfield").hide();
              $("#addUserBtn").text("UPDATE");
              $("#userId").val(res[0]["id"]);
              $("#name").val(res[0]["name"]);
              $("#email").val(res[0]["email"]);
              $("#mobile").val(res[0]["mobile"]);
              $("#address").val(res[0]["address"]);
              $("#state").val(res[0]["state"]);
          },
      });
  }
}

// Click on AddUser effect
function addButtonEffect() {
  $("#addUserModal").modal("show");
  $("#modalHeading").text("Add New User");
  $("#passwordfield").show();
  $("#addUserBtn").text("ADD");
}
