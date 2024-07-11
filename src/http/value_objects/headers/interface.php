<?php namespace fusion\http;

interface IHeaders {
  function __construct(
    array $headers = []
  );
  function get_headers(): array;
  function get_header(string $key): ?string;
}
