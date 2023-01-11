
$(document).ready(function () {
    $('form').submit(function (e) {
        //         // Error removing if input is correct/valid
        var removeErr = document.getElementsByClassName('error-message');
        for (i = 0; i < removeErr.length; i++) {
            removeErr[i].innerHTML = "";
        }
        var gender = "";
        let elem = document.getElementsByName('Gender');
        for (i = 0; i < elem.length; i++) {
            if (elem[i].checked)
            gender = elem[i].value;
        }
        // gender-error
        if (gender == "") {
            $('#gender-error').html("Please select your gender");
            checkerror = 1;
        } 
        checkerror = 0;
        var letters = /^[A-Za-z\s]+$/;
        // first name validation
        var fname = $("#fname").val();
        fname = fname.trim();
        if (fname == "") {
            $('#first-name-error').html("Please enter your first name");
            checkerror = 1;
        } else if (!fname.match(letters)) {
            $('#first-name-error').html("Please enter characters only");
            checkerror = 1;
        } else if (fname.length < 3) {
            $('#first-name-error').html("Please enter at least 3 characters");
            checkerror = 1;
        }
        
        // last name validation
        var lname = $("#lname").val();
        lname = lname.trim();
        if (lname == "") {
            $('#last-name-error').html("Please enter your last name");
            checkerror = 1;
        } else if (!lname.match(letters)) {
            $('#last-name-error').html("Please enter characters only");
            checkerror = 1;
        } else if (lname.length < 3) {
            $('#last-name-error').html("Please enter at least 3 characters");
            checkerror = 1;
        }
        // phone validation
        var phone = $("#phone").val();
        if (phone.trim() == "") {
            $('#phone-number-error').html("please enter your phone number");
            checkerror = 1;
        } else if (isNaN(phone)) {
            $('#phone-number-error').html("!!please enter valid phone code");
            checkerror = 1;
        } else if (phone.length != 10) {
            $('#phone-number-error').html("!!number must be 10 digits");
            checkerror = 1;
        }
        // email validation
        var email = $("#email").val();
        if (email.trim() == "") {
            $('#email-error').html( "please enter your gmail");
            checkerror = 1;
        }else if (email.indexOf('@') <= 0) {
            $('#email-error').html( "!!invalid gmail");
            checkerror = 1;
        }
        // password validation
        var pass = $("#password").val();
        if (pass.trim() == "") {
            $('#password-error').html("please enter your password");
            checkerror = 1;
        }
        
        if (checkerror == 0) {

        }else{
            return false;
        }

    });
});