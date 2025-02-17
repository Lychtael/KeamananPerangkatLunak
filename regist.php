<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Register</title>
    <style>
      body {
        font-family: "Nunito Sans", sans-serif;
        background-color: #eaeaea;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
      }

      .container {
        background-color: #f5f5f5;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 900px;
        width: 100%;
      }

      .form-container {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .form-container h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
      }

      .form-container form {
        width: 100%;
      }

      .form-group label {
        font-size: 0.875rem;
        font-weight: 700;
        color: #b76e79;
      }

      .form-group input {
        background-color: #f5f5f5;
        border: 1px solid #333333;
      }

      .form-group .checkbox-container {
        display: flex;
        align-items: center;
      }

      .form-group .checkbox-container input {
        margin-right: 0.5rem;
      }

      .form-group .checkbox-container span {
        font-size: 0.875rem;
      }

      .form-group .checkbox-container a {
        color: #1e90ff;
        text-decoration: none;
      }

      .button-group {
        display: flex;
        justify-content: flex-start;
        gap: 1rem;
      }

      .button-group button {
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
      }

      .button-group .sign-up {
        background-color: #ffb6c1;
        color: #333333;
        border: none;
      }

      .button-group .login {
        background-color: #f5f5f5;
        color: #333333;
        border: 1px solid #333333;
      }

      .image-container {
        margin-top: 2rem;
        text-align: center;
      }

      .image-container img {
        border-radius: 0.5rem;
        max-width: 100%;
        height: auto;
      }

      @media (min-width: 768px) {
        .container {
          flex-direction: row;
          align-items: flex-start;
        }

        .form-container {
          width: 50%;
          padding-right: 2rem;
        }

        .image-container {
          width: 50%;
          margin-top: 0;
        }
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="form-container">
        <h1>Create Account</h1>
        <form id="registerForm">
          <div class="form-group">
            <label for="first-name">FIRST NAME</label>
            <input
              class="form-control"
              id="first-name"
              name="first_name"
              type="text"
              required
            />
          </div>
          <div class="form-group">
            <label for="last-name">LAST NAME</label>
            <input
              class="form-control"
              id="last-name"
              name="last_name"
              type="text"
              required
            />
          </div>
          <div class="form-group">
            <label for="username">USERNAME</label>
            <input
              class="form-control"
              id="username"
              name="username"
              type="text"
              required
            />
          </div>
          <div class="form-group">
            <label for="email">EMAIL</label>
            <input
              class="form-control"
              id="email"
              name="email"
              type="email"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input
              class="form-control"
              id="password"
              name="password"
              type="password"
              required
            />
          </div>
          <div class="form-group form-check checkbox-container">
            <input
              class="form-check-input"
              id="privacy-policy"
              type="checkbox"
              required
            />
            <label class="form-check-label" for="privacy-policy">
              I agree to the <a href="#">Privacy Policy</a>
            </label>
          </div>
          <div class="button-group">
            <button class="btn sign-up" type="submit">SIGN UP</button>
            <a href="login.html" class="btn login">LOGIN</a>
          </div>
        </form>
      </div>
      <div class="image-container">
        <img src="Image/1.jpg" alt="Register Image" width="400" height="500" />
      </div>
    </div>

    <script>
      document
        .getElementById("registerForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          if (!document.getElementById("privacy-policy").checked) {
            alert("Anda harus menyetujui Privacy Policy");
            return;
          }

          const formData = new FormData(this);

          fetch("backend/controllers/AuthController.php?action=register", {
            // Jalur yang benar
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "error") {
                alert(data.message);
              } else {
                alert(data.message);
                window.location.href = "login.html";
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("Terjadi kesalahan pada sistem");
            });
        });
    </script>
  </body>
</html>
