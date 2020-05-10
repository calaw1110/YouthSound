<?php include("include/header.php"); ?>
<h1 class="pageHeadingBig">234567890-</h1>
<div class="gridViewContainer">
  <?php
  $sql = "SELECT * FROM albums ORDER BY rand() LIMIT 10";
  $albumQuery = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($albumQuery)) {
    echo "<div class='gridViewItem'>
                  <a href='album.php?id=" . $row['id'] . "'>
                      <img src='" . $row['artworkPath'] . "' alt=''>
                      <div class='gridViewInfo'>" . $row['title'] . "
                      </div>
                  </a>
              </div>";
  }
  ?>
</div>

<?php include("include/footer.php"); ?>
