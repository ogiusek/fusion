# Routing
## Simple route
### Route
`src/my_file.php`
```php
<?php use fusion\{Routes, Response, Method, Content};
// remember to define dto
Routes::add("/", Method::POST, function(myDto $dto){
  $json = json_encode(["messeage" => "success"]);
  // perform something with dto
  return new Response($json, status: 200, type: Content::JSON);
});
```
### Test
```php
<?php use fusion\{Method, Routes, Request};
$request
$response = Routes::request(new Request(...)); // change way to pass request content
Routes::test("/", Method::POST, ["email" => "myEmail@gmail.com"], function($response){
  // test
  $works = true;
  return $works;
});
```

### File structured route
This is idea for now.\
We're looking for ideas.\
To help choose i redirect to [ideas page](./ideas.README.md)
#### Example route
`src/routes/POST.php`
```php
<?php use fusion\{dto_provider, dto_validator, Response, Content, Controller};
// Define dto
class myDto{
  #[dto_provider\body("email")] // provider
  #[dto_validator\not_empty, dto_validator\email] // validators
  public string $email;
};

// Define controller action
return new class extends Controller {
  public function run(myDto $dto){
    $json = json_encode(["messeage" => "success"]);
    // perform calculations
    return new Response($json, status: 200, Content::JSON);
  }
};
```
