<?php namespace fusion\http;

class HeadersTest extends \PHPUnit\Framework\TestCase {
  function test_init_with_object() {
    new Headers(["a" => "b"]);
    $this->assertTrue(true);
  }
  
  function test_init_error_throws_with_array() {
    $this->expectException(\Exception::class);
    new Headers(["a", "b"]);
  }
  
  function test_init_error_throws_with_wrong_value() {
    $this->expectException(\Exception::class);
    new Headers(["a" => []]);
  }

  function test_get_headers() {
    $headers = new Headers(["a" => "b"]);
    $this->assertEquals($headers->get_headers(), ["a" => "b"]);
  }

  function test_get_header() {
    $headers = new Headers(["a" => "b"]);
    $this->assertEquals($headers->get_header("a"), "b");
  }
}