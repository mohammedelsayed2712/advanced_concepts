<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return view('welcome');

        // dd($request->route());
        // dd($request->route()->getName());
        // dd($request->route()->getParameters());
        // dd($request->route()->getAction());
        // dd($request->route()->getController());
        // dd(Route::current());
        // dd(Route::current()->getName());
        // dd(Route::currentRouteAction());
        return view('welcome');
    }
}
