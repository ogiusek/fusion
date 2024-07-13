<?php namespace fusion\router;
use fusion\http\IUrlPath;

/**
 * allows to use and extract variables from url.
 * 
 * variables starts with :
 * @param \fusion\http\IUrlPath $self_url with variables
 * @param \fusion\http\IUrlPath $compared_url
 * @return \fusion\http\IUrlPath returns $compared_url formated to become $self_url instruction
 */
function format_url_variables_to_match_instruction(IUrlPath $self_url, IUrlPath $compared_url): IUrlPath {
  static $variable_character = ":";
  $self_url_parts = explode("/", $self_url->get_url());
  $compared_url_parts = explode("/", $compared_url->get_url());
  
  $result_parts = array_map(function($instruction_part, $compared_part) use($variable_character) {
    if(substr($instruction_part, 0, 1) === $variable_character)
      return $instruction_part;
    return $compared_part;
  }, $self_url_parts, $compared_url_parts);

  $result = implode("/", $result_parts);
  $compared_url->set_url($result);

  return $compared_url;
}

function get_url_variables(IUrlPath $self_url, IUrlPath $compared_url) {
  $self_url_parts = explode("/", $self_url->get_url());
  $compared_url_parts = explode("/", $compared_url->get_url());

  $result_parts = array_map(function($instruction_part, $compared_part) {
    if(substr($instruction_part, 0, 1) === ":")
      return substr($instruction_part, 1);
    return $compared_part;
  }, $self_url_parts, $compared_url_parts);
  $result = implode("/", $result_parts);
  $compared_url->set_url($result);

  return $compared_url;
}