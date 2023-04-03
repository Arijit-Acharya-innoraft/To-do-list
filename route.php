<?php
  class Router {

    public $uri;
    public $routes = [];

    function __construct() {
      $this->uri = parse_url($_SERVER["REQUEST_URI"])["path"];
      $this->routes = [
      "/" => "application/view/home.php",
      "/home" => "application/view/home.php",
      "/post" => "application/view/post.php",
      "/homecontroller" =>"application/controller/HomeController.php"
      ];
    }

    function toPages() {
      $uri = $this->uri;
      $routes = $this->routes;
      if(array_key_exists($uri,$routes)) {
        require $routes[$uri];

      }
      else {
        $this->abot();
      }
    }

    function abot() {
      require ("application/view/error.php");
    }
  }
?>
