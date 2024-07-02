# Fusion
![fusion logo](./readme/img/logo_bg.jpg)

## Contents
- [What is fusion](#what-is-fusion)
- [example use](#example-use)
- [documentation](./readme/README.md)
- [how contribute](./readme/contribution/README.md)
- [Authors](#authors)

## What is fusion
Fusion is an idea for framework. Not yet implemented!.

Fusion is optimal, lightweight and easy to use framework for routing.
Fusion is focusing on dto for easy user input validation.
Fusion provides:
- router
- dto
- middleware
- follows principle `code should be its own documentation`
made by programmers for programmers.

## Examples
### Dto
```php
<?php use core\{dto_provider, dto_validator};
class myDto{
  #[dto_provider\body("email")] // provider
  #[dto_validator\not_empty, dto_validator\email] // validators
  public string $email;
};
```
### Controller
```php
<?php use core\{Routes, Response, Content, Method};
// Remember to define dto
Routes::add("/", Method::POST, function(myDto $dto){
  $json = json_encode(["messeage" => "success"]);
  // perform something
  return new Response($json, status: 200, type: Content::JSON);
});
```
For deep explanation and more software go to [documentation](./readme/README.md)
## Authors
- [@ogius](https://www.github.com/ogiusek)
