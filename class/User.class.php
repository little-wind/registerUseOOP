<?php
  abstract class User {
    //成员字段
    protected $username;
    protected $password;
    protected $passwordConfirm;
    protected $email;

    //用于注册和登录操作的执行
    abstract function query();

    //用于用户输入的验证
    abstract function check();
  }
?>