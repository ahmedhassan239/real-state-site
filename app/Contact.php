<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ="contact";
    protected $fillable  =[
        'contact_name', 'contact_email', 'contact_subject', 'contact_message', 'view', 'contact_type'
    ];



    public static function getContactList($skip, $draw, $length)
    {

        $query = static::select( 'id', 'contact_name', 'contact_email','contact_type' ,'created_at','view');


        $contacts = $query->offset($skip)->limit($length)->get();

        $return = new \stdClass;
        $return->draw = $draw;
        $return->recordsTotal = static::all()->count();
        $return->recordsFiltered = static::all()->count();

        $return->data = array();

        foreach($contacts as $contact){
            $item = array();
            array_push($item, $contact->id);
            array_push($item, $contact->contact_name);
            array_push($item, $contact->contact_email);

             if ($contact->view == 0){
               array_push($item,'رساله جديده');
               }else{
                   array_push($item,'رساله قديمه');
               }

            if ($contact->contact_type == 1){
                array_push($item,'اعجاب');
            }elseif ($contact->contact_type == 2){
                array_push($item,'مشكله');
            }elseif ($contact->contact_type == 3){
                array_push($item,'اقتراح');
            }else{
                array_push($item,'استفسار');
            }


            array_push($item, $contact->created_at->toDateTimeString());
            // array_push($item, $contact->contact_message);

           

            
            $deleteBtn = "<a href='" . url('/adminpanel/contact/' . $contact->id . '/delete/') . "'><i class='fa fa-trash'></i></a>";
            $updateBtn = "<a style='margin-right:10px;' href='". url('/adminpanel/contact/'.$contact->id.'/edit/') ."'><i class='fa fa-edit'></i></a>";
            $control = $deleteBtn.$updateBtn;
            array_push($item, $control);
            array_push($return->data, $item);
        }
    
        return $return;
    }
}