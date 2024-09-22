<!DOCTYPE html>
<html>

<head>
  <title>パスワード生成</title>
  <link rel="stylesheet" href="/app/css/styles.css">
</head>

<body>
  <main>
    <h1>パスワード生成</h1>
    <form method="post">
      <label for="length">パスワードの長さ:</label>
      <input type="number" id="length" name="length" min="8" value="12"><br><br>
      <input type="checkbox" id="includeLowercase" name="includeLowercase" checked>
      <label for="includeLowercase">小文字を含める</label><br>
      <input type="checkbox" id="includeUppercase" name="includeUppercase" checked>
      <label for="includeUppercase">大文字を含める</label><br>
      <input type="checkbox" id="includeNumbers" name="includeNumbers" checked>
      <label for="includeNumbers">数字を含める</label><br>
      <input type="checkbox" id="includeSymbols" name="includeSymbols" checked>
      <label for="includeSymbols">記号を含める</label><br><br>
      <label for="generateCount">生成するパスワードの数:</label>
      <input type="number" id='generateCount' name='generateCount' min='1' value='5'><br><br>
      <input type="submit" value="生成">
    </form>
  </main>
</body>

</html>