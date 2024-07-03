# Dto
## Contents
- [about dto](#about-dto)
- [dto providers](#dto-providers)
- [dto validators](#dto-validators)
- [examples](#examples)

## About dto
### What dto does ?
- lists and turns data used by controller into object.
- validates data used by controller before controller get called.

### When use dto ?
dto should be used in every controller and middleware.

## Dto providers
dto provider initializes variable.
- `body` uses request body\
  takes 0 arguments to return whole body.\
  takes 1 argument to return value from json.
- `param` uses url variables\
  takes 0 arguments to return array of params.\
  takes 1 argument to return one url param.
- `query` uses url search params\
  takes 0 arguments to return array of params.\
  takes 1 argument to return one url search param.
- `header` uses request headers\
  takes 0 arguments to return array of headers.\
  takes 1 argument to return one header.

## Dto validators
dto validator validates variable and throws error if request do not meet expectation.
universal validators:
- `not_empty`
- `matches` takes regex as argument
- `condition` takes function(`argument`: string) as argument

unique validators:
- `email`
- `url`
- `uuid`

string validators:
- `string`
- `min_string_size` takes int as argument
- `max_string_ize` takes int as argument
- `string_size`takes 2 arguments (`min_size`, `max_size`) where both are integers

number validators:
- `int`
- `float`
- `min` takes int as argument
- `max` takes int as argument
- `positive`
- `negative`

date validators:
- `date`
- `min_date` takes date as argument
- `max_date` takes date as argument
- `date_frame` takes 2 arguments (`min_date`, `max_date`) where both are dates

array validators:
- `array`
- `min_array_size` takes int as argument
- `max_array_size` takes int as argument
- `unique_array_elements`

object validators:
- `object`
- `object_fits` takes class which uses dto validators as argument

## Examples

`src/routes/GET.php`
```php
<?php use core\{dto_provider, dto_validator};
class myDto{
  #[dto_provider\body("email")] // provider
  #[dto_validator\email, dto_validator\not_empty] // validators
  public string $email;
};
```