<?php
$str = '';

$file = fopen('data/data.csv', 'r');
if ($file) {
    flock($file, LOCK_SH); // 共有ロックを設定

    while ($line = fgets($file)) {
        // 取得したデータを`$str`に追加する
        $str .= "<tr><td>{$line}</td>";

        // 5番目のエントリ（画像のパス）を取得します
        $data = str_getcsv($line);
        $image_path = $data[4];

        // 画像を表示します
        if ($image_path !== '') {
            // 画像をリサイズして表示する
            echo "<td><img src='$image_path' alt='Image' style='max-width: 200px; max-height: 200px;' /></td></tr>";
        } else {
            echo "<td></td></tr>";
        }
    }

    flock($file, LOCK_UN); // ロックを解除
    fclose($file); // ファイルを閉じる
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートリスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>アンケートリスト（一覧画面）</legend>
        <a href="index.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>日付</th>
                    <th>画像</th>
                </tr>
            </thead>
            <tbody>
                <?=$str?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>
