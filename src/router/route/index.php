<?php namespace fusion\router;
require_once __DIR__."/interface.php";
use fusion\http\{Req, Url, Method};

class Route implements IRoute {
  private array $url_vars = [];
  public function __construct(
    private Url $url = new Url(),
    private Method $method = Method::GET
  ){}

  public function url(): Url{ return $this->url; }
  public function method(): Method{ return $this->method; }
  
  public function matches(Req $request): bool{
    if($this->method() !== $request->method())
      return false;

    if(!$this->url->matches($request->url()))
      return false;

    return true;
  }
}