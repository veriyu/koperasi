<?php

namespace App\Models\Akun;
use Illuminate\Database\Eloquent\Model;
use DB;

class AkunModel extends Model
{
	protected $table 		= "akun";
	protected $primaryKey 	= "id_akun";
	protected $fillable 	= ['no_akun','nama_akun','kategori_akun'];
	protected $filter		= ['id_akun','no_akun','nama_akun','kategori_akun'];

	public static function initialize(){
		return [
			'no_akun' 		=> '',
			'nama_akun' 	=> '',
			'kategori_akun' => '',
		];
	}



}