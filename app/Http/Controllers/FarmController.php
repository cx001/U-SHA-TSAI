<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farm;

use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class FarmController extends Controller
{ protected $farms;
 public function __construct()
 {
     $this->middleware('auth');
 }


 public function index(Request $request)
 {
    

     $farms = Farm::where('user_id', $request->user()->id)->get();

     return view('farms.index', [
         'farms' => $farms,
     ]);
 }

 public function store(Request $request)
 {
     $this->validate($request, [
         'name' => 'required|max:255',
     ]);

     $request->user()->farms()->create([
        
         'lati' => $request->lati,
         'lngi' => $request->lngi,
         'lightness' => $request->lightness, 'name' => $request->name,
     ]);

     return redirect('/farms');
 }
}
