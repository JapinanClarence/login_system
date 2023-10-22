document
  .getElementById("registration-form")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Collect form data
    const formData = {
      firstname: document.getElementById("firstname").value,
      lastname: document.getElementById("lastname").value,
      birthdate: document.getElementById("birthdate").value,
      gender: document.getElementById("gender").value,
      phonenumber: document.getElementById("phonenumber").value,
      email: document.getElementById("email").value,
      password: document.getElementById("password").value,
    };
    validatePassword(password);
    // Convert the form data to JSON
    const jsonData = JSON.stringify(formData);

    // Define the API endpoint
    const apiUrl = "http://localhost/login_system/backend/api/register.php";

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
          // Registration was successful
          alert("Registration is successful!");
          window.location.href = "login.html";
        } else {
          // Registration failed; display an error message
          alert("Registration failed. Please try again.");
        }
      })
      .catch((error) => {
        // Handle errors
        console.error(error);
        alert("Registration failed. Please try again.");
      });
  });

function validatePassword(password) {
  var minLength = 8; // Minimum password length
  var errorDiv = document.getElementById("error-message");

  if (password.length < minLength) {
    errorDiv.textContent = "Password must be at least 8 characters long.";
    errorDiv.style.display = "block"; // Display the error message
    return false; // Prevent form submission
  } else {
    errorDiv.style.display = "none"; // Hide the error message if no error
    return true; // Allow form submission
  }
}
