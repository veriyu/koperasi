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

	public static function searchAnggota($params){
		
		if(!empty($params['NoAnggota'])){
			$queryWhereNoAnggota = "AND no_anggota = '{$params['NoAnggota']}'";
		}else{
			$queryWhereNoAnggota = NULL;
		}

		if(!empty($params['NamaAnggota'])){
			$queryWhereNamaAnggota = "AND nama_anggota LIKE '%{$params['NamaAnggota']}%' ";
		}else{
			$queryWhereNamaAnggota = NULL;
		}

		$query = "SELECT * FROM anggota WHERE no_anggota IS NOT NULL {$queryWhereNoAnggota}{$queryWhereNamaAnggota} ORDER BY no_anggota ASC";
		
		$results = DB::select($query);

		return $results;
	}

	public static function getInsert($data){

		DB::table('anggota')->insert([
			'no_anggota'			=> $data['NoAnggota'],
			'no_anggota_penjamin' 	=> $data['NoAnggotaPenjamin'],
			'nama_anggota'			=> $data['NamaAnggota'],
			'no_telpon'				=> $data['NoTelpon'],
			'alamat'				=> $data['Alamat'],
			'status'				=> $data['Status'],
			'created_at'			=> date('Y-m-d'),
			// 'created_by'
			]);

	}

	public static function getUpdate($data){

		DB::table('anggota')->where('id_anggota',$data['IdAnggota'])->update([
			'no_anggota'			=> $data['NoAnggota'],
			'no_anggota_penjamin' 	=> $data['NoAnggotaPenjamin'],
			'nama_anggota'			=> $data['NamaAnggota'],
			'no_telpon'				=> $data['NoTelpon'],
			'alamat'				=> $data['Alamat'],
			'status'				=> $data['Status'],
			'updated_at'			=> date('Y-m-d'),
			]);

	}

	public static function getDelete($id){
		DB::table('anggota')->where('id_anggota',$id)->delete();
	}

	public static function getAnggota(){
		$results = DB::table('anggota')->select('id_anggota','no_anggota','nama_anggota')->get();

		return $results;
	}

}