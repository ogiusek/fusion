<?php namespace fusion\http;
require_once __DIR__."/interface.php";

/**
 * this url is used for requests
 */
class Url implements IReqUrl {
  use traits\UrlPath, traits\SearchParams;

  function __construct(
    string $url = "/"
  ) {
    $split_character = "?";
    $parts = explode($split_character, $url, 2);
    [$url, $search_params] = [$parts[0], $parts[1] ?? ""];
    $this->set_url($url);
    $this->set_search_params($search_params);
  }
}
