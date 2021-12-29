<?php
    include "template/header.php";
    include_once "core/db.php";

    if(isset($_GET["album"])){
       $album = htmlspecialchars($_GET['album']);
    }

    $res = $pdo->query("select * from album_photos inner join Photo on Photo.id=album_photos.photo_id where album_photos.album_id = '$album';");
    
    $Photos = [];
    while($photo = $res->fetch()){
    $Photos[] = $photo;
}
// var_dump($Photos);
?>

<div class="container">
    <div class="row infoBar">
        <div class="text-info col">
            <p>amount of works:<?php echo count($Photos)?></p>
        </div>
        <div class="row">
            <?php foreach ($Photos as $key => $photo){?>
            <div class="card col-sm-4" style="width: 18rem;">
                <?php if(isset($photo["Photo_link"]) && $photo["Photo_link"]){?>
                <img src="<?php echo $photo["Photo_link"]?>" class="card-img-top">
                <?php }else{?>
                Нет картинки :(
                <?php }?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $photo["name"]?></h5>
                    <p class="card-text"><?php echo $photo["Category"]?></p>
                    <a href="articles.php?id=<?php echo $photo["id"];?>" class="btn btn-primary">Look inside</a>
                    <a href="?del=<?php echo $photo["id"];?>" class="btn btn-primary btn-danger" name="del">Delete</a>
                </div>
            </div>
            <?php }?>
        </div>