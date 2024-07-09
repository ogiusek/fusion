<?php namespace fusion\http;

class HeadersTest extends \PHPUnit\Framework\TestCase {
  public function test_init_with_object() {
    new Headers(["a" => "b"]);
    $this->assertTrue(true);
  }
  
  public function test_init_with_array() {
    $this->expectException(\Exception::class);
    $headers = new Headers(["a", "b"]);
  }

  public function test_init_with_wrong_value() {
    $this->expectException(\Exception::class);
    $headers = new Headers(["a" => []]);
  }

  public function test_get_headers() {
    $headers = new Headers(["a" => "b"]);
    $this->assertEquals($headers->get_headers(), ["a" => "b"]);
  }

  public function test_get_header() {
    $headers = new Headers(["a" => "b"]);
    $this->assertEquals($headers->get_header("a"), "b");
  }
}