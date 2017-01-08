<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{

	public static function getTotalSetoran(){


		$result = DB::table('setoran')->select('id_setoran')->count();

		return $result;
	}

	public static function getLastSetoran(){
		$result = DB::table('setoran')->select('nama_anggota','tanggal_setoran','keterangan')->join('anggota','setoran.id_anggota','anggota.id_anggota')->orderby('setoran.created_at','desc')->first();

		return $result;
	}
}