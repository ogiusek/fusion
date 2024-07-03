# Middleware
## How add middleware
```php
<?php use core\{Routes, Method};
// remember to define myDto
Routes::add_middleware("/", methods: [Method::POST, Method::PATCH], action: function(myDto $request){
  // return response if you want to overwrite
});
```

## How test middleware
```php
<?php use core\{Routes, Method, Request};
// remember to define myDto
$my_request = new Request(...);
Routes::test_middleware("/", $my_request, function(mixed $response){
  return true; // if middleware works
});
```
