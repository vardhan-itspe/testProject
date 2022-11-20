<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\PdfToText\Pdf;

class SubmitController extends Controller
{
    public function index(Request $request)
    {
        // $excel = $request->file('uploadfile');
        $text = (new Pdf())
        ->setPdf($request->file('uploadfile'))
        ->setOptions(['layout', 'r 96'])
        ->addOptions(['f 1'])
        ->text();
        $myArray = preg_split('/[\n\r]/', $text);
        // $myArray1 = preg_split('/[\n\r]/', $myArray[1]);
        // dd($myArray);

        return Excel::download(new ReportsExport($myArray), 'reports.xlsx');
        // return view('posts/index');
    }
}