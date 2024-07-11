<?php namespace fusion\http;

interface IUrlPath{
  function get_url(): string;
  function set_url(string $url): void;
}