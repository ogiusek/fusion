<?php
// use core\http\{Req, Url, Body, Method, Headers};

// lib shouldn't do anything until running code below
require_once "lib/lib.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();

// $request = new Req(
//   url: new Url($_SERVER['REQUEST_URI']),
//   body: new Body(file_get_contents('php://input')),
//   method: Method::tryFrom($_SERVER['REQUEST_METHOD']),
//   headers: new Headers(getallheaders())
// );

