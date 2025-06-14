<?php include 'includes/header.php'; require 'db.php'; ?>
<body style="font-family: 'Segoe UI', sans-serif; min-height: 100vh;">

  <!-- Alert Message -->
  <?php if(isset($_GET['user']) && $_GET['user'] == 'invalid'): ?>
    <div class="container my-4">
      <div class="alert alert-warning alert-dismissible fade show mx-auto shadow-sm" style="max-width: 500px;">
        <strong>Invalid User!</strong> The email and password do not exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>

  <!-- Login Card -->
  <section class="d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="card border-0 shadow-lg p-4 p-md-5" style="max-width: 420px; width: 100%; border-radius: 20px; background: #ffffffcc; backdrop-filter: blur(10px);">
      
      <div class="text-center mb-4">
        <h2 class="fw-bold" style="color: #4b2e83;">Welcome Back 👋</h2>
        <p class="text-muted small">Login to your account</p>
      </div>

      <form action="loginsubmit.php" method="POST">
        <div class="mb-3">
          <label class="form-label text-muted">Email Address</label>
          <input type="email" name="email" class="form-control rounded-pill shadow-sm" required>
        </div>

        <div class="mb-4">
          <label class="form-label text-muted">Password</label>
          <input type="password" name="password" class="form-control rounded-pill shadow-sm" required>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-lg rounded-pill text-white fw-semibold" style="background: linear-gradient(45deg, #ff6ec4, #7873f5); border: none;">Sign In</button>
        </div>

        <p class="text-center text-muted mb-0">
          Don't have an account?
          <a href="register.php" class="fw-semibold" style="color: #4b2e83;">Register</a>
        </p>
      </form>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
