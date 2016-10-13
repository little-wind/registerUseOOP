<?php
  final class Tool {
    //弹窗，并返回上一页
    static public function alertBact($info) {
      echo "<script type=\"text/javascript\">alert('$info');history.back();</script>";
      exit();
    }

    //弹窗并跳转
    static public function alertLocation($info, $url) {
      echo "<script type=\"text/javascript\">alert('$info');location.href='$url';</script>";
      exit();
    }
  }
?>