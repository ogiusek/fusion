<?php namespace fusion\http;

interface IUrl {
  public function __construct(
    string $url = "/"
  );
  public function get_url(): string;  
  public function get_path(): string;
  /**
   * @return array<string, string>
   */
  public function get_search_params(): array;
  public function get_search_param(string $key): ?string;

  /**
   * checks if $url matches $this->url where $this->url defines variables
   * @param \fusion\http\Url $url
   * @return bool
   */
  public function matches(Url $url): bool;

  /**
   * returns variables where $this->url defines keys in associative array and $url variables
   * @param \fusion\http\Url $url
   * @return array
   */
  public function get_vars(Url $url): array;
  public function get_var(Url $url, string $key): ?string;
}