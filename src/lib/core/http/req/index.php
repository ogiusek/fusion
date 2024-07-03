<?php namespace core\http;

class Req {
  public function __construct(
    public Url $url = new Url(),
    public Body $body = new Body(),
    public Method $method = Method::GET,
    public Headers $headers = new Headers(),
  ) {}
}