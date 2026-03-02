<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        return view('cart.index');
    }

    public function store(): View
    {
        return view('cart.success');
    }
}
