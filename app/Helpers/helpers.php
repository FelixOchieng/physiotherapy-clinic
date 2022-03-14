<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('getUserInitials')) {
    function getUserInitials()
    {
        $names = explode(" ", Auth::user()->name);
        $initials = "";

        foreach ($names as $name) {
            $initials .= strtoupper($name[0]);
        }

        return $initials;
    }
}

if (!function_exists('getUserHomeRoute')) {
    function getUserHomeRoute()
    {
        if (Auth::check()) {
            return Auth::user()->hasRole('admin') ? route('admin.home') :  route('user.home');
        } else {
            return route('site-root');
        }
    }
}
