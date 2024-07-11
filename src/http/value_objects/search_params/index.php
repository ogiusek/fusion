<?php namespace fusion\http;
require_once __DIR__."/interface.php";

final class SearchParams implements ISearchParams{
  function __construct(
    private $search_params = ""
  ){
    $this->set_search_params($search_params);
  }
  
  private function set_search_params(string $search_params = "") {
    if (strpos($search_params, '/') !== false || strpos($search_params, '?') !== false || !empty(parse_url($search_params, PHP_URL_QUERY)))
      throw new \InvalidArgumentException("Invalid search params: '/' or '?' are not allowed, and query string is not permitted.");

    $this->search_params = $search_params;
  }

  function get_search_params(): array {
    parse_str($this->search_params, $params);
    return $params;
  }

  function get_search_param(string $key): ?string {
    $params = $this->get_search_params();
    return $params[$key] ?? null;
  }
}