<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeLineController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function index() {
        return 'okay';
    }
}
