<?php namespace core\http;

enum Status: int {
  case OK = 200;
  case CREATED = 201;
  case ACCEPTED = 202;
  case NO_CONTENT = 204;

  case NOT_MODIFIED = 304;

  case BAD_REQUEST = 400;
  case UNAUTHORIZED = 401;
  case FORBIDDEN = 403;
  case NOT_FOUND = 404;
  case METHOD_NOT_ALLOWED = 405;
  case NOT_ACCEPTABLE = 406;
  
  case INTERNAL_SERVER_ERROR = 500;
  case BAD_GATEWAY = 502;
}