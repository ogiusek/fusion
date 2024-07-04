<?php namespace core\http;
require_once __DIR__."/interface.php";

class Body implements IBody {
  public function __construct(
    private string $body = ""
  ){
  }

  public function text(): string {
    return $this->body;
  }

  public function is_json(): bool {
    return json_decode($this->body, true) !== null;
  }

  public function json(): array {
    if(!$this->is_json())
      throw new \Exception("body is not json");
    return json_decode($this->body);
  }

  public function __tostring(): string {
    return $this->body;
  }
}
