<?php

namespace Core\Middleware;

class Auth 
{
    public function handle() 
    {
        $user = $_SESSION['user'] ?? false;

        if (! $user) {
            header('location: /');
            exit();
        }
    }
}