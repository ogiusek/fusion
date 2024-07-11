<?php namespace fusion\http;
require_once __DIR__."/interface.php";

/**
 * this url is used for requests
 */
class Url implements IReqUrl {
  // use traits\UrlPath, traits\SearchParams;
  private IUrlPath $path;
  private ISearchParams $search_params;

  function __construct(
    string $url = "/"
  ) {
    $split_character = "?";
    $parts = explode($split_character, $url, 2);
    [$this->path, $this->search_params] = [new UrlPath($parts[0]), new SearchParams($parts[1] ?? "")];
  }

  function path(): IUrlPath { return $this->path; }
  function search_params(): ISearchParams { return $this->search_params; }
}
