<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>昨日何食べた？（入力画面）</title>
</head>

<body>
  <form action="create.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>昨日何食べた？（入力画面）</legend>
      <a href="read.php">結果画面</a>
      <div>
        食べた物: <input type="text" name="dish">
      </div>
      <div>
        日付: <input type="date" name="date">
      </div>
      <div>
        タイミング: <input type="text" name="timing" list="timingls">
      </div>
      <datalist id="timingls">
        <option value="朝食"></option>
        <option value="昼食"></option>
        <option value="夕食"></option>
      </datalist>
      <div>
        ジャンル: <input type="text" name="genre" list="genrels">
      </div>
      <datalist id="genrels">
        <option value="和食"></option>
        <option value="洋食"></option>
        <option value="中華"></option>
        <option value="その他"></option>
      </datalist>
      <div>
        画像: <input type="file" name="img" accept=".jpg,.jpeg,.png" required>
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>