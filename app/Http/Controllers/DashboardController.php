<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Query sales graph
        $chart = $this->getChartData();

        // Query latest transaction
        // $transactions = Transaction::latest()->limit(10)->get();
        $transactions = Transaction::orderBy('trx_date', 'desc')->limit(10)->get();

        return view('admin.dashboard')
            ->with('months', $chart['months'])
            ->with('totals', $chart['totals'])
            ->with('transactions', $transactions);
    }

    private function getChartData()
    {
        $sql = "SELECT LEFT(MONTHNAME(trx_date), 3) month, count(*) total FROM transactions "
                . "WHERE YEAR(trx_date) = " . date('Y') . " "
                . "GROUP BY month "
                . "ORDER BY MONTH(trx_date)";

        $transactions = DB::select($sql);

        $months = [];
        $totals = [];

        foreach ($transactions as $transaction) {
            $months[] = $transaction->month;
            $totals[] = $transaction->total;
        }
        return [ 'months' => $months, 'totals' => $totals ];
    }
}
