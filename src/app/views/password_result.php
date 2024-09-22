<!DOCTYPE html>
<html>

<head>
  <title>生成されたパスワード</title>
  <link rel="stylesheet" href="/app/css/styles.css">
</head>

<body>
  <main>
    <h1>生成されたパスワード</h1>
    <?php
    if (isset($password)) {
      foreach ($password as $pass) {
        echo "<p>$pass</p>";
      }
    }
    ?>
  </main>
</body>

</html>