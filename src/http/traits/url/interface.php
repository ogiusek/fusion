<?php namespace fusion\http\traits;

interface IUrl{
  function get_url(): string;
  function set_url(string $url): void;
}