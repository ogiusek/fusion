<?php namespace fusion\http\traits;
require_once __DIR__."/interface.php";

trait Url{
  private string $url = "/";
  private function initUrl(string $url = "/"){
    $url_regex = "/^[a-zA-Z0-9-._~%!$&'()*+,;=:@\/]+$/";
    $url = "/" . trim($url, "/");
    if(!preg_match($url_regex, $url))
      throw new \InvalidArgumentException("invalid url path");
    $this->url = $url;
  }

  final function get_url(): string{ return $this->url; }
}