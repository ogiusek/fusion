<?php namespace fusion\http;

interface ISearchParams {
  function get_search_params(): array;
  function get_search_param(string $key): ?string;
}