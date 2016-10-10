<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application_layer;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
Use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function appImport()
    {
        Excel::load(input::file('appImport'),function ($reader){
            $reader->each(function ($sheet){
                Application_layer::firstOrCreate($sheet->toArray());
            });
        });
     return redirect()->route('app.index')->with('message','item has been added successfully');
    }
}
