<?php

namespace App\Models\Upload;
use Illuminate\Database\Eloquent\Model;
use DB;

class UploadModel extends Model
{

	public static function tableName(){
		$tables = DB::select('SHOW TABLES');
			
		return $tables;

	}

	public static function insertDataExcel($records,$table_name){

		$table_columns = DB::getSchemaBuilder()->getColumnListing($table_name);

		$data_insert = array();
		$i=0;
		foreach ($table_columns as $column) {

			$data_insert[$column] = $records[$i];

			$i++;
		}
		
		DB::table($table_name)->insert($data_insert);
		
	}
}