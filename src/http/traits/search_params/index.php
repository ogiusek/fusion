<?php namespace fusion\http\traits;
require_once __DIR__."/interface.php";

trait SearchParams{
  private $search_params = "";
  
  private function set_search_params(string $search_params = "") {
    if (strpos($search_params, '/') !== false || strpos($search_params, '?') !== false || !empty(parse_url($search_params, PHP_URL_QUERY)))
      throw new \InvalidArgumentException("Invalid search params: '/' or '?' are not allowed, and query string is not permitted.");

    $this->search_params = $search_params;
  }

  final function get_search_params(): array {
    parse_str($this->search_params, $params);
    return $params;
  }

  final function get_search_param(string $key): ?string {
    $params = $this->get_search_params();
    return $params[$key] ?? null;
  }
}