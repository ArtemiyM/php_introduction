<?php
include "template/header.php";
include_once "core/db.php";


$errors = [];
if($_POST){
    $postFiltered = [];
    foreach ($_POST as $postKey => $postItem){
        $postFiltered[$postKey] = htmlspecialchars($postItem);
    }
    // var_dump($postFiltered);
    if(!$_POST['Photo_link']){
        $errors[] = 'Photo_link';
    }

    if(!$_POST['category']){
        $errors[] = 'category';
    }

    $result = savePhoto($postFiltered['Photo_link'],$postFiltered['Category']);
    // var_dump($res);
}

?>
<form method="post">

    <div class="col-sm-4 mb-3">
        <label for="Photo_link" class="form-label">Ссылка на изображение</label>
        <input type="text" name="Photo_link" class="form-control" id="Photo_link">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="Category" class="form-label">Категория</label>
        <input type="text" name="Category" class="form-control" id="Category">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php if(isset($result)){?>
        <div class="alert alert-success" role="alert">
            Фото успешно загружено!
        </div>
    <?php }?>
    <!-- <div class="col-sm-auto">
      <form action=myworks.php method=post enctype=multipart/form-data>
      <input type=file name="Photo_link" class="form-control" id="Photo_link">
       <button type="submit" class="btn btn-primary">Submit</button>
    </div> -->
</form>

<?php
include "template/footer.php";
?>
