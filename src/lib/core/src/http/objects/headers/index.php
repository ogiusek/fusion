<?php namespace core\http;
require_once __DIR__."/interface.php";

class Headers implements IHeaders {
  public function __construct(
    private array $headers = []
  ) {
    foreach ($headers as $key => $value) {
      if(!is_string($key) || !is_string($value))
        throw new \Exception("Invalid header key or value");
    }
  }

  public function get_headers(): array{
    return $this->headers;
  }
  public function get_header(string $key): ?string{
    return $this->headers[$key] ?? null;
  }
}
