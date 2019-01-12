<?php

    namespace App\Http\Controllers;

    use App\Order;

    class FinanceController extends Controller
    {
        //
        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('role:ROLE_FINANCE');
        }

        public function index()
        {
            return view('finance.finance');
        }

        public function leave()
        {
            $startdate = date_create(date('Y-m-d', time()));
            $existing = leave::where('employeeid', Auth::user()->id)
                ->where('year', (int)$startdate->format('Y'))
                ->where('status', '!=', 'Pending')
                ->where('status', '!=', 'Rejected')
                ->get()
                ->sum('days');
            $leave = (object)['all' => 21, 'used' => $existing, 'remaining' => 21 - $existing];
            return view('agronomist.leave', ['leave' => $leave]);
        }

        public function orders()
        {
            return view(
                'admin.listOrders',
                ['orders' => Order::all()->unique('orderNo')]
            );
        }
    }
