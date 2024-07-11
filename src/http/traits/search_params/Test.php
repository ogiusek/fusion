<?php namespace fusion\http\traits;

class SearchParamsTested implements ISearchParams {
  use SearchParams;

  function __construct(string $url){
    $this->initSearchParams($url);
  }
}

class SearchParamsTest extends \PHPUnit\Framework\TestCase{
  
  function test_init_with_empty_string_as_valid_input() {
    new SearchParamsTested("");
    $this->assertTrue(true);
  }

  function test_init_with_valid_input() {
    new SearchParamsTested("a=1&b=2");
    $this->assertTrue(true);
  }

  function test_init_with_slash_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new SearchParamsTested("/");
  }

  function test_init_with_question_mark_as_invalid_input() {
    $this->expectException(\InvalidArgumentException::class);
    new SearchParamsTested("?");
  }

  function test_get_search_params() {
    $instance = new SearchParamsTested("a=1&b=2");
    $this->assertEquals($instance->get_search_params(), ["a"=>1, "b"=>2]);
  }

  function test_get_search_param_with_existing_param() {
    $instance = new SearchParamsTested("a=1&b=2");
    $this->assertEquals($instance->get_search_param("a"), "1");
  }

  function test_get_search_param_with_non_existing_param() {
    $instance = new SearchParamsTested("a=1&b=2");
    $this->assertEquals($instance->get_search_param("c"), null);
  }
}