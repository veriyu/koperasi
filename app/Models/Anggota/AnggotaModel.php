<?php

namespace App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use DB;

class AnggotaModel extends Model
{

	public static function getRows($param){
		
		$results = DB::table('anggota')->paginate($param);

		return $results;
	}

	public static function getRow($id){
		$result = DB::table('anggota')->where('id_anggota',$id)->first();
		
		return $result;
	}

	public static function getInsert($data){

		DB::table('anggota')->insert([
			'no_anggota'	=> $data['NoAnggota'],
			'nama_anggota'	=> $data['NamaAnggota'],
			'no_telpon'		=> $data['NoTelpon'],
			'alamat'		=> $data['Alamat'],
			'created_at'	=> date('Y-m-d'),
			// 'created_by'
			]);

	}

	public static function getUpdate($data){

		DB::table('anggota')->where('id_anggota',$data['IdAnggota'])->update([
			'no_anggota'	=> $data['NoAnggota'],
			'nama_anggota'	=> $data['NamaAnggota'],
			'no_telpon'		=> $data['NoTelpon'],
			'alamat'		=> $data['Alamat'],
			// 'created_at'
			// 'created_by'
			]);

	}

	public static function getDelete($id){
		DB::table('anggota')->delete($id);
	}

}