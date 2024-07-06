<?php namespace fusion\http;

interface IReq {
  public function __construct(
    Url $url = new Url(),
    Body $body = new Body(),
    Method $method = Method::GET,
    Headers $headers = new Headers(),
  );

  public function url(): Url;
  public function body(): Body;
  public function method(): Method;
  public function headers(): Headers;
};