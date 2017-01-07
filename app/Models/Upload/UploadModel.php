<?php

namespace App\Models\Upload;
use Illuminate\Database\Eloquent\Model;
use DB;

class UploadModel extends Model
{

	public static function insertData($data,$table){
		
		DB::table($table)->insert([
			"KegiatanId"		=> $data[0],
			"NamaKegiatan"		=> $data[1],
			"PasienId"			=> $data[2],
			"Tanggal"			=> $data[3],
			"Keterangan"		=> $data[4],
		]);
	}


	public static function insertDataExcelStorage($data,$table){
		// dd($data);
		DB::table($table)->insert([
			"PalletId"			=> $data[1],
			"ItemId"			=> $data[2],
			"NamaBarang"		=> $data[3],
		]);
	}

	public static function updateDataExcelStorage($data,$table){
		// dd($data);
		DB::table($table)->where('ItemId',$data[2])->update([
			"PalletId"			=> $data[1],
		]);
	}

	public static function tableName(){
		$tables = DB::select('SHOW TABLES');
			
		return $tables;

	}
}