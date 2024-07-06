<?php namespace fusion\http;

interface IHeaders {
  public function __construct(
    array $headers = []
  );
  public function get_headers(): array;
  public function get_header(string $key): ?string;
}
