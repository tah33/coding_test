<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function monthlyReport()
    {
        $payments = Payment::with('user:email')->where('user_id',Auth::id())->get();

        return view('report.monthly_report');
    }
}
