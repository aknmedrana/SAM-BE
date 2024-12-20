<?php
class IslandsofPersonalities
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function getAllIslands()
  {
    $query = "SELECT * FROM islandsOfPersonalities WHERE status = 'Active'";
    $result = $this->conn->query($query);

    $islands = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $islands[] = $row;
      }
    }
    return $islands;
  }

  public function generateCard($name, $shortDescription, $color, $image)
  {
    return '
        <div class="col-md-6 mb-4">
          <div class="card" style="background-color: ' . $color . ';">
            <img src="' . $image . '" class="card-img-top" alt="' . $name . '">
            <div class="card-body">
              <h5 class="card-title">' . $name . '</h5>
              <p class="card-text">' . $shortDescription . '</p>
            </div>
          </div>
        </div>
        ';
  }
}
?>