<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport  implements FromCollection
{

    protected $myArray;

    public function __construct($myArray) {

        $this->myArray = $myArray;
    }

	public function collection() {
        $myCollection = collect($this->myArray);
        return $myCollection;
	}
}
