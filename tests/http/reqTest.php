<?php namespace fusion\http;

class ReqTest extends \PHPUnit\Framework\TestCase {
  public function test_url(){
    $req = new Req(
      url: $url = new Url("/test"),
    );
    $this->assertEquals($req->url(), $url);
  }

  public function test_body() {
    $req = new Req(
      body: $body = new Body("output"),
    );
    $this->assertEquals($req->body(), $body);
  }

  public function test_method() {
    $req = new Req(
      method: $method = Method::POST
    );
    $this->assertEquals($req->method(), $method);
  }

  public function test_headers() {
    $req = new Req(
      headers: $headers = new Headers()
    );
    $this->assertEquals($req->headers(), $headers);
  }
}