<?php include 'includes/header.php'; ?>
<!-- Optional: Set background color -->
<style>
  body {
    background-color: #f9fafb;
  }

  .blog-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  }

  .blog-card {
    transition: 0.3s ease;
  }

  .blog-img {
    height: 220px;
    object-fit: cover;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
  }

  .blog-meta {
    font-size: 0.85rem;
    color: #6b7280;
  }
</style>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4 text-center">Latest from Our Blog</h2>
    <div class="row g-4">

      <!-- Blog Post 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="bg-white rounded-3 shadow-sm blog-card h-100">
          <img src="https://source.unsplash.com/400x220/?fashion,clothes" class="w-100 blog-img" alt="Blog Image">
          <div class="p-3 d-flex flex-column justify-content-between h-100">
            <div>
              <div class="blog-meta mb-1">Fashion · June 2025</div>
              <h5 class="fw-semibold mb-2">Top Summer Fashion Trends You Need</h5>
              <p class="text-muted small">Discover how to style this summer with trendy outfits that match your vibe.</p>
            </div>
            <a href="#" class="btn btn-sm btn-outline-dark mt-2">Read More</a>
          </div>
        </div>
      </div>

      <!-- Blog Post 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="bg-white rounded-3 shadow-sm blog-card h-100">
          <img src="https://source.unsplash.com/400x220/?shopping,style" class="w-100 blog-img" alt="Blog Image">
          <div class="p-3 d-flex flex-column justify-content-between h-100">
            <div>
              <div class="blog-meta mb-1">Style Tips · June 2025</div>
              <h5 class="fw-semibold mb-2">5 Ways to Style a Basic White Shirt</h5>
              <p class="text-muted small">Master the art of minimalism with your wardrobe’s most versatile item.</p>
            </div>
            <a href="#" class="btn btn-sm btn-outline-dark mt-2">Read More</a>
          </div>
        </div>
      </div>

      <!-- Blog Post 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="bg-white rounded-3 shadow-sm blog-card h-100">
          <img src="https://source.unsplash.com/400x220/?ecommerce,shopping" class="w-100 blog-img" alt="Blog Image">
          <div class="p-3 d-flex flex-column justify-content-between h-100">
            <div>
              <div class="blog-meta mb-1">Tips · June 2025</div>
              <h5 class="fw-semibold mb-2">How to Build a Capsule Wardrobe</h5>
              <p class="text-muted small">Save time and money with a minimal wardrobe that works for every season.</p>
            </div>
            <a href="#" class="btn btn-sm btn-outline-dark mt-2">Read More</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
