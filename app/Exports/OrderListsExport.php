<?php

namespace App\Exports;

use App\Models\OrderList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderListsExport implements FromCollection, WithHeadings
{
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function headings(): array
    {
        return [
            '#ID',
            '',
            'ProductId',
            'Quantity',
            'Amount',
            '',
            'OrderId',
            'TrackNo',
            'CreatedAt',

        ];
    }

    public function collection()
    {
        return OrderList::where('order_id',$this->id)->get();
    }
}
