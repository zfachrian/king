<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class PanelController extends Controller
{
    public function index(Request $request){

        // $title  =   'Dashboard';
        // $crud   =   '';
        // $path   = explode("/",$request->path());
        return view("back.page.dashboard");
    }
}
