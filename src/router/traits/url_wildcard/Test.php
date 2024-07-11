<?php namespace fusion\router\traits;
use fusion\http\traits\IUrl;

class UrlWildcardTested {
  use UrlWildcard;

  static function test(IUrl $self_url, IUrl $compared_url) {
    return self::format_url_wildcards_to_match_instruction($self_url, $compared_url);
  }
};

class UrlWildcardTest extends \PHPUnit\Framework\TestCase {
  function test_without_wildcard() {
    $self_url = new \fusion\http\Url("example-route");
    $compared_url = new \fusion\http\Url("example-route");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_to_many_wildcards() {
    $self_url = new \fusion\http\Url("*/*");
    $compared_url = new \fusion\http\Url("example-route");
    $this->expectException(\InvalidArgumentException::class);
    UrlWildcardTested::test($self_url, $compared_url);
  }

  function test_with_empty_string_corresponding_to_wildcard_on_the_end() {
    $self_url = new \fusion\http\Url("*");
    $compared_url = new \fusion\http\Url("");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_one_section_corresponding_to_wildcard_on_the_end() {
    $self_url = new \fusion\http\Url("*");
    $compared_url = new \fusion\http\Url("one");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_two_sections_corresponding_to_wildcard_on_the_end() {
    $self_url = new \fusion\http\Url("*");
    $compared_url = new \fusion\http\Url("one/two");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_empty_string_corresponding_to_wildcard_inside_url(){
    $self_url = new \fusion\http\Url("a/*/b");
    $compared_url = new \fusion\http\Url("a/b");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_one_section_corresponding_to_wildcard_inside_url(){
    $self_url = new \fusion\http\Url("a/*/b");
    $compared_url = new \fusion\http\Url("a/one/b");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_two_sections_corresponding_to_wildcard_inside_url(){
    $self_url = new \fusion\http\Url("a/*/b");
    $compared_url = new \fusion\http\Url("a/one/two/b");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertEquals($self_url, $result);
  }

  function test_with_empty_string_corresponding_to_wildcard_and_wrong_section(){
    $self_url = new \fusion\http\Url("account/:id/*");
    $compared_url = new \fusion\http\Url("account/1");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $expected_result = new \fusion\http\Url("account/1/*");
    $this->assertEquals($expected_result, $result);
  }

  function test_with_empty_string_corresponding_to_wildcard_inside_url_and_wrong_section(){
    $self_url = new \fusion\http\Url("account/*/:id");
    $compared_url = new \fusion\http\Url("account/1");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $expected_result = new \fusion\http\Url("account/*/1");
    $this->assertEquals($expected_result, $result);
  }

  function test_with_one_section_corresponding_to_wildcard_inside_url_and_wrong_section(){
    $self_url = new \fusion\http\Url("account/*/:id");
    $compared_url = new \fusion\http\Url("account/a/1");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $expected_result = new \fusion\http\Url("account/*/1");
    $this->assertEquals($expected_result, $result);
  }

  function test_with_to_few_sections(){
    $self_url = new \fusion\http\Url("account/*");
    $compared_url = new \fusion\http\Url("");
    $result = UrlWildcardTested::test($self_url, $compared_url);
    $this->assertNotEquals($self_url, $result);
  }
}