<?php

namespace App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class SetoranModel extends Model
{
	
	
	public static function getRows($param){
		
		$results = DB::table('transaksi')
					->where('tipe_transaksi','MASUK')
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
  			'id_anggota'		=> $data['NoAnggota'],
  			'tanggal'			=> $data['TanggalSetoran'],
  			'tipe_transaksi'	=> 'MASUK',
  			'no_sum'			=> $data['NoSum'],
  			'no_ba'				=> $data['NoBa'],
  			'keterangan'		=> $data['Keterangan'],
  			'created_at'		=> date('Y-m-d H:i:s'),
  			'created_by'		=> Session::get('user_name')
			]);
		
		self::insertDetail($id,$data['Detail']);
	}

	public static function getUpdate($data){
		// dd($data);
		DB::table('transaksi')->where('id_transaksi',$data['IdTransaksi'])->update([
  			'id_anggota'		=> $data['NoAnggota'],
  			'tanggal'			=> $data['TanggalSetoran'],
  			// 'tipe_transaksi'	=> 'MASUK',
  			'keterangan'		=> $data['Keterangan'],
  			'no_sum'			=> $data['NoSum'],
  			'no_ba'				=> $data['NoBa'],
  			'updated_at'		=> date('Y-m-d H:i:s'),
  			'updated_by'		=> Session::get('user_name')
			]);

		self::insertDetail($data['IdTransaksi'],$data['Detail']);
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
					'nilai_d'		=> (empty($detail['NilaiD'])? Null : $detail['NilaiD']),
					'nilai_k'		=> (empty($detail['NilaiK'])? Null : $detail['NilaiK']),
					]);
			// }
		}
		
	}

	public static function getDelete($id){
		DB::table('transaksi_detail')->where('id_transaksi',$id)->delete();
		DB::table('transaksi')->where('id_transaksi',$id)->delete();
	}

	public static function getAnggota(){
		$results = DB::table('anggota')->select('id_anggota','no_anggota','nama_anggota')->get();

		return $results;
	}

	public static function getDataAnggota($NoAnggota){
		$result = DB::table('anggota')->where('no_anggota',$NoAnggota)->first();

		return $result;
	}

}