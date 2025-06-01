document.getElementById("loginButton").addEventListener("click", function () {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/register", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 201) {
                var response = JSON.parse(xhr.responseText);
                var accessToken = response.access_token;
                // Store access token in localStorage or sessionStorage
                localStorage.setItem("accessToken", accessToken);
                // Redirect to dashboard or any other page
                window.location.href = "/";
            } else {
                // Handle error response
                var errorResponse = JSON.parse(xhr.responseText);
                console.error("Error:", errorResponse.error);
                // Display error message to the user
                alert("Error: " + errorResponse.error);
            }
        }
    };

    var data = JSON.stringify({ email: email, password: password });
    xhr.send(data);
});
