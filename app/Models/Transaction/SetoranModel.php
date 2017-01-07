<?php

namespace App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class SetoranModel extends Model
{
	
	
	public static function getRows($param){
		
		$results = DB::table('setoran')
					->join('anggota','anggota.id_anggota','setoran.id_anggota')
					->paginate($param);

		return $results;
	}

	public static function getRow($id){
		$result = DB::table('setoran')->where('id_setoran',$id)->first();

		return $result;
	}

	public static function getInsert($data){

		DB::table('setoran')->insert([
  			'id_anggota'		=> $data['NoAnggota'],
  			'tanggal_setoran'	=> $data['TanggalSetoran'],
  			'keterangan'		=> $data['Keterangan'],
  			'created_at'		=> date('Y-m-d H:i:s'),
  			'created_by'		=> Session::get('user_name')
			]);
		       

	}

	public static function getUpdate($data){

		DB::table('setoran')->where('id_setoran',$data['IdSetoran'])->update([
  			'id_anggota'		=> $data['NoAnggota'],
  			'tanggal_setoran'	=> $data['TanggalSetoran'],
  			'keterangan'		=> $data['Keterangan'],
			]);

	}

	public static function getDelete($id){
		DB::table('setoran')->where('id_setoran',$id)->delete();
	}

	public static function getAnggota(){
		$results = DB::table('anggota')->select('id_anggota','nama_anggota')->get();

		return $results;
	}

}