<?php namespace fusion\http;
require_once __DIR__."/interface.php";

class Url implements IUrl {
  public function __construct(
    private string $url = "/"
  ) {
    if($url[0] !== "/" || filter_var("https://google.com{$this->url}", FILTER_VALIDATE_URL) === false)
      throw new \Exception("\"$url\" is invalid url"); 
  }

  public function get_url(): string {
    return $this->url;
  }

  public function get_path(): string {
    $path = parse_url($this->url, PHP_URL_PATH);
    return $path;
  }

  public function get_search_params(): array {
    parse_str(parse_url($this->url, PHP_URL_QUERY), $params);
    return $params;
  }

  public function get_search_param(string $key): ?string {
    $params = $this->get_search_params();
    return $params[$key] ?? null;
  }
}