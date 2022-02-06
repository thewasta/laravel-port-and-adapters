<?php

namespace Admin\Entrypoint\Http\User;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view("login");
    }
}
