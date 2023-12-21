<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexCategory(){
        return view('admin.category-create');
    }
}
