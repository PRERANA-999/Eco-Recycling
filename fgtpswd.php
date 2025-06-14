<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form id="loginForm">
      <input type="text" id="username" placeholder="Username or Email" required>
      <input type="password" id="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <p class="forgot-password" id="forgotPassword">Forgot password?</p>
    </form>
  </div>

  <script>
    document.getElementById('forgotPassword').addEventListener('click', function(e) {
  e.preventDefault();
  var usernameOrEmail = prompt('Enter your username or email');
  if (usernameOrEmail) {
    resetPassword(usernameOrEmail);
  }
});

function resetPassword(usernameOrEmail) {
  // Code to send a request to the server to reset the password
  // Replace the following lines with your actual implementation
  var request = new XMLHttpRequest();
  request.open('POST', '/reset_password', true);
  request.setRequestHeader('Content-Type', 'application/json');
  request.onreadystatechange = function() {
    if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
      var response = JSON.parse(request.responseText);
      if (response.success) {
        alert('Please check your email for password reset instructions.');
      } else {
        alert('Failed to reset password. Please try again later.');
      }
    }
  };
  request.send(JSON.stringify({ usernameOrEmail: usernameOrEmail }));
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();
  var usernameOrEmail = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  // Code to send a request to the server to perform the login
  // Replace the following lines with your actual implementation
  var request = new XMLHttpRequest();
  request.open('POST', '/login', true);
  request.setRequestHeader('Content-Type', 'application/json');
  request.onreadystatechange = function() {
    if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
      var response = JSON.parse(request.responseText);
      if (response.success) {
        alert('Login successful!');
      } else {
        alert('Invalid credentials. Please try again.');
      }
    }
  };
  request.send(JSON.stringify({ usernameOrEmail: usernameOrEmail, password: password }));
});

  </script>
</body>
</html>
