<?php namespace fusion\http;

class SearchParamsTest extends \PHPUnit\Framework\TestCase{
  
  function test_init_with_empty_string_as_valid_input() {
    new SearchParams("");
    $this->assertTrue(true);
  }

  function test_init_with_valid_input() {
    new SearchParams("a=1&b=2");
    $this->assertTrue(true);
  }

  function test_init_with_slash_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new SearchParams("/");
  }

  function test_init_with_question_mark_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new SearchParams("?");
  }

  function test_get_search_params() {
    $instance = new SearchParams("a=1&b=2");
    $this->assertEquals($instance->get_search_params(), ["a"=>1, "b"=>2]);
  }

  function test_get_search_param_with_existing_param() {
    $instance = new SearchParams("a=1&b=2");
    $this->assertEquals($instance->get_search_param("a"), "1");
  }

  function test_get_search_param_with_non_existing_param() {
    $instance = new SearchParams("a=1&b=2");
    $this->assertEquals($instance->get_search_param("c"), null);
  }
}