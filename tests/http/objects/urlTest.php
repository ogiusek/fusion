<?php namespace fusion\http;

class UrlTest extends \PHPUnit\Framework\TestCase {
  public function test_init() {
    $url = new Url("/test?a=1");
    $this->assertTrue(true);
  }

  public function test_init_without_slash() {
    $url = new Url("test?a=1");
    $this->assertTrue(true);
  }

  public function test_init_error_throws() {
    $this->expectException(\Exception::class);
    $url = new Url("test ?a=1");
  }

  public function test_get_url() {
    $url_string = "/test?a=1";
    $url = new Url($url_string);
    $this->assertEquals($url->get_url(), $url_string);
  }

  public function test_get_path() {
    $url = new Url("/test/?a=1");
    $this->assertEquals($url->get_path(), "/test");
  }

  public function test_get_search_params() {
    $url = new Url("/test?a=1");
    $this->assertEquals($url->get_search_params(), ["a" => "1"]);
  }

  public function test_get_search_param() {
    $url = new Url("/test?a=1");
    $this->assertEquals($url->get_search_param("a"), "1");
  }

  public function test_matches() {
    $url = new Url("/account/:id");
    $this->assertTrue($url->matches(new Url("/account/1?a=2")));
  }

  public function test_matches_with_wrong_input(){
    $url = new Url("/account/:id");
    $this->assertFalse($url->matches(new Url("/1/account?a=2")));
  }

  public function test_get_vars() {
    $url = new Url("/account/:id");
    $passed_url = new Url("/account/1?a=2");
    $this->assertEquals($url->get_vars($passed_url), ["id" => "1"]);
  }

  public function test_get_vars_error_throws() {
    $url = new Url("/account/:id");
    $passed_url = new Url("/account/1/a?a=2");
    $this->expectException(\Exception::class);
    $url->get_vars($passed_url);
  }

  public function test_get_var() {
    $url = new Url("/account/:id");
    $this->assertEquals($url->get_var(new Url("/account/1?a=2"), "id"), "1");
  }
}