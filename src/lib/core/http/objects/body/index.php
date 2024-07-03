<?php namespace core\http;
require_once "interface.php";

class Body implements IBody {
  private string $body;

  public function __construct(
    string $body = ""
  ){
    $this->body = $body;
  }
}
