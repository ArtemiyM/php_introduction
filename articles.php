<?php
include "template/header.php";
include_once "core/db.php";
?>

<?php
if(isset($_GET["id"])){
    $photo = getPhoto($_GET["id"]);
}
?>

<div class="card" style="width: 18rem;">
  <img src="<?php echo $photo["Photo_link"]?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Photo number: <?php echo $photo['id']?></h5>
    <h5 class="card-title">Category: <?php echo $photo['Category']?></h5>
    <a href="myworks.php?category=<?php echo $photo['Category']?>" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php
include "template/footer.php";
?>
