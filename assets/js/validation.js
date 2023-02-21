$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    
    $("form[name='Myform']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        name: "required",
        email: {
          required: true,
          email: true
        },
        mobile: {
            required: true,
            minlength: 10
          },
        password: {
          required: true,
          minlength: 5
        }
        ,
        cpassword: "required",
      },
      // Specify validation error messages
      messages: {
        mobile: {
            required: "Please enter mobile number",
            minlength: "Mobile number must be 10 digits"
          },
        password: {
          required: "Please enter password",
          minlength: "Password must be at least 5 characters long"
        },
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });