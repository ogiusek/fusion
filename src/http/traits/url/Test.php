<?php namespace fusion\http\traits;

final class UrlTested implements IUrl{
  use Url;
  function __construct(string $url){
    $this->initUrl($url);
  }
}

class UrlTest extends \PHPUnit\Framework\TestCase {
  function test_init_with_empty_string_as_valid_input() {
    new UrlTested("");
    $this->assertTrue(true);
  }

  function test_init_with_slash_as_valid_input() {
    new UrlTested("/");
    $this->assertTrue(true);
  }

  function test_init_with_route_with_slash_as_valid_input() {
    new UrlTested("/example-route");
    $this->assertTrue(true);
  }

  function test_init_with_route_without_slash_as_valid_input() {
    new UrlTested("example-route");
    $this->assertTrue(true);
  }

  function test_init_with_search_params_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new UrlTested("/example-route?a=1&b=2");
  }

  function test_init_with_space_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new UrlTested("example route");
  }
}