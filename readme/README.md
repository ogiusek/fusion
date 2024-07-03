# Fusion contents
- [dto](./dto/README.md)
- [routing](./controller/README.md)
- [middleware](./middleware/README.md)


























## this section will soon get removed. available to watch

default way to add route
`src/my_file.php`
```php
<?php use core\{dto, Routes, Method, Response, Content};
class myDto{
  #[dto\body("email")]
  #[dto\email, dto\not_empty]
  public string $email;
};

Routes::add("/", Method::POST, function(myDto $dto){
  $json = json_encode(["messeage" => "success"]);
  // perform something with dto
  return new Response($json, status: 200, type: Content::JSON);
});

$response = Routes::request("/", Method::POST, ["email" => "myEmail@gmail.com"]); // this is idea how use controller later (to remove)
Routes::test("/", Method::POST, ["email" => "myEmail@gmail.com"], function($response){
  $works = true;
  // test
  return $works;
});

use core\Request;
Routes::add_middleware("/", methods: [Method::POST, Method::PATCH], action: function(myDto $request){
  // return response if you want to overwrite
});
Routes::test_middleware("/", methods: [Method::POST, Method::PATCH]);
```

advanced and reccomended way to add route
`src/routes/post.php`
```php
<?php use core\{dto, Response, Content, Controller};
class myDto{
  #[dto\body("email")]
  #[dto\isEmail, dto\notEmpty]
  public string $email;
};

return new class extends Controller {
  public function run(myDto $dto){
    // perform something with dto
    $json = json_encode(["messeage" => "success"]);
    return new Response($json, status: 200, Content::JSON);
  }
};
```

## under the hood.
consider changing name. this is for adding controllers librarys like from files.
```php
<?php
core\Routes::add_provider(function (Request $request){
  // if provider has controller for request 
  return new core\Response(...);
  // else
  // do not return enything
});
```