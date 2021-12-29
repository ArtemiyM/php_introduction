<?php
    include "template/header.php";
    include_once "core/db.php";

    $albums = $pdo->query('select * from Albums');
?>


<?php foreach ($albums as $key => $album){?>
<a href="album.php?album=<?php echo $album['id']?>">
    Album name: <?php echo $album['name']?>
</a> <br />
<?php }?>