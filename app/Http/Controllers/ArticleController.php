<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function displayAll(){
      return 'displayAll';
    }
    public function display(){
    return 'display';
    }
    public function post(){
    return 'post';
    }
    public function destroy(){
    return 'destroy';
    }
}
