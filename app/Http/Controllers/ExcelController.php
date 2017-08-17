<?php

namespace App\Http\Controllers;

use App\Develop_language;
use App\Devlopment_group;
use App\Involved;
use App\Type_collection;
use App\Type_process;
use App\Use_data;
use Illuminate\Http\Request;
use App\Application_layer;
use App\Technology_layer;
use App\Dat_layer;
use App\Business_layer;
use App\Department;
use App\Brand;
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

    public function deImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Department::firstOrCreate($sheet->toArray());
            });
        });
     return redirect()->route('de.index')->with('message','item has been added successfully');
    }
    public function brandImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Brand::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('brand.index')->with('message','item has been added successfully');
    }
    public function collImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Type_collection::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('coll.index')->with('message','item has been added successfully');
    }
    public function involImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Involved::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('invol.index')->with('message','item has been added successfully');
    }
    public function langImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Develop_language::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('lang.index')->with('message','item has been added successfully');
    }
    public function placeImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Place::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('place.index')->with('message','item has been added successfully');
    }
    public function procImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Type_process::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('proc.index')->with('message','item has been added successfully');
    }
    public function devgImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Devlopment_group::firstOrCreate($sheet->toArray());
            });
        });
        return redirect()->route('proc.index')->with('message','item has been added successfully');
    }
    public function udImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                Use_data::firstOrCreate($sheet->toArray());
            });
        });

        return redirect()->route('ud.index')->with('message','item has been added successfully');
    }
}
