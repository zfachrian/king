<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  =   'Dashboard';
        // $crud   =   '';
        // $avatar = $request->has('page') ? $request->get('page') : '2';
        // $path   = explode("/",$request->path());
        return view('back.dashboard', compact('title'));
    }
}
