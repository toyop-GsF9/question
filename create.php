<?php

    $dish = $_POST['dish'];
    $date = $_POST['date'];
    $timing = $_POST['timing'];
    $genre = $_POST['genre'];
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_dir = './data/' . $img_name;

    // 画像を保存
    move_uploaded_file($img_tmp, $img_dir);

    // データをCSVファイルに保存
    $csv_line = $date . ',' . $dish . ',' . $timing . ',' . $genre . ',' . $img_dir . "\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/data.csv', 'a');
// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $csv_line);

// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:index.php");


    

?>

