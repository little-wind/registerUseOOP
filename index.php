<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>会员系统</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    function __autoload($className) {
      require 'class/' . $className . '.class.php';
    }

    //实例化Main类
    if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['index'])) {
      $Main = new Main($_GET['index']);
    } else {
      $Main = new Main();
    }

    $Main->run();
  ?>
</body>
</html>