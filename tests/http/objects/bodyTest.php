<?php namespace fusion\http;

class BodyTest extends \PHPUnit\Framework\TestCase {
  public function test_text() {
    $body = new Body("output");
    $this->assertEquals($body->text(), "output");
  }

  public function test_is_wrong_json() {
    $body = new Body("output");
    $this->assertFalse($body->is_json());
  }

  public function test_is_correct_json() {
    $body = new Body("[\"a\"]");
    $this->assertTrue($body->is_json());
  }

  public function test_do_json_throw_error_on_wrong_json() {
    $body = new Body("output");
    $this->expectException(\Exception::class);
    $body->json();
  }

  public function test_tostring() {
    $body = new Body("output");
    $this->assertEquals($body->__tostring(), "output");
  }
}