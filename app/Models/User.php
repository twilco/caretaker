<?php

namespace App\Models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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


    public static function getCareRecipients($ctID)
    {
        $users = DB::table('users as u')->join('cr_ct_link as link', 'u.id', '=', 'link.caretaker_id')
                                        ->join('carerecipients as cr', 'link.carerecipient_id', '=', 'cr.id')
                                        ->where('u.id', '=', $ctID)
                                        ->select('cr.full_name')
                                        ->get();
    }
}
