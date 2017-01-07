<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeModel extends Model
{

	public static function CountPasien(){


		$result = DB::table('poliklinik_pasien')->select('PasienId')->count();

		return $result;
	}

	public static function CountKegiatan(){


		$result = DB::table('poliklinik_kegiatan')->select('KegiatanId')->count();

		return $result;
	}

	public static function BulanIni(){
		$date = date('Y-m-d');

		$Tahun = date('Y');
		$Bulan = date('m');

		$result = DB::table('poliklinik_kegiatan')->select('KegiatanId')->whereRaw("substr(Tanggal, 6,2) = '".$Bulan."' ")->count();

		return $result;
	}

	public static function BulanLalu(){
		$date = date('Y-m-d');

		$Tahun = date('Y');
		$Bulan = date('m')-1;

		$result = DB::table('poliklinik_kegiatan')->select('KegiatanId')->whereRaw("substr(Tanggal, 6,2) = '".$Bulan."' ")->count();
		
		return $result;
	}
}