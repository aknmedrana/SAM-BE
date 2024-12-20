<?php

include('connect.php');
include('classes.php');

class IslandsOfPersonality
{
  public $name;
  public $shortDescription;
  public $longDescription;
  public $color;
  public $image;
  public $contents;

  public function __construct($name, $shortDescription, $longDescription, $color, $image, $contents = [])
  {
    $this->name = $name;
    $this->shortDescription = $shortDescription;
    $this->longDescription = $longDescription;
    $this->color = $color;
    $this->image = $image;
    $this->contents = $contents;
  }

  // Method to generate the HTML card
  public function generateCard()
  {
    $contentsHtml = "";
    foreach ($this->contents as $content) {
      $contentsHtml .= '
                <div class="content-item mb-3" style="border-left: 5px solid ' . $content['color'] . '; padding-left: 10px;">
                    <img src="' . $content['image'] . '" alt="Content Image" style="padding:35px; width: 100%; height: auto; border-radius: 5px; margin-bottom: 10px;">
                    <p>' . $content['content'] . '</p>
                </div>';
    }

    return '
            <div class="col-md-6 my-3">
                <div class="card p-4 rounded-5" style="border-left: 10px solid ' . $this->color . ';">
                    <img src="' . $this->image . '" alt="' . $this->name . '" class="card-img-top rounded-5" style=" width: 100%; height: auto; padding: 10px;">
                    <div class="card-body">
                        <h3 class="card-title">' . $this->name . '</h3>
                        <p class="card-text text-secondary">' . $this->shortDescription . '</p>
                        <p class="card-text">' . $this->longDescription . '</p>
                    </div>
                    <div class="card-footer">
                        ' . $contentsHtml . '
                    </div>
                </div>
            </div>';
  }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetching all active islands from the database
$sqlIslands = "SELECT * FROM islandsOfPersonality WHERE status = 'Active'";
$resultIslands = $conn->query($sqlIslands);

$islands = [];
if ($resultIslands && $resultIslands->num_rows > 0) {
  while ($island = $resultIslands->fetch_assoc()) {
    $sqlContents = "SELECT * FROM islandContents WHERE islandOfPersonalityID = " . $island['islandOfPersonalityID'];
    $resultContents = $conn->query($sqlContents);

    $contents = [];
    if ($resultContents && $resultContents->num_rows > 0) {
      while ($content = $resultContents->fetch_assoc()) {
        $contents[] = [
          'image' => $content['image'],
          'content' => $content['content'],
          'color' => $content['color']
        ];
      }
    }

    $islands[] = new IslandsOfPersonality(
      $island['name'],
      $island['shortDescription'],
      $island['longDescription'],
      $island['color'],
      $island['image'],
      $contents
    );
  }
} else {
  echo "No active islands found.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kath's Islands of Personalities</title>
  <link rel="icon" type="image/x-icon" href="../A05/assets/img/logo.png" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #f3f4f6;
      color: #333;
    }

    .navbar {
      background-color: #aa6fbf;
    }

    .navbar-brand {
      color: #fff;
      text-decoration: none;
    }

    .navbar-brand:hover {
      color: #ddd;
    }

    .navbar-nav .nav-link {
      color: #fff;
      font-size: 1.25rem;
      transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
      color: #ddd;
    }

    footer {
      background-color: #aa6fbf;
      color: #fff;
      padding: 1.5rem 0;
    }

    footer a {
      color: #fff;
      transition: color 0.3s ease;
    }

    footer a:hover {
      color: #ddd;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand">
    <a class="navbar-brand" href="#">Anne Kathlyn Medrana</a>
  </nav>

  <!-- Header -->
  <header class="text-center">
    <div class="image-container">
      <img src="../A05/assets/img/header-1.png" alt="Kath's Islands" style="width: 100%; height: auto" />
    </div>
  </header>

  <div class="container my-5">
    <div class="text-align-center" style="color: #655C9E;">
      <h1 class="display-4">Anne Kathlyn's</h1>
      <h3 class="mt-3">
        Islands of
        <span class="badge badge-warning">PERSONALITIES</span>
      </h3>
    </div>
    <div class="row">
      <?php
      foreach ($islands as $island) {
        echo $island->generateCard();
      }
      ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-white pt-4" style="background-color: #aa6fbf;">
    <div class="container">
      <div class="row">
        <!-- About Me Section -->
        <div class="col-md-4">
          <h5>About Me</h5>
          <img src="../A05/assets/img/me.png" class="rounded-circle mb-3" alt="About Me"
            style="width: 80px; height: 80px; object-fit: cover;" />
          <p>
            Hi, I’m Anne Kathlyn Medrana, a 22-year-old BSIT student who loves
            UI/UX and graphic design. Passionate about art, leadership, and
            creativity, I also enjoy gaming and anime for inspiration.
          </p>
        </div>
        <!-- Quick Links -->
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="index.html" class="text-white text-decoration-none">Home</a></li>
            <li><a href="https://aknmedrana.github.io/" class="text-white text-decoration-none">Portfolio</a></li>
            <li><a href="#" class="text-white text-decoration-none">Contact: 0930 777 6915</a></li>
          </ul>
        </div>
        <!-- Social Media -->
        <div class="col-md-4 text-center">
          <h5>Follow Me</h5>
          <div class="d-flex justify-content-center">
            <a href="https://www.facebook.com/annekathlynmedrana.0033" class="text-white mx-2"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="https://www.instagram.com/kthlyniv/" class="text-white mx-2"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="https://www.linkedin.com/in/anne-kathlyn-medrana-401604257/" class="text-white mx-2"><i class="fa fa-linkedin fa-2x"></i></a>
          </div>
        </div>
      </div>
      <hr class="bg-light my-4" />
      <div class="text-center">
        <p class="mb-0">&copy; Kath's Islands 2024. All Rights Reserved.</p>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>