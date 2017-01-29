<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class BukubesarModel extends Model
{
	public static function getLaporanHeader($data){
		$results  = DB::table('transaksi_detail')
					->join('transaksi','transaksi.id_transaksi','=','transaksi_detail.id_transaksi')
					->whereRaw("SUBSTR(transaksi.Tanggal,6,2) = '{$data['Bulan']}' ")
					->whereRaw("SUBSTR(transaksi.Tanggal,1,4) = '{$data['Tahun']}' ")
					->get();

		return $results;

	}

	public static function getLaporanDetail($id){
		$results = DB::table('transaksi_detail')->where('id_transaksi',$id)->get();

		return $results;
	}
}