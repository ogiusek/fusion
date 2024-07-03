<?php namespace core\http;

enum Method: string {
  case GET = "GET";
  case POST = "POST";
  case PUT = "PUT";
  case PATCH = "PATCH";
  case DELETE = "DELETE";
}