<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    public function fileImportExport()
        {
        return view('file-import');
        }

        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            return Excel::import(new UserImport, $request->file('file'));
        }
        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileExport()
        {
           return Excel::download(new UserExport(), 'users-collection.xlsx');
        }
}
