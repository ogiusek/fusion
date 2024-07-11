<?php namespace fusion\http;
require_once __DIR__."/interface.php";

class Body implements IBody {
  function __construct(
    private string $body = ""
  ){
  }

  function text(): string {
    return $this->body;
  }

  function is_json(): bool {
    return json_decode($this->body, true) !== null;
  }

  function json(): array {
    if(!$this->is_json())
      throw new \Exception("body is not json");
    return json_decode($this->body);
  }

  function __tostring(): string {
    return $this->body;
  }
}
