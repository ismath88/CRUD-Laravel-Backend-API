<?php 
namespace App\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use DB;
use App\Model\User;
use App\Model\Option;
use App\Model\Designer;
use Session;
use Request;

class GlobalFunctions
{
	
	public static function userID()
	{
		return Auth::user()->id;
	}
	public static function userRole()
	{
		return Auth::user()->role_id;
	}

	public static function differnceTwoTimesInMins($from,$to)
	{
		$to = strtotime($to); 
		$from = strtotime($from);
		$timeDiff = $to - $from;
		return round(abs($to - $from) / 60,2);
	}

	public static function differnceTwoDates($from,$to)
	{
		$to = strtotime($to); 
		$from = strtotime($from);
		$datediff = $to - $from;
		return round($datediff / (60 * 60 * 24));
	}

	public static function differenceOfHours($from,$to)
	{
		$from = strtotime($from);
		$to = strtotime($to);
		return ($to-$from)/3600;
	}
	
	public static function generatePath($path)
	{
		$year = date('Y');
		$month = date('M');
		
		if(!file_exists($path.'/'.$year)){
			mkdir($path.'/'.$year,0777);
		}
		if(!file_exists($path.'/'.$year.'/'.$month)){
			mkdir($path.'/'.$year.'/'.$month,0777);
		}
		return $path.'/'.$year.'/'.$month;
		
	}
	
	public static function getPath($path)
	{
		$year = date('Y');
		$month = date('M');
		return $path.'/'.$year.'/'.$month;
		
	}

	public static function translation($key_lang)
	{
		 $translate_type = (Session::get('translate_type'))?Session::get('translate_type'):2;
		 
		 if($translate_type == 2)
		 {
			 $key_lang = (isset(config('translate')[$key_lang]))?config('translate')[$key_lang]:$key_lang;
		 } 

		 return $key_lang;
		
	}

	public static function encrypted($string=null){
		return Crypt::encryptString($string);
	}
	
	public static function decrypted($string=null){
		return Crypt::decryptString($string);
	}
	
	public static function OriginalName($name=null){
		$name = pathinfo($name, PATHINFO_FILENAME);
		return preg_replace('/[^a-zA-Z0-9_-]/s','',$name);
	}
	
}

?>