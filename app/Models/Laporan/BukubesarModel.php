<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class BukubesarModel extends Model
{
	public static function getLaporanHeader($data){
		

		

	}

	public static function getLaporanDetail($data,$no_akun){

		$query  = DB::table('transaksi_detail')
					->join('transaksi','transaksi.id_transaksi','=','transaksi_detail.id_transaksi');
					if($data['Tahun']){
						$query->whereRaw("SUBSTR(transaksi.Tanggal,1,4) = '{$data['Tahun']}' ")
							->where('transaksi_detail.no_akun',$no_akun);
					}else{
						$query->whereRaw("SUBSTR(transaksi.Tanggal,6,2) = '{$data['Bulan']}' ")
							->whereRaw("SUBSTR(transaksi.Tanggal,1,4) = '{$data['Tahun']}' ")
							->where('transaksi_detail.no_akun',$no_akun);
					}
					
		$results = $query->get();

		// $results = DB::table('transaksi_detail')
		// 			->join('transaksi','transaksi.id_transaksi','=','transaksi_detail.id_transaksi')
		// 			->whereRaw("SUBSTR(transaksi.Tanggal,6,2) = '{$data['Bulan']}' ")
		// 			->whereRaw("SUBSTR(transaksi.Tanggal,1,4) = '{$data['Tahun']}' ")
		// 			->where('transaksi_detail.no_akun',$no_akun)
		// 			->get();

		return $results;
	}
}