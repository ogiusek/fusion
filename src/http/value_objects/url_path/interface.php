<?php namespace fusion\http;

interface IUrlPath{
  function __construct(
    string $url = "/"
  );

  function get_url(): string;
  function set_url(string $url): void;
}