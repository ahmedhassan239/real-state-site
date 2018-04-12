<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUsersList($skip, $draw, $length)
{

    $query = static::select( 'id', 'name', 'email', 'admin', 'created_at');


    $users = $query->offset($skip)->limit($length)->get();

    $return = new \stdClass;

    $return->draw = $draw;
    $return->recordsTotal = static::all()->count();
    $return->recordsFiltered = static::all()->count();

    $return->data = array();

    foreach($users as $user){
        $item = array();
        array_push($item, $user->id);
        array_push($item, $user->name);
        array_push($item, $user->email);
        array_push($item, $user->created_at->toDateTimeString());
        array_push($item, ($user->admin == 1 ? "مدير" : "عضو"));
//           if ($user->id !=1) {
        $deleteBtn = "<a href='" . url('/adminpanel/users/' . $user->id . '/delete/') . "'><i class='fa fa-trash'></i></a>";
//          }
        $updateBtn = "<a style='margin-right:10px;' href='". url('/adminpanel/users/'.$user->id.'/edit/') ."'><i class='fa fa-edit'></i></a>";
        $control = $deleteBtn.$updateBtn;

        array_push($item, $control);

        array_push($return->data, $item);
    }
    return $return;
}
}
