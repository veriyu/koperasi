<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class PinjamanModel extends Model
{
	
	
	public static function getRows($param){
		
		$results = DB::table('transaksi')
					->where('tipe_transaksi','KELUAR')
					->join('anggota','anggota.id_anggota','transaksi.id_anggota')
					->paginate($param);

		return $results;
	}

	public static function getRow($id){
		$result = DB::table('transaksi')->where('id_transaksi',$id)->first();

		return $result;
	}

	public static function getRowDetail($id){
		$results = DB::table('transaksi_detail')->where('id_transaksi',$id)->get();

		return $results;
	}

	public static function getInsert($data){
		
		$id = DB::table('transaksi')->insertGetid([
  			'id_anggota'		=> (empty($data['NoAnggota'])?0:$data['NoAnggota']),
  			'dibayar_ke'		=> $data['DibayarKe'],
  			'tipe_transaksi'	=> $data['Tipe'],
  			'tanggal'			=> $data['TanggalSetoran'],
  			'no_suk'			=> $data['NoSuk'],
  			'no_ba'				=> $data['NoBa'],
  			'keterangan'		=> $data['Keterangan'],
  			'created_at'		=> date('Y-m-d H:i:s'),
  			'created_by'		=> Session::get('user_name')
			]);
		
		self::insertDetail($id,$data['Detail']);
	}

	public static function getUpdate($data){

		DB::table('setoran')->where('id_setoran',$data['IdSetoran'])->update([
  			'id_anggota'		=> (empty($data['NoAnggota'])?0:$data['NoAnggota']),
  			'dibayar_ke'		=> $data['DibayarKe'],
  			'tipe_transaksi'	=> $data['Tipe'],
  			'tanggal'			=> $data['TanggalSetoran'],
  			'no_suk'			=> $data['NoSuk'],
  			'no_ba'				=> $data['NoBa'],
  			'keterangan'		=> $data['Keterangan'],
  			'updated_at'		=> date('Y-m-d H:i:s'),
  			'updated_by'		=> Session::get('user_name')
			]);

	}

	public static function insertDetail($id_transaksi,$DataDetail){
		// dd($DataDetail);
		DB::table('transaksi_detail')->where('id_transaksi',$id_transaksi)->delete();

		foreach ($DataDetail as $detail) {
			// dd($detail['NoAkun']);
			// if(!empty($detail['NilaiK']) || $detail['NoAkun'] == 100 ){

				DB::table('transaksi_detail')->insert([
					'id_transaksi'	=> $id_transaksi,
					'no_akun'		=> $detail['NoAkun'],
					'nilai_d'		=> (empty($detail['NilaiD'])? 0 : $detail['NilaiD']),
					'nilai_k'		=> (empty($detail['NilaiK'])? 0 : $detail['NilaiK']),
					]);
			// }
		}
		
	}

	public static function getDelete($id){
		DB::table('transaksi_detail')->where('id_transaksi',$id)->delete();
		DB::table('transaksi')->where('id_transaksi',$id)->delete();
	}

	public static function getAnggota(){
		$results = DB::table('anggota')->select('id_anggota','nama_anggota')->get();

		return $results;
	}

}