<?php namespace fusion\http\traits;
require_once __DIR__."/interface.php";

trait UrlPath{
  private string $url = "/";
  
  final function get_url(): string{ return $this->url; }
  final function set_url(string $url = "/"): void{
    $url_regex = "/^[a-zA-Z0-9-._~%!$&'()*+,;=:@\/]+$/";
    $url = "/" . trim($url, "/");
    if(!preg_match($url_regex, $url))
      throw new \InvalidArgumentException("invalid url path");
    $this->url = $url;
  }
}