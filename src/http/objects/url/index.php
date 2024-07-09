<?php namespace fusion\http;
require_once __DIR__."/interface.php";

class Url implements IUrl {
  public function __construct(
    private string $url = "/"
  ) {
    if($this->url[0] !== "/")
      $this->url = "/{$this->url}";
    if(filter_var("https://google.com{$this->url}", FILTER_VALIDATE_URL) === false)
      throw new \Exception("\"{$this->url}\" is invalid url"); 
  }

  public function get_url(): string { return $this->url; }

  public function get_path(): string { return rtrim(parse_url($this->url, PHP_URL_PATH), "/"); }

  public function get_search_params(): array {
    parse_str(parse_url($this->url, PHP_URL_QUERY), $params);
    return $params;
  }

  public function get_search_param(string $key): ?string {
    $params = $this->get_search_params();
    return $params[$key] ?? null;
  }

  public function matches(Url $url): bool {
    $this_url_parts = explode('/', $this->get_path());
    $url_parts = explode('/', $url->get_path());
    if (count($this_url_parts) !== count($url_parts))
      return false;

    $parts_matches = array_map(function($a, $b) {
      return $a === $b || $a[0] === ":";
    }, $this_url_parts, $url_parts);

    $url_matches = !in_array(false, $parts_matches);
    return $url_matches;
  }

  public function get_vars(Url $url): array {
    if(!$this->matches($url))
      throw new \Exception("cannot get vars of not matching urls");

    $this_url_parts = explode('/', $this->get_path());
    $url_parts = explode('/', $url->get_path());
    $url_vars_arrays = array_map(function($a, $b) {
      if(($a[0]??"") !== ":")
        return [];
      $name = substr($a, 1);
      return [$name => $b];
    }, $this_url_parts, $url_parts);
    $url_vars_array = array_merge(...$url_vars_arrays);
    return $url_vars_array;
  }

  public function get_var(Url $url, string $key): ?string {
    $vars = $this->get_vars($url);
    return $vars[$key] ?? null;
  }
}