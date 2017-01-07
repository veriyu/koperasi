<?php

namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use DB;

class MenuModel extends Model
{
	
	public static function getRows($param){
		
		$results = DB::table('menu')
					// ->orderby('poliklinik_kegiatan.GrupKelas', 'ASC')
					->paginate($param);

		return $results;
	}

	public static function getRow($KegiatanId){
		$result = DB::table('poliklinik_kegiatan')->where('KegiatanId',$KegiatanId)->first();

		return $result;
	}

	public static function getInsert($data){


		DB::table('module')->insert([
		  'NamaModule' 	=> $data['NamaModule'],
		  'Keterangan' 	=> $data['Keterangan'],			
  			]);

	}

	public static function getUpdate($data){

		DB::table('module')->where('Id',$data['ModuleId'])->update([
		  'NamaModule' 	=> $data['NamaModule'],
		  'Keterangan' 	=> $data['Keterangan'],	
			]);

	}

	public static function getDelete($Id){

		// DB::enableQueryLog();
		DB::table('module')->where('Id',$Id)->delete();
		// dd(DB::getQueryLog());

	}

}