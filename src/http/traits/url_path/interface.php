<?php namespace fusion\http\traits;

interface IUrlPath{
  function get_url(): string;
  function set_url(string $url): void;
}