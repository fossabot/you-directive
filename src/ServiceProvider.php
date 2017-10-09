<?php

namespace Jgile\YouDirective;

use App\User;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class PackageServiceProvider
 *
 * @package Jgile\YouDirective
 * @see http://laravel.com/docs/master/packages#service-providers
 * @see http://laravel.com/docs/master/providers
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Application is booting
     *
     * @see http://laravel.com/docs/master/providers#the-boot-method
     * @return void
     */
    public function boot()
    {
        \Blade::if('you', function($user) {
            if(is_a($user, User::class)){
                $user_id = $user->id;
                $current_id = auth()->user()->id;
                return "$current_id" === "$user_id";
            } else {
                $current_id = auth()->user()->id;
                return is_array($user) ? in_array("$current_id", $user) : "$user" === "$current_id";
            }
        });

        \Blade::if('notYou', function($user) {
            if(is_a($user, User::class)){
                $user_id = $user->id;
                $current_id = auth()->user()->id;
                return "$current_id" !== "$user_id";
            } else {
                $current_id = auth()->user()->id;
                return is_array($user) ? !in_array("$current_id", $user) : "$user" !== "$current_id";
            }
        });
    }
}
