<?php
    // ПОДКЛЮЧЕНИЕ К БД И ЗАПУСК СЕССИИ
    require_once 'db.php';

    // ПЕРЕМЕННЫЕ
    $name = $_POST['name'];
    $price = $_POST['price'];
    $genre = $_POST['genre-list'];
    $date = $_POST['date'];
    $publisher = $_POST['publisher'];
    $platform = $_POST['platform-list'];
    $about = $_POST['about'];
    $cover = $_FILES['cover']['name'];
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
    $img4 = $_FILES['img4']['name'];

    // ДОБАВЛЕНИЕ ТОВАРА В БД
    $query = $connect->prepare("INSERT INTO goods(title, price, genre, date, publisher, platform, cover, about, img1, img2, img3, img4) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$title, $price, $genre, $date, $publisher, $platform, $cover, $about, $img1, $img2, $img3, $img4]);

    // ЗАГРУЗКА ИЗОБРАЖЕНИЙ
    $uploadfile = "../../assets/img/covers/".$_FILES['cover']['name'];
    move_uploaded_file($_FILES['cover']['tmp_name'], $uploadfile);
    $uploadfile = "../../assets/img/games/".$_FILES['img1']['name'];
    move_uploaded_file($_FILES['img1']['tmp_name'], $uploadfile);
    $uploadfile = "../../assets/img/games/".$_FILES['img2']['name'];
    move_uploaded_file($_FILES['img2']['tmp_name'], $uploadfile);
    $uploadfile = "../../assets/img/games/".$_FILES['img3']['name'];
    move_uploaded_file($_FILES['img3']['tmp_name'], $uploadfile);
    $uploadfile = "../../assets/img/games/".$_FILES['img4']['name'];
    move_uploaded_file($_FILES['img4']['tmp_name'], $uploadfile);

    // СООБЩЕНИЕ
    $_SESSION["mes"] = "Товар успешно добавлен!";

    // ПЕРЕАДРЕСАЦИЯ
    header("Location: ../../edit-catalog.php");
?>