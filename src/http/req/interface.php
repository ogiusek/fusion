<?php namespace fusion\http;

interface IReq {
  function __construct(
    Url $url = new Url(),
    Body $body = new Body(),
    Method $method = Method::GET,
    Headers $headers = new Headers(),
  );

  function url(): Url;
  function body(): Body;
  function method(): Method;
  function headers(): Headers;
};