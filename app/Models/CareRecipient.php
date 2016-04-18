<?php

namespace App\Models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Carerecipient extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getCareTakers($crID)
    {
        $carerecipients = DB::table('carerecipients as cr')->join('cr_ct_link as link', 'cr.id', '=', 'link.carerecipient_id')
                                                           ->join('users as u', 'link.caretaker_id', '=', 'u.id')
                                                           ->where('cr.id', '=', $crID)
                                                           ->select('u.id', 'u.first_name', 'u.last_name', 'u.phone', 'u.emergency_phone', 'u.address')
                                                           ->get();

        if(!empty($carerecipients))
        {
            return $carerecipients;
        }
        else
        {
            return 0;
        }
    }

    public static function getMessages($crID)
    {

        $messages = DB::table('messages')->select()
                                         ->where('carerecipient_id', $crID)
                                         ->get();

        if(!empty($messages))
        {
            return $messages;
        }                    
        else 
        {
            return 0;
        }          
    }

    public static function addMessage($crID, $message)
    {
        $getCT = DB::table('cr_ct_link')->select('caretaker_id')
                                        ->where('carerecipient_id', $crID)
                                        ->get();

        if(!empty($getCT))
        {
            $ctID = $getCT[0]->caretaker_id;

            $today = date("Y-m-d");

            $time = date("H:i:s");

            $addMessage = DB::table('messages')->insert(['carerecipient_id' => $crID, 'caretaker_id' => $ctID, 'message' => $message, 'time' => $time, 'date' => $date]);
        }


    }

}