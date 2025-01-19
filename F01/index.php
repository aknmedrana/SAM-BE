<?php
include('connect.php');

$sqlFeaturedMoments = "SELECT moments.title, moments.description, moments.image, categories.categoryName 
                       FROM moments 
                       JOIN categories ON moments.categoryID = categories.id 
                       ORDER BY RAND() LIMIT 12";
$resultFeatured = $conn->query($sqlFeaturedMoments);
$olympicMoments = [];
if ($resultFeatured->num_rows > 0) {
    while ($row = $resultFeatured->fetch_assoc()) {
        $olympicMoments[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $insertQuery = "INSERT INTO moments (title, description, image, categoryID) VALUES ('$title', '$description', '$targetFile', '$category')";
        if ($conn->query($insertQuery)) {
            echo "<div class='alert alert-success'>Moment submitted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error submitting moment: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error uploading image.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta property="og:title" content="Olympic Moments Archive" />
  <meta property="og:description" content="Explore and relive the most memorable moments from the Olympic Games." />
  <meta property="og:image" content="assets/img/social-share-image.png" />
  <title>Olympic Moments Archive - 2024</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="icon" href="assets/img/logo.png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: "Roboto", sans-serif;
    }

    h1, h2, h3 {
      font-family: "Bebas Neue", sans-serif;
    }

    .navbar .nav-link,
    .navbar-brand {
      color: #969696 !important;
      transition: color 0.3s ease;
    }

    .navbar .nav-link:hover {
      color: #fff !important;
    }

    .homeSection {
      color: #0a0a0a;
      text-align: center;
    }

    .carouselInner img {
      height: 500px;
      object-fit: cover;
    }

    .carousel-caption {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      z-index: 10;
      color: #fff;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    }

    .carousel-item {
      transition: opacity 0.3s ease;
    }

    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
      opacity: 1;
    }

    .carousel-item-next,
    .carousel-item-prev {
      opacity: 0;
    }

    .carousel-item.active {
      opacity: 1;
    }

    .footer {
      background-color: #000;
      color: #fff;
      padding: 20px 0;
    }

    .footer a {
      color: #ffd700;
      text-decoration: none;
    }

    .footer a:hover {
      color: #ffcc00;
    }

    @media (max-width: 768px) {
      .homeSection h1 {
        font-size: 2.5rem;
      }

      .homeSection p {
        font-size: 1rem;
      }

      .textShadow {
        font-size: 2.5rem;
      }

      .textEffect {
        font-size: 50px;
      }
    }

    .textShadow {
      position: relative;
      font-size: 4rem;
      font-weight: bold;
      color: #000;
      margin-top: 40px;
    }

    .textEffect {
      position: absolute;
      top: -20px;
      left: 10px;
      color: rgba(150, 150, 150, 0.2);
      font-size: 90px;
    }

    .videoBackground iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    .gallery img {
      width: 100%;
      height: auto;
      object-fit: cover;
      margin-bottom: 15px;
      transition: transform 0.3s ease;
    }

    .gallery img:hover {
      transform: scale(1.05);
    }

    .modal-content {
      border-radius: 15px;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    .footer .social-icons i {
      font-size: 1.8rem;
      margin: 0 10px;
      transition: transform 0.3s ease;
    }

    .footer .social-icons i:hover {
      transform: scale(1.2);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark" style="background-color: #000">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/img/w-ob.png" alt="Olympic Moments Logo" style="height: 50px; margin-right: 10px" />
        <span>Olympic Moments</span>
      </a>
      <ul class="navbar-nav d-flex flex-row">
        <li class="nav-item mx-2">
          <a href="#featuredMoments" class="nav-link text-light">Moments</a>
        </li>
        <li class="nav-item mx-2">
          <a href="#footerSection" class="nav-link text-light">About</a>
        </li>
        <li class="nav-item mx-2">
          <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#submitMomentModal">Submit Moment</button>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-3 mt-5">
    <div class="row position-relative">
      <div class="col-12">
        <h1 class="textEffect">RELIVE THE GREATEST OLYMPIC MOMENTS</h1>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12">
        <h1 class="textShadow display-3">
          RELIVE THE GREATEST OLYMPIC MOMENTS
        </h1>
      </div>
      <div class="container text-center">
        <div class="row py-5">
          <p>
            Browse and share the funniest Olympic memes, jokes, and
            <a href="#featuredMoments" class="fw-bold text-decoration-none" style="color: #005aa7">memorable moments</a>
            from the Paris 2024 Olympics. Let's celebrate with a laugh!
          </p>
        </div>
      </div>
    </div>
  </div>

  <header class="homeSection">
    <div class="videoBackground">
      <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/iVc61V4xhlw?autoplay=1&mute=1&loop=1&playlist=iVc61V4xhlw&rel=0"
          title="Olympic Moments Video"
          allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="overlay"></div>
    </div>
  </header>

  <section id="featuredMoments" class="py-5">
    <div class="container">
      <h2 class="text-center text-uppercase fw-bold mb-5" style="color: #0055a4">
        Featured Moments
      </h2>
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php foreach ($olympicMoments as $index => $moment): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
              <img src="<?= $moment['image']; ?>" class="d-block w-100" alt="<?= $moment['title']; ?>">
              <div class="carousel-caption d-none d-md-block">
                <h5><?= $moment['title']; ?></h5>
                <p><?= $moment['description']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <section id="gallery" class="py-5">
    <div class="container">
        <h2 class="text-center text-uppercase fw-bold mb-5" style="color: #0055a4">Gallery</h2>
        <div class="row gallery">
            <?php
            $sqlGallery = "SELECT image FROM moments";
            $resultGallery = $conn->query($sqlGallery);

            if ($resultGallery->num_rows > 0) {
                while ($row = $resultGallery->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4"><img src="' . $row['image'] . '" class="img-fluid rounded-3" alt="Olympic Moment"></div>';
                }
            }
            ?>
        </div>
    </div>
</section>


  <!-- Modal for Submission Form -->
  <div class="modal fade" id="submitMomentModal" tabindex="-1" aria-labelledby="submitMomentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="submitMomentModalLabel">Submit Your Olympic Moment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="title" class="form-label">Moment Title</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Moment Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category" required>
                <option value="">Select Category</option>
                <?php
                $sqlCategories = "SELECT * FROM categories";
                $resultCategories = $conn->query($sqlCategories);
                while ($category = $resultCategories->fetch_assoc()) {
                    echo "<option value='{$category['id']}'>{$category['categoryName']}</option>";
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Moment Image</label>
              <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-warning">Submit Moment</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer id="footerSection" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>
            Celebrate the Olympic spirit by reliving historic moments of greatness and unity.
          </p>
        </div>
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">Official Olympics</a></li>
            <li><a href="tel:+1234567890">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4 text-center">
          <h5>Follow Us</h5>
          <div class="social-icons">
            <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-light"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      <hr class="border-light" />
      <div class="text-center">
        <p>&copy; 2025 Olympic Moments Archive. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
