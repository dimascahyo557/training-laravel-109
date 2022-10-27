<?php

namespace App\Imports;

use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new Transaction([
           'product_id' => $row['product_id'],
           'trx_date' => $row['date'],
           'price' => $row['price']
        ]);
    }
}
