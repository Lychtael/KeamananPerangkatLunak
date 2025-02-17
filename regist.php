<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Register</title>
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
            <a href="login.php" class="btn login">LOGIN</a>
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
        .addEventListener("submit", async function (e) {
          e.preventDefault();

          // Cek apakah privacy policy disetujui
          if (!document.getElementById("privacy-policy").checked) {
            alert("Anda harus menyetujui Privacy Policy");
            return;
          }

          const formData = new FormData(this);

          try {
            const response = await fetch("backend/controllers/AuthController.php?action=register", {
              method: "POST",
              body: formData,
            });

            // Mengecek apakah response berhasil
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
            }

            const text = await response.text(); // Dapatkan respon sebagai teks

            try {
              // Mengonversi respon ke JSON
              const data = JSON.parse(text);

              if (data.status === "error") {
                alert(data.message); // Jika ada error, tampilkan pesan
              } else {
                alert(data.message); // Tampilkan pesan sukses
                window.location.href = "login.php"; // Redirect ke halaman login
              }
            } catch (err) {
              console.error("Response bukan JSON:", text);
              alert("Terjadi kesalahan pada sistem.");
            }
          } catch (error) {
            console.error("Error:", error);
            alert("Terjadi kesalahan saat menghubungi server.");
          }
        });
    </script>
  </body>
</html>
