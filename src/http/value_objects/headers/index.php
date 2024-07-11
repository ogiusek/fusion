<?php namespace fusion\http;
require_once __DIR__."/interface.php";

class Headers implements IHeaders {
  function __construct(
    private array $headers = []
  ) {
    foreach ($headers as $key => $value) {
      if(!is_string($key) || !is_string($value))
        throw new \Exception("Invalid header key or value");
    }
  }

  function get_headers(): array{
    return $this->headers;
  }
  function get_header(string $key): ?string{
    return $this->headers[$key] ?? null;
  }
}
