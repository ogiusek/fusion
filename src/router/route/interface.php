<?php namespace fusion\router;
use fusion\http\{Req, Url, Method};

interface IRoute {
  public function __construct(
    Url $url = new Url(),
    Method $method = Method::GET
  );

  public function url(): Url;
  public function method(): Method;

  public function matches(Req $request): bool;
}