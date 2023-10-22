document
  .getElementById("login-form")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Collect form data
    const formData = {
      email: document.getElementById("email").value,
      password: document.getElementById("password").value,
    };

    // Convert the form data to JSON
    const jsonData = JSON.stringify(formData);

    // Define the API endpoint
    const apiUrl = "http://localhost/login_system/backend/api/login.php";

    // Send a POST request to the API
    fetch(apiUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: jsonData,
    })
      .then((response) => response.json())
      .then((data) => {
        // Handle the API response data
        console.log(data);

        if (data.success === true) {
          // Login was successful
          alert("Logged in succesfully!");
          window.location.href = "index.html";
        } else {
          // Login failed; display an error message
          alert("Login failed. Please try again.");
        }
      })
      .catch((error) => {
        // Handle errors
        console.error(error);
        alert("Login failed. Please try again.");
      });
  });
