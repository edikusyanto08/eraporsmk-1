<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
class NilaiImport implements ToCollection, WithStartRow, WithCalculatedFormulas
{
    public $sheetData;
	public function __construct(){
		$this->sheetData = [];
    }
	public function collection(Collection $collection)
    {
		foreach($collection as $row){
			unset($row[0], $row[1], $row[2]);
			$nilai = (array) json_decode($row);
			$record['nilai'] = array_values($nilai);
			$record['rerata'] = number_format( array_sum($nilai) / count($nilai), 0);
			$result[] = $record;
			//print_r($nilai);
			//$set_array[] = $row;
		}
    	$this->sheetData[] = $result;
    }
    public function startRow(): int 
	{
		return 9; 
	}
}
