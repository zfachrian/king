<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){

        $title  =   'Dashboard';
        // $crud   =   '';
        // $avatar = $request->has('page') ? $request->get('page') : '2';
        // $path   = explode("/",$request->path());
        return view('back.dashboard', compact('title'));
    }
}
