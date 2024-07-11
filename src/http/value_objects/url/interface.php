<?php namespace fusion\http;

interface IReqUrl extends traits\IUrlPath, traits\ISearchParams{
  function __construct(
    string $url = "/"
  );
};