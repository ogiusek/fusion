# Fusion

![fusion logo](./readme/img/logo_bg.jpg)

## contents
- [why Fusion](#why-fusion)
- [example use](#example-use)
- [documentation](./readme/README.md)
- [how contribute](./readme/contribution.README.md)
- [Authors](#Authors)

## Why Fusion
Fusion is optimal, lightweight and easy to use framework for routing.
Fusion is focusing on dto for easy user input validation.
Fusion provides:
- router
- dto
- middleware
- reccomends principle `code should be its own documentation`
made by programmers for programmers.

## Example use
How add route ?

default way to add route
`src/my_file.php`
```php
<?php use core\{dto, routes, Method, Response, Content};
class myDto{
  #[dto\body("email")]
  #[dto\isEmail("`email` is not an email"), dto\notEmpty("missing `email` in body")]
  public string $email;
};

routes::add("/", Method::POST, function(myDto $dto){
  // perform calculations
  $json = json_encode(["messeage" => "success"]);
  return new Response($json, status: 200, type: Content::JSON);
});
```

reccomended way to add route
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
    // perform calculations
    $json = json_encode(["messeage" => "success"]);
    return new Response($json, status: 200, Content::JSON);
  }
};
```

for more examples go to [documentation](./readme/README.md)

## Authors
- [@ogius](https://www.github.com/ogiusek)
