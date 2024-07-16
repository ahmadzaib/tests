<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  public function create ($request){
    $data = $request->all();
    $data['id'] = 1;
    $data['name'] = 'dale';

    DB::table('users')->insert($data);
  }
}
