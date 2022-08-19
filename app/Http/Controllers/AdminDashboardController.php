<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;

class AdminDashboardController extends Controller
{
    public function index(){

        $users = User::all()->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $slides = Slide::all()->count();

        return view('dashboard.admin.index', compact('users','categories','products', 'slides'));
    }
}
