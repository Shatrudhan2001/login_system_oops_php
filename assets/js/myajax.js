// Check email address exists or not.
function checkEmailId(email){
    if(email != ""){
        $.ajax({
            url : 'checkemail.php',
            type: 'post',
            data: {email: email},
            success: function(response){
                if(response == true){
                    $("#emailError").html('<span style="color:red">Email address already registred.</span>');
                    $('#registerbtn').attr("disabled", 'disabled');
                    $("#emailEr").html('');
                    $("#regbutton2").removeAttr('disabled');
                }else{
                    $("#emailError").html('');
                    $("#emailEr").html('<span style="color:red">Email address not found.</span>');
                    $("#regbutton2").attr("disabled", 'disabled');
                    $('#registerbtn').removeAttr('disabled');
                }
                
            }
        })
    }
}