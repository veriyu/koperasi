<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class JurnalModel extends Model
{
	
	public static function getHeaderLaporan($TanggalAwal,$TanggalAkhir){
		// dd('t');
		$TanggalAwal 	= '2016-07-01'; 
		$TanggalAkhir 	= '2016-07-31';

		$results = DB::table('transaksi')
				->select('id_transaksi','tanggal')
				->whereBetween('tanggal',[$TanggalAwal,$TanggalAkhir])
				->get();

		return $results;
	}

	public static function getDetailLaporan($id_transaksi){
		// $results = DB::table('transaksi_detail')
		// 		->where('id_transaksi',$id_transaksi)
		// 		->whereRaw('nilai_d OR nilai_k != 0')
		// 		->get();

		$query = "SELECT * FROM transaksi_detail WHERE id_transaksi = ".$id_transaksi." AND nilai_d AND nilai_k != 0";

		$results = DB::select($query);

		return $results;
	}

}