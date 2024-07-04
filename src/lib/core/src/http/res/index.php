<?php namespace core\http;
require_once __DIR__."/interface.php";

class Res implements IRes {
  public function __construct(
    private Body $body = new Body(),
    private Headers $headers = new Headers(),
    private Status $status = Status::OK,
  ) {}
  
  public function run(): void{
    http_response_code($this->status->value);
    foreach ($this->headers->get_headers() as $key => $value) {
      header("$key: $value");
    }
    echo $this->body;
  } 

}
