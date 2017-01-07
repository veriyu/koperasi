<?php

namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use DB;

class ModuleModel extends Model
{

	public static function getRows($param){
		
		$results = DB::table('module')
					// ->orderby('poliklinik_kegiatan.GrupKelas', 'ASC')
					->paginate($param);

		return $results;
	}

	public static function getRow($KegiatanId){
		$result = DB::table('poliklinik_kegiatan')->where('KegiatanId',$KegiatanId)->first();

		return $result;
	}

	public static function getInsert($data){

		// Memanggil fungsi create Route
		self::CreateRoute($data);

		// Memanggil fungsi create Controller
		self::CreateController($data);
		
		// Memanggil fungsi create Model
		self::CreateModel($data);

		DB::table('module')->insert([
		  'NamaModule' 	=> $data['NamaModule'],
		  'Keterangan' 	=> $data['Keterangan'],			
  			]);

	}

	public static function getUpdate($data){

		DB::table('module')->where('Id',$data['ModuleId'])->update([
		  'NamaModule' 	=> $data['NamaModule'],
		  'Keterangan' 	=> $data['Keterangan'],	
			]);

	}

	public static function getDelete($Id){

		// DB::enableQueryLog();
		DB::table('module')->where('Id',$Id)->delete();
		// dd(DB::getQueryLog());

	}

	public static function CreateRoute($data){
		$NamaModule = $data['NamaModule']; 
		
		// Mengambil Master Controller
		$WebRoutesPath = base_path('routes')."\\web.php";
		$MasterRoutePath = app_path('Http\Controllers\Master\MasterWebRoutes.php');

		$ContentWeb = file_get_contents($WebRoutesPath);
		$ContentNewRoute = file_get_contents($MasterRoutePath);

		$NewRouteName = str_replace('{ModuleRoute}', strtolower($NamaModule), $ContentNewRoute);

		$NewRoute = str_replace('{ModuleName}', $NamaModule, $NewRouteName);

		$ContentWeb .= "\r\n"; // add new line
		$ContentWeb .= $NewRoute;

		$FileWeb = fopen($WebRoutesPath, 'wb');
		fwrite($FileWeb, $ContentWeb);
		
		fclose($FileWeb);
		
	}

	public static function CreateController($data){
		$NamaModule = $data['NamaModule']; 

		$DirektoriModule = $data['DirModule'];
		// Devinisikan direktori COntroller
		$ControllerPath = app_path("Http\Controllers\\".$DirektoriModule); 
		// dd($ControllerPath);
		
		// Membuat Direkori Controller
		mkdir($ControllerPath,0777,true);
		// if(mkdir($ControllerPath,0777,true)){
		// 	dd('true');
		// }
		// dd('stop');
		// Membuat file Controller kosong
		$FileName = $ControllerPath."\\".$NamaModule."Controller.php";

		// Mengambil Master Controller
		$app_path = app_path('Http\Controllers\Master\MasterController.php');
		$content = file_get_contents($app_path);

		// START Membuat struktur Controller baru

		// Merubah NameSpace
		$contentNameSpace = str_replace("namespace App\Http\Controllers\{FolderController};","namespace App\Http\Controllers\\".$DirektoriModule.";",$content);

		// Merubah Model Direktori
		$contentModelDirectory = str_replace("{FolderModel}",$DirektoriModule,$contentNameSpace);
		
		// Merubah Nama Model
		$contentModelName = str_replace("{ModelName}",$NamaModule."Model",$contentModelDirectory);

		// Merubah Class Controller
		$contentClassName = str_replace("{ClassName}",$NamaModule,$contentModelName);

		// Merubah Direktori View
		$contentViewDir = str_replace("{ViewDirectory}",$NamaModule,$contentClassName);

		// Merubah redirect Route
		$contentRedirectRoute = str_replace("{route}",strtolower($NamaModule),$contentViewDir);
		
		// END  Membuat struktur Controller baru


		// START Edit Controller dari module yang sudah dibuat

		// Membuka file controller
		$File = fopen($FileName, 'wb');

		// Mengisikan Content
		fwrite($File, $contentRedirectRoute);

		// Menutup dan menyimpan file
		fclose($File);

		// END Edit Controller dari module yang sudah dibuat
	}

	public static function CreateModel($data){
		$NamaModule = $data['NamaModule']; 

		// Devinisikan direktori Model
		$ModelPath = app_path("Models\\".$NamaModule); 
		
		// Membuat Direkori Model
		mkdir($ModelPath,0777,true);

		// Membuat file Model kosong
		$FileName = $ModelPath."\\".$NamaModule."Model.php";

		// Mengambil Master Controller
		$app_path = app_path('Http\Controllers\Master\MasterModel.php');
		$content = file_get_contents($app_path);

		// START Membuat struktur Model baru

		// Merubah NameSpace
		$contentNameSpace = str_replace("{FolderModel}",$NamaModule,$content);

		// Merubah Class Controller
		$contentClassName = str_replace("{ClassName}",$NamaModule,$contentNameSpace);
		
		// END  Membuat struktur Controller baru


		// START Edit Controller dari module yang sudah dibuat

		// Membuka file controller
		$File = fopen($FileName, 'wb');

		// Mengisikan Content
		fwrite($File, $contentClassName);

		// Menutup dan menyimpan file
		fclose($File);

		// END Edit Controller dari module yang sudah dibuat
	}
}