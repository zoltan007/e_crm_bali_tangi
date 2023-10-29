<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ReportsController extends Controller
{
    public function customerReports(){
        Session::put('page','customer_reports');

        return view('admin.reports.customer_reports');
    }

    public function transactionReports(){
        Session::put('page','transaction_reports');

        return view('admin.reports.transaction_reports');
    }

}
