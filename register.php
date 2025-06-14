<?php ob_start();
require 'db.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $image = $_FILES['image']['name'];
  $gender = $_POST['gender'];
  $nationality = $_POST['nationality'];
  $pass = $_POST['password'];
  $address = $_POST['address'];

  move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);

  $submitfrom = mysqli_query($dbcon, "INSERT INTO `user_details`(`name`, `email`, `phone`, `gender`, `nationality`, `pass`, `image`, `address`) VALUES ('$name','$email','$phone','$gender','$nationality','$pass','$image','$address')");
  header("location: userprofile.php");
}
?>

<body style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif;">

<section class="py-5">
  <div class="container" style="margin-top: 6%;">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-lg p-5 border-0 rounded-5" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(8px);">

          <h2 class="text-center fw-bold mb-4" style="color: #333;">Create Your Account</h2>

          <form action="" method="POST" enctype="multipart/form-data">

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control rounded-pill shadow-sm" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control rounded-pill shadow-sm" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control rounded-pill shadow-sm" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Photo</label>
                <input type="file" name="image" class="form-control rounded-pill shadow-sm" accept="image/*" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select rounded-pill shadow-sm" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Nationality</label>
                <input type="text" name="nationality" class="form-control rounded-pill shadow-sm" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control rounded-pill shadow-sm" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control rounded-pill shadow-sm" required>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-lg text-white rounded-pill px-5 fw-semibold" style="background: linear-gradient(135deg, #667eea, #764ba2); border: none;">Register</button>
            </div>

            <p class="mt-3 text-center text-muted">
              Already have an account? <a href="login.php" class="fw-semibold" style="color: #764ba2;">Login</a>
            </p>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ob_end_flush(); ?>
