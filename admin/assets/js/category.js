
function deleteCategory(rowId) {
  swal(
      {
          title: "Are you sure?",
          text: "Do you want to delete this category",
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
                  url: "categoryajax.php",
                  type: "post",
                  data: { id: rowId, ajaxRequest: true },
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


// validate form
$(function () {
  $("#categorymodal").modal({
      backdrop: "static",
      keyboard: false,
  });
  $("form[name='myForm']").validate({
      rules: {
         name: "required",
      },
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
                      $("#categorymodal").modal("hide");
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
function editCategory(rowId) {
    $("#categorymodal").modal("show");
    $("#modalHeading").text("Edit Category");
    if (rowId != "") {
      $.ajax({
          url: "categoryajax.php",
          type: "post",
          data: { id: rowId, editajaxRequest: true },
          dataType: "JSON",
          success: function (res) {
              $("#passwordfield").hide();
              $("#addcategorybtn").text("UPDATE");
              $("#id").val(res[0]["id"]);
              $("#name").val(res[0]["name"]);
          },
      });
  }
}

// Click on AddUser effect
function addButtonEffect() {
  $("#categorymodal").modal("show");
  $("#modalHeading").text("Add Category");
}


// Change status
function changeStatus(status, catId){
    if (catId != "") {
        $.ajax({
            url: "categoryajax.php",
            type: "post",
            data: { id: catId, status : status},
            success: function (res) {
                if (res == true) {
                    swal("Status!", "Status Changed", "success");
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 2000);
                }
            },
        });
    }
}
