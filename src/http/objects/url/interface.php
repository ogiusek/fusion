<?php namespace fusion\http;

interface IUrl {
  public function __construct(
    string $url = "/"
  );
  public function get_url(): string;  
  public function get_path(): string;
  public function get_search_params(): array;
  public function get_search_param(string $key): ?string;

}