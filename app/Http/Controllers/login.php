<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    //
    public $user;

    public function setName($name) {
        $this->user = name;
    }

    public function doLogin() {
        echo $this->user;
    }
}
