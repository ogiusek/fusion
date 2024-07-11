<?php namespace fusion\http;

interface IReqUrl extends traits\IUrl, traits\ISearchParams{
  function __construct(
    string $url = "/"
  );
};