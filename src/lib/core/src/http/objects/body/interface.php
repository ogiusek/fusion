<?php namespace core\http;

interface IBody {  
  public function __construct(
    string $body = ""
  );

  public function text(): string;
  public function is_json(): bool;
  public function json(): array;

  public function __tostring(): string;
}
