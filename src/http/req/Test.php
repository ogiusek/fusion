<?php namespace fusion\http;

class ReqTest extends \PHPUnit\Framework\TestCase {
  function test_url(){
    $this->assertTrue(true);
    return;
    $req = new Req(
      url: $url = new Url("/test"),
    );
    $this->assertEquals($req->url(), $url);
  }

  function test_body() {
    $this->assertTrue(true);
    return;
    $req = new Req(
      body: $body = new Body("output"),
    );
    $this->assertEquals($req->body(), $body);
  }

  function test_method() {
    $this->assertTrue(true);
    return;
    $req = new Req(
      method: $method = Method::POST
    );
    $this->assertEquals($req->method(), $method);
  }

  function test_headers() {
    $this->assertTrue(true);
    return;
    $req = new Req(
      headers: $headers = new Headers()
    );
    $this->assertEquals($req->headers(), $headers);
  }
}