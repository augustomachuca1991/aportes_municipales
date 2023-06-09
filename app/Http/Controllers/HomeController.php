<?php

namespace App\Http\Controllers;

use App\Exports\FileExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function export(Request $request)
    {
        $data = $request;
        return Excel::download(new FileExport($data), 'users.xlsx');
    }


}
