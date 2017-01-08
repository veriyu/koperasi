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

	public static function getRowDetail($id){
		$results = DB::table('setoran_detail')->where('id_setoran',$id)->get();

		return $results;
	}

	public static function getInsert($data){

		$id = DB::table('setoran')->insertGetid([
  			'id_anggota'		=> $data['NoAnggota'],
  			'tanggal_setoran'	=> $data['TanggalSetoran'],
  			'no_sum'			=> $data['NoSum'],
  			'no_ba'				=> $data['NoBa'],
  			'keterangan'		=> $data['Keterangan'],
  			'created_at'		=> date('Y-m-d H:i:s'),
  			'created_by'		=> Session::get('user_name')
			]);
		
		self::insertDetail($id,$data['Detail']);
	}

	public static function getUpdate($data){

		DB::table('setoran')->where('id_setoran',$data['IdSetoran'])->update([
  			'id_anggota'		=> $data['NoAnggota'],
  			'tanggal_setoran'	=> $data['TanggalSetoran'],
  			'keterangan'		=> $data['Keterangan'],
  			'no_sum'			=> $data['NoSum'],
  			'no_ba'				=> $data['NoBa'],
  			'updated_at'		=> date('Y-m-d H:i:s'),
  			'updated_by'		=> Session::get('user_name')
			]);

	}

	public static function insertDetail($id_setoran,$DataDetail){
		// dd($DataDetail);
		DB::table('setoran_detail')->where('id_setoran',$id_setoran)->delete();

		foreach ($DataDetail as $detail) {
			// dd($detail['NoAkun']);
			// if(!empty($detail['NilaiK']) || $detail['NoAkun'] == 100 ){

				DB::table('setoran_detail')->insert([
					'id_setoran'	=> $id_setoran,
					'no_akun'		=> $detail['NoAkun'],
					'nilai_d'		=> (empty($detail['NilaiD'])? 0 : $detail['NilaiD']),
					'nilai_k'		=> (empty($detail['NilaiK'])? 0 : $detail['NilaiK']),
					]);
			// }
		}
		
	}

	public static function getDelete($id){
		DB::table('setoran_detail')->where('id_setoran',$id)->delete();
		DB::table('setoran')->where('id_setoran',$id)->delete();
	}

	public static function getAnggota(){
		$results = DB::table('anggota')->select('id_anggota','nama_anggota')->get();

		return $results;
	}

}