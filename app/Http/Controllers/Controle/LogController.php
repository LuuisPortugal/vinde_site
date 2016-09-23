<?php

namespace App\Http\Controllers\Controle;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class LogController extends Controller
{
    public function index()
    {
        $logs = DB::table('logs')->paginate(50);
        return view('controle.log.index', compact('logs'));
    }
}
