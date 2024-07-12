<?php namespace fusion\http;
require_once __DIR__."/interface.php";

final class UrlPath implements IUrlPath{
  function __construct(
    private string $url = "/"
  ){
    $this->set_url($url);
  }
  
  function get_url(): string{ return $this->url; }
  function set_url(string $url = "/"): void{
    static $url_regex = "/^[a-zA-Z0-9-._~%!$&'()*+,;=:@\/]+$/";
    $url = "/" . trim($url, "/");
    if(!preg_match($url_regex, $url))
      throw new \InvalidArgumentException("invalid url path");
    $this->url = $url;
  }
}