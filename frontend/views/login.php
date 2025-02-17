<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
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

      .wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 100vh;
      }

      .container {
        background-color: #f5f5f5;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        max-width: 900px;
        width: 100%;
      }

      .form-container {
        width: 50%;
        padding: 2rem;
      }

      .form-container h1 {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-align: center;
        color: #b76e79;
      }

      .form-container h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
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

      .button-group .login {
        background-color: #ffb6c1;
        color: #333333;
        border: none;
      }

      .button-group .sign-up {
        background-color: #f5f5f5;
        color: #333333;
        border: 1px solid #333333;
      }

      .image-container {
        width: 50%;
        text-align: center;
      }

      .image-container img {
        border-radius: 0.5rem;
        max-width: 100%;
        height: auto;
      }

      @media (max-width: 768px) {
        .container {
          flex-direction: column;
          align-items: center;
          text-align: center;
        }

        .form-container,
        .image-container {
          width: 100%;
          padding: 1rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="form-container">
          <h1>HI, GLOWMATES!</h1>
          <h2>Login</h2>
          <form id="loginForm">
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
            <div class="form-group">
              <a class="forgot-password" href="#">FORGOT YOUR PASSWORD?</a>
            </div>
            <div class="button-group">
              <button class="btn login" type="submit">LOGIN</button>
              <a href="regist.html" class="btn sign-up">SIGN UP</a>
            </div>
          </form>
        </div>
        <div class="image-container">
          <img
            class="rounded-lg"
            src="Image/2.jpg"
            alt="Login Image"
            width="400"
            height="400"
          />
        </div>
      </div>
    </div>

    <script>
      document
        .getElementById("loginForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const formData = new FormData(this);

          // Tambahkan logging di sini!
          console.log("Email:", formData.get("email"));
          console.log("Password:", formData.get("password"));

          fetch("backend/controllers/AuthController.php?action=login", {
            method: "POST",
            body: formData,
          })
            .then((response) => {
              if (response.ok) {
                window.location.href = "frontend/index.php"; // Redirect jika login berhasil
              } else {
                alert("Login gagal. Periksa email dan password Anda."); // Tampilkan pesan error
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
