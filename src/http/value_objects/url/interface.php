<?php namespace fusion\http;

interface IReqUrl {
  function __construct(
    string $url = "/"
  );

  function path(): IUrlPath;
  function search_params(): ISearchParams;
};