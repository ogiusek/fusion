<?php namespace fusion\http;

class UrlTest extends \PHPUnit\Framework\TestCase {
  function test_init_with_empty_string_as_valid_input() {
    new Url("");
    $this->assertTrue(true);
  }

  function test_init_with_slash_as_valid_input() {
    new Url("/");
    $this->assertTrue(true);
  }

  function test_init_with_search_params_as_valid_input() {
    new Url("?a=1");
    $this->assertTrue(true);
  }

  function test_init_with_space_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new Url("example route");
  }
}