<?php namespace fusion\http;
use fusion\http\{Req, Url, Method};
use fusion\router\Route;

class RouteTest extends \PHPUnit\Framework\TestCase {
  function test_init() {
    $this->assertTrue(true);
    // new Route();
  }

  // function test_url() {
  //   $route = new Route(
  //     url: $url = new Url("/test"),
  //   );
  //   $this->assertEquals($route->url(), $url);
  // }

  // function test_method() {
  //   $route = new Route(
  //     method: Method::POST,
  //   );
  //   $this->assertEquals($route->method(), Method::POST);
  // }

  // function test_matches() {
  //   $route = new Route(
  //     url: $url = new Url("/test"),
  //     method: $method = Method::POST,
  //   );
  //   $this->assertFalse($route->matches(new Req()));
  //   $this->assertFalse($route->matches(new Req(method: $method)));
  //   $this->assertFalse($route->matches(new Req(url: $url)));
  //   $this->assertTrue($route->matches(new Req(
  //     url: $url,
  //     method: $method
  //   )));
  // }
}