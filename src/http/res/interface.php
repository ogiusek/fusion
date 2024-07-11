<?php namespace fusion\http;

interface IRes {
  function run(): void; 

  function __construct(
    Body $body = new Body(),
    Headers $headers = new Headers(),
    Status $status = Status::OK,
  );
}