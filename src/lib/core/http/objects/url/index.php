<?php namespace core\http;
require_once "interface.php";

class Url implements IUrl {
  public string $url;

  public function __construct(
    string $url = "/"
  ) {
    // TODO validate
    $this->url = $url;
  }
}