<?php include 'includes/header.php';
require 'db.php';?>

<body style="font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f0faff, #e5e5e5);">

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8 text-center">
        <h2 class="fw-bold">Get in Touch</h2>
        <p class="text-muted">Have any questions or feedback? We'd love to hear from you!</p>
      </div>
    </div>

    <div class="row g-4">
      <!-- Contact Info -->
      <div class="col-md-5">
        <div class="card shadow-sm border-0 p-4 rounded-4 bg-white">
          <h5 class="fw-semibold mb-3">Contact Information</h5>
          <p><strong>📍 Address:</strong> 123 Fashion Street, Mumbai, India</p>
          <p><strong>📞 Phone:</strong> +91 9876543210</p>
          <p><strong>📧 Email:</strong> support@fashionnest.com</p>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-md-7">
        <div class="card shadow-sm border-0 p-4 rounded-4 bg-white">
          <h5 class="fw-semibold mb-3">Send us a Message</h5>
          <form action="contactsubmit.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" name="name" class="form-control rounded-pill shadow-sm" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control rounded-pill shadow-sm" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Subject</label>
              <input type="text" name="subject" class="form-control rounded-pill shadow-sm" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="message" class="form-control rounded-4 shadow-sm" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-4" style="background: linear-gradient(135deg, #667eea, #764ba2); border: none;">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
