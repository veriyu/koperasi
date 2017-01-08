<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getRows($param){
        $results = DB::table('users')->paginate($param);
    
        return $results;
    }

    public static function getInsert($data){

        DB::table('users')->insert([
            'group'             => $data['Group'],
            'name'              => $data['Nama'],
            'email'             => $data['Email'],
            'password'          => bcrypt($data['Password']),
            'created_at'        => date('Y-m-d H:i:s'),

            ]);
        

    }

    public static function getUpdate($data){

        DB::table('users')->where('id',$data['IdSetoran'])->update([
            'group'             => $data['Group'],
            'name'              => $data['Nama'],
            'email'             => $data['Email'],
            'password'          => bcrypt($data['Password']),
            'updated_at'        => date('Y-m-d H:i:s'),
            
            ]);

    }
}
