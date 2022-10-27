<?php

namespace App\Http\Controllers;

use App\Imports\TransactionsImport;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index')->with('transactions', $transactions);
    }

    public function create()
    {
        return view('admin.transaction.create');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import' => ['required', 'mimes:xlsx,xls']
        ]);

        Excel::import(new TransactionsImport, $request->file('import'));

        // set flash message
        session()->flash('success', 'Transaction imported successfully');
        
        return redirect('admin/transaction');
    }
}
