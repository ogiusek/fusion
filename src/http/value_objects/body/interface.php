<?php namespace fusion\http;

interface IBody {  
  function __construct(
    string $body = ""
  );

  function text(): string;
  function is_json(): bool;
  function json(): array;
  function __tostring(): string;
}
