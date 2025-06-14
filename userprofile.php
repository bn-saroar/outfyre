<?php
ob_start();
include 'includes/header.php';
require 'db.php';

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit();
}

$email = $_SESSION['email'];
$userdetails = mysqli_query($dbcon, "SELECT * FROM `user_details` WHERE `email` = '$email'");
$result = mysqli_fetch_assoc($userdetails);
?>

<!-- Background and layout -->
<div class="bg-gradient-to-r from-pink-100 via-purple-100 to-yellow-100 py-12 px-4">
  <?php if ($result) { ?>
  <div class="max-w-7xl mx-auto mt-5">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      <!-- Sidebar Profile Card -->
      <div class="bg-white rounded-3xl shadow-md p-6 text-center hover:shadow-xl transition">
        <div class="mb-4">
          <img src="sphoto/<?php echo $result['image']; ?>" alt="Profile" class="w-28 h-28 object-cover rounded-full mx-auto border-4 border-pink-200 shadow-md">
        </div>
        <h2 class="text-xl font-semibold text-gray-800 mb-1"><?php echo $result['name']; ?></h2>
        <p class="text-gray-500 text-sm mb-4"><?php echo $result['email']; ?></p>
        <ul class="text-sm text-left space-y-2">
          <li><span class="font-semibold text-gray-700">📞 Phone:</span> <?php echo $result['phone']; ?></li>
          <li><span class="font-semibold text-gray-700">👤 Gender:</span> <?php echo $result['gender']; ?></li>
          <li><span class="font-semibold text-gray-700">🌍 Nationality:</span> <?php echo $result['nationality']; ?></li>
        </ul>
      </div>

      <!-- Main Profile Details -->
      <div class="lg:col-span-2 bg-white rounded-3xl shadow-md p-8 hover:shadow-xl transition">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">Account Information</h3>
        <form>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
              <label class="block text-gray-700 font-medium mb-1">Full Name</label>
              <input type="text" value="<?php echo $result['name']; ?>" disabled class="w-full rounded-full border border-gray-300 px-4 py-2 bg-gray-100 focus:outline-none">
            </div>
            <div>
              <label class="block text-gray-700 font-medium mb-1">Email</label>
              <input type="email" value="<?php echo $result['email']; ?>" disabled class="w-full rounded-full border border-gray-300 px-4 py-2 bg-gray-100 focus:outline-none">
            </div>
          </div>

          <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Address</label>
            <textarea rows="3" disabled class="w-full rounded-xl border border-gray-300 p-3 bg-gray-100 focus:outline-none"><?php echo $result['address']; ?></textarea>
          </div>

          <div class="flex justify-end gap-4">
            <a href="#" class="px-6 py-2 rounded-full bg-black text-white font-medium hover:bg-gray-800 transition">Edit Profile</a>
            <a href="logout.php" class="px-6 py-2 rounded-full border border-gray-400 text-gray-600 hover:bg-gray-200 transition">Logout</a>
          </div>
        </form>
      </div>

    </div>
  </div>
  <?php } else { ?>
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-8 text-center mt-12">
      <h2 class="text-xl text-red-600 font-semibold mb-4">User not found!</h2>
      <p class="text-gray-500">Please login again or contact support.</p>
    </div>
    <?php session_destroy(); ?>
  <?php } ?>
</div>

<?php
include 'includes/footer.php';
ob_end_flush();
?>
