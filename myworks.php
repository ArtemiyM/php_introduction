<?php
    include "template/header.php";
    include_once "core/db.php";
?>
<?php
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    // $query = "delete from Photo where (id='$id')";
    deletePhoto($id);
    
 }
?>

<div class="container">
    <div class="text-center py-2 bg-dark text-white">
        <p>Количество найденных фотографий: <?php echo count($Photos)?></p>
        <?php if(isset($_GET["category"])){?>
        <p>Фильтрация по категории: <?php echo $_GET["category"]?> <a href="myworks.php">Отмена фильтрации</a></p>
        <?php }?>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($Photos as $key => $photo){?>
            <div class="card mx-auto p-auto" style="width: 18rem;">
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
    </div>
</div>