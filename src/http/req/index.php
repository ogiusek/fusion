<?php namespace fusion\http;
require_once "interface.php";

class Req implements IReq {
  public function __construct(
    private Url $url = new Url(),
    private Body $body = new Body(),
    private Method $method = Method::GET,
    private Headers $headers = new Headers(),
  ) {}

  public function url(): Url { return $this->url; }
  public function body(): Body { return $this->body; }
  public function method(): Method { return $this->method; }
  public function headers(): Headers { return $this->headers; }
}