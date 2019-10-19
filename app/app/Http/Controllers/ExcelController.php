<?php

namespace App\Http\Controllers;

use Excel;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class ExcelController extends Controller
{
    public function export()
    {
        $export = User::select('id', 'name', 'email', 'password')->get();
        Excel::create('export data', function ($excel) use ($export) {
            $excel->sheet('Sheet 1', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xlsx');
    }
}
