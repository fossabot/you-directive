# you-directive
Blade directive @you and @notYou.  Both act as if statements testing whether the current user is the passed user.

## Install

Via Composer

``` bash
$ composer require jgile/you-directive
```

## Usage

In any *.blade.php file.  @you and @notYou both accept either an App\User model or user id.

``` blade
$user_id = 1;

@you($user_id)  // if the current user has an id of 1
    // do something
@endyou
```

``` blade
$user_model = App\User::find(1);

// if current is not the passed user
@notYou($user_model)
    // do something
@endyou
```