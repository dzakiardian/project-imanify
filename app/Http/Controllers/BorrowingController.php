<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        return view('dashboard.borrowing.index', [
            'page_title' => 'Borrowing',
            'active' => 'borrowing',
            'url' => 'dashboard/borrowing',
        ]);
    }
}
