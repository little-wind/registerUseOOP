<?php
  class Register extends User {
    //接收表单的值
    public function __construct($username, $password, $passwordConfirm, $email) {
      $this->username = $username;
      $this->password = $password;
      $this->passwordConfirm = $passwordConfirm;
      $this->email = $email;
    }

    public function query() {
      $xml = <<<xml
<?xml version="1.0" encoding="utf-8"?>
<user>
  <username>$this->username</username>
  <password>$this->password</password>
  <email>$this->email</email>
</user>
xml;
      $sxe = new SimpleXMLElement($xml);
      $sxe->asXML('user.xml');
      Tool::alertLocation('恭喜你，注册成功！', 'index.php?index=login');
    }

    public function check() {
      if(empty($this->username) OR
          empty($this->password) OR
          empty($this->passwordConfirm) OR
          empty($this->email)) {
        return false;
      } else {
        return true;
      }
    }
  }
?>