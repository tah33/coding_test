<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function monthlyReport()
    {
        $payments = Payment::where('user_id',Auth::id())->select('amount','start_date','end_date','created_at', DB::raw('DATE_FORMAT(created_at , "%b") as month'))
            ->groupBy('month')->latest()->get();

        return view('report.monthly_report',compact('payments'));
    }
}
