<?php

namespace App\Http\Controllers;

use App\Book;
use App\Disease;
use App\PatientDisease;
use App\Season;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $total_books = Book::all()->count();
        $total_users = User::all()->count();
        return view('admin.dashboard',compact('total_books','total_users'));
    }
}
