<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{

	public static function getTotalSetoran(){


		$result = DB::table('transaksi')->select('id_setoran')->count();

		return $result;
	}

	public static function getLastSetoran(){
		$result = DB::table('transaksi')->select('nama_anggota','tanggal','keterangan')->join('anggota','transaksi.id_anggota','anggota.id_anggota')->orderby('transaksi.created_at','desc')->first();

		return $result;
	}
}