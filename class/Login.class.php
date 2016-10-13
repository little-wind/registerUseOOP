<?php
  class Login extends User {
    public function __construct($username, $password) {
      //接收表单的值
      $this->username = $username;
      $this->password = $password;
    }

    public function query() {
      $sxe = simplexml_load_file('user.xml');
      $sxe->username;
      $sxe->password;

      if($this->username == $sxe->username AND $this->password == $sxe->password) {
        //生成cookie
        setcookie('username', $this->username);
        tool::alertLocation($this->username . '，登录成功！', '?index=member');
      } else {
        Tool::alertBack('登录失败！请重新登录！');
      }
    }

    public function check() {
      if(empty($this->username) OR
          empty($this->password)) {
        return false;
      } else {
        return true;
      }
    }
  }
?>