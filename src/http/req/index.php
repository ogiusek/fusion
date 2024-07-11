<?php namespace fusion\http;
require_once "interface.php";

class Req implements IReq {
  function __construct(
    private Url $url = new Url(),
    private Body $body = new Body(),
    private Method $method = Method::GET,
    private Headers $headers = new Headers(),
  ) {}

  function url(): Url { return $this->url; }
  function body(): Body { return $this->body; }
  function method(): Method { return $this->method; }
  function headers(): Headers { return $this->headers; }
}