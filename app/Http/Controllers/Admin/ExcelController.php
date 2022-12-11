<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportProduct;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function addExcell(){
        return view('admin.product.addExcel');
    }

    public function saveExcel(Request $request){
        Excel::import(new ImportProduct,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
}
