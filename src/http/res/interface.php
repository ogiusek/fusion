<?php namespace fusion\http;

interface IRes {
  public function run(): void; 

  public function __construct(
    Body $body = new Body(),
    Headers $headers = new Headers(),
    Status $status = Status::OK,
  );
}