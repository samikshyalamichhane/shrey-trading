<?php

namespace App\Imports;

use App\Models\OrderList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderListImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OrderList([
            'name'     => $row['name'],
            'quantity'    => $row['quantity'], 
        ]);
    }
}
