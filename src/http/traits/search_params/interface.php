<?php namespace fusion\http\traits;

interface ISearchParams {
  function get_search_params(): array;
  function get_search_param(string $key): ?string;
}