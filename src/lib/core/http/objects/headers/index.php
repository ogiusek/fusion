<?php namespace core\http;
require_once "interface.php";

class Headers implements IHeaders {
  private array $headers;

  public function __construct(
    array $headers = []
  ) {
    $this->headers = $headers;
  }
}
