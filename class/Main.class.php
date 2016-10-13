<?php
  class Main {
    //用于接收$_GET['index']的值
    private $index;
    private $send;

    //初始化
    public function __construct($index = '') {
      $this->index = $index;
      $this->send = (isset($_POST['send'])) ? $_POST['send'] : '';
    }

    //执行页面引入
    public function run() {
      //接受表单提交
      if(isset($this->send)) {
        $this->send();
      }

      include $this->getUIDocument();
    }

    //载入界面
    private function getUIDocument() {
      if(empty($this->index) OR !file_exists('inc/' . $this->index . '.inc.php')) {
        $this->index = 'start';
      }
      return 'inc/' . $this->index . '.inc.php';
    }

    //接收登录/注册的发送操作请求
    private function send() {
      switch($this->send) {
        case '注册':
          $this->exec(new Register($_POST['username'], $_POST['password'], $_POST['passwordConfirm'], $_POST['email']));
          break;

        case '登录':
          $this->exec(new Login($_POST['username'], $_POST['password']));
          break;

        default:
          break;
      }
    }

    //接收注册/登录对象
    private function exec($class) {
      if($class->check()) {
        $class->query();
      } else {
        //弹出错误提示
        Tool::alertBack('字段不能为空！');
      }
    }
  }
?>