<?php namespace fusion\router\functions;
use fusion\http\IUrlPath;
use fusion\http\UrlPath;

class UrlWildcardTest extends \PHPUnit\Framework\TestCase {
  function initialize_with(string $path) {
    return new UrlPath($path);
  }

  function run_test_with(IUrlPath $self_url, IUrlPath $compared_url): IUrlPath {
    return format_url_wildcards_to_match_instruction($self_url, $compared_url);
  }

  function test_without_wildcard() {
    $self_url = $this->initialize_with("example-route");
    $compared_url = $this->initialize_with("example-route");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_to_many_wildcards() {
    $self_url = $this->initialize_with("*/*");
    $compared_url = $this->initialize_with("example-route");
    $this->expectException(\InvalidArgumentException::class);
    $this->run_test_with($self_url, $compared_url);
  }

  function test_with_empty_string_corresponding_to_wildcard_on_the_end() {
    $self_url = $this->initialize_with("*");
    $compared_url = $this->initialize_with("");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_one_section_corresponding_to_wildcard_on_the_end() {
    $self_url = $this->initialize_with("*");
    $compared_url = $this->initialize_with("one");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_two_sections_corresponding_to_wildcard_on_the_end() {
    $self_url = $this->initialize_with("*");
    $compared_url = $this->initialize_with("one/two");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_empty_string_corresponding_to_wildcard_inside_url(){
    $self_url = $this->initialize_with("a/*/b");
    $compared_url = $this->initialize_with("a/b");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_one_section_corresponding_to_wildcard_inside_url(){
    $self_url = $this->initialize_with("a/*/b");
    $compared_url = $this->initialize_with("a/one/b");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_two_sections_corresponding_to_wildcard_inside_url(){
    $self_url = $this->initialize_with("a/*/b");
    $compared_url = $this->initialize_with("a/one/two/b");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_empty_string_corresponding_to_wildcard_and_wrong_section(){
    $self_url = $this->initialize_with("account/:id/*");
    $compared_url = $this->initialize_with("account/1");
    $result = $this->run_test_with($self_url, $compared_url);
    $expected_result = $this->initialize_with("account/1/*");
    $this->assertEquals($expected_result, $result);
  }

  function test_with_empty_string_corresponding_to_wildcard_inside_url_and_wrong_section(){
    $self_url = $this->initialize_with("account/*/:id");
    $compared_url = $this->initialize_with("account/1");
    $result = $this->run_test_with($self_url, $compared_url);
    $expected_result = $this->initialize_with("account/*/1");
    $this->assertEquals($expected_result, $result);
  }

  function test_with_one_section_corresponding_to_wildcard_inside_url_and_wrong_section(){
    $self_url = $this->initialize_with("account/*/:id");
    $compared_url = $this->initialize_with("account/a/1");
    $result = $this->run_test_with($self_url, $compared_url);
    $expected_result = $this->initialize_with("account/*/1");
    $this->assertEquals($expected_result, $result);
  }

  function test_with_to_few_sections(){
    $self_url = $this->initialize_with("account/*");
    $compared_url = $this->initialize_with("");
    $result = $this->run_test_with($self_url, $compared_url);
    $this->assertNotEquals($self_url, $result);
  }
}