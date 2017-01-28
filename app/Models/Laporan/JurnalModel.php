<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class JurnalModel extends Model
{
	
	public static function getHeaderLaporan($TanggalAwal,$TanggalAkhir){

		$results = DB::table('transaksi')
				->select('id_transaksi','tanggal','keterangan','anggota.nama_anggota')
				->join('anggota','transaksi.id_anggota','=','anggota.no_anggota')
				->whereBetween('tanggal',[$TanggalAwal,$TanggalAkhir])
				->orderby('tanggal')
				->get();

		return $results;
	}

	public static function getDetailLaporan($id_transaksi){
		$results = DB::table('transaksi_detail')
				->join('akun','akun.no_akun','=','transaksi_detail.no_akun')
				->where('id_transaksi',$id_transaksi)
				->get();

		return $results;
	}

}