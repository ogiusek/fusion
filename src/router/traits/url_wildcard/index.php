<?php namespace fusion\router\traits;
use fusion\http\traits\IUrl;

trait UrlWildcard {
  /**
   * allows to use one wildcard to match any part of url
   * @param \fusion\http\traits\IUrl $self_url
   * @param \fusion\http\traits\IUrl $compared_url
   * @return \fusion\http\traits\IUrl returns $compared_url formated to match $self_url instruction
   */
  private static function format_url_wildcards_to_match_instruction(IUrl $self_url, IUrl $compared_url): IUrl {
    $stars_amount = substr_count($self_url->get_url(), "/*");
    switch($stars_amount) { // validate amount of wildcards
      case 1: break;
      case 0: return $compared_url;
      default: throw new \InvalidArgumentException("Only one wildcard is allowed");
    }
    $self_url_parts = explode("/", $self_url->get_url());
    $compared_url_parts = explode("/", $compared_url->get_url());
    $star_pos = array_search("*", $self_url_parts);

    // remove compared url parts corresponding to * 
    while(count($self_url_parts) <= count($compared_url_parts))
      array_splice($compared_url_parts, $star_pos, 1);
    
    // add * in compared url
    array_splice($compared_url_parts, $star_pos, 0, "*");

    // set and return changed url
    $compared_url->set_url(implode("/", $compared_url_parts));
    return $compared_url;
  }
}
