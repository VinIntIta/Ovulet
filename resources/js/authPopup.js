// Login popup
$('#loginModal').on('show.bs.modal');

$(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".error").children("strong").text("");
        $("#loginForm input").removeClass("invalid-input");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "/login",
            data: formData,
            success: () => window.location.assign("/dashboard"),
            error: (response) => {
        if(response.status === 422) {
            let errors = response.responseJSON.errors;
            console.log(errors);
            Object.keys(errors).forEach(function (key) {
              console.log(key);
                $("#" + key + "Login").addClass("invalid-input");
                $("#" + "passwordLogin").addClass("invalid-input");
                $("#" + key + "LoginError").children("strong").text(errors[key][0]);
            })
        } else {
            window.location.reload();
        }
    }
          })
    });
})

//Register popup

$('#registerModal').on('show.bs.modal');

$(function () {
    $('#registerForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".validation-error").children("strong").text("");
        $("#registerForm input").removeClass("invalid-input");
        $.ajax({
    method: "POST",
    headers: {
        Accept: "application/json"
    },
    url: "/register",
    data: formData,
    success: () => window.location.assign("/dashboard"),
    error: (response) => {
        if(response.status === 422) {
            let errors = response.responseJSON.errors;
            console.log(errors);
            Object.keys(errors).forEach(function (key) {
              console.log(key);
                $("#" + key + "Register").addClass("invalid-input");
                $("#" + key + "_confirmationRegister").addClass("invalid-input");
                $("#" + key + "RegisterError").children("strong").text(errors[key][0]);
            })
        } else {
            window.location.reload();
        }
    }
})
    });
})
