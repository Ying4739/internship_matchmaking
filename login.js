$(document).ready(function() {
    $('#loginBtn').click(function() {
        // get username and password inputed by user
        var username = $('#username').val();
        var password = $('#password').val();

        // create a item includes username and password
        var data = {
            username: username,
            password: password
        };

        // send AJAX to login.php 
        $.ajax({
            type: "POST",
            url: "login.php",
            data: data,
            success: function(response) {
                if (response.trim() === 'NICE') {
                    window.location.href = "main.php";
                } 
                else {
                    // Handle other responses here, e.g., display an error message
                    alert("Login failed: " + response);
                }
            }
        });
    });
});
