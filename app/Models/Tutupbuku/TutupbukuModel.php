<?php

namespace App\Models\Tutupbuku;
use Illuminate\Database\Eloquent\Model;
use DB;

class TutupbukuModel extends Model
{
	protected $table 		= "saldo_akun";
	protected $primaryKey 	= "id_akun";
	protected $fillable 	= ['no_akun','nama_akun','kategori_akun','tahun','status_tutup_buku','nilai_d','nilai_k'];
	protected $filter		= ['id_akun','no_akun','nama_akun','kategori_akun','tahun','status_tutup_buku','nilai_d','nilai_k'];

	public $timestamps = false;
	
	public static function initialize(){
		return [
			'no_akun' 			=> '',
			'nama_akun' 		=> '',
			'kategori_akun' 	=> '',
			'tahun'				=> '',
			'status_tutup_buku'	=> '',
			'nilai_d'			=> '',
			'nilai_k'			=> ''
		];
	}

	public static function Transaksi($periode,$no_akun){
		
		$results = DB::table('transaksi')
						->selectRaw("SUM(transaksi_detail.nilai_d) as nilai_d, SUM(transaksi_detail.nilai_k) as nilai_k ")
						->join('transaksi_detail','transaksi.id_transaksi','=','transaksi_detail.id_transaksi')
						->whereRaw("SUBSTR(transaksi.tanggal,1,7) = '{$periode}'")
						->where('transaksi_detail.no_akun',$no_akun)
						->first();
		
		return $results;
	}


}