<?php
include "template/header.php";
include_once "core/db.php";
?>

<?php
if (isset($_POST["albumName"])) {
  $albumname = htmlspecialchars($_POST["albumName"]);
  $albumPhotos = $_POST["Photos"];

  $sqlString = "INSERT INTO Albums (name) VALUES ('$albumname')";
  
  try {
    $pdo->exec($sqlString);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  
  $albumid = $pdo->lastInsertId();
  // var_dump($albumid);
  
  foreach ($albumPhotos as $key => $photo) {
    $pdo->exec("INSERT INTO album_photos (photo_id,album_id) VALUES ('$photo','$albumid')");
  }
}
?>

<form action="" method="POST" style="height: 500px;">
    <div class="row" style="height: 600px;">
        <div class="container col-sm-5 align-middle align-items-center">
            <p class="text-center py-2 bg-dark text-white">Pick photos, enter name and click "save"</p>
            <div class="mt-2">
                <select class="form-select" name="Photos[]" multiple>
                    <?php foreach ($Photos as $key => $photo) { ?>
                    <option value="<?php echo $photo['id'] ?>">
                        photo_number <?php echo $photo['id'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="constructorBar">
                <div class="row text-center mt-2">
                    <input class="form-control col" name="albumName" placeholder="Album name" aria-label="albumName">
                    <button class="btn btn-secondary col">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>

</html>