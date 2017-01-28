<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{

	public static function getTotalSetoran(){

		$result = DB::table('transaksi')->where('tipe_transaksi','MASUK')->count();

		return $result;
	}

	public static function getLastSetoran(){
		$result = DB::table('transaksi')->select('nama_anggota','tanggal','keterangan')->join('anggota','transaksi.id_anggota','anggota.no_anggota')->where('tipe_transaksi','MASUK')->orderby('transaksi.created_at','desc')->first();

		return $result;
	}

	public static function getTotalPengeluaran(){

		$result = DB::table('transaksi')->where('tipe_transaksi','KELUAR')->count();

		return $result;
	}

	public static function getLastPengeluaran(){
		$result = DB::table('transaksi')->select('nama_anggota','tanggal','keterangan')->join('anggota','transaksi.id_anggota','anggota.no_anggota')->where('tipe_transaksi','KELUAR')->orderby('transaksi.created_at','desc')->first();

		return $result;
	}
}