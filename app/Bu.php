<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    protected $table ="bu";
    protected $fillable =[
        'bu_name', 'bu_price', 'bu_rent', 'bu_square', 'bu_type',
        'bu_small_dis', 'bu_meta', 'bu_langtuide','bu_place','rooms', 'bu_latitde',
        'bu_large_dis', 'bu_status', 'user_id','image'
    ];
    public static function getBusList($skip, $draw, $length)
    {

        $query = static::select( 'id', 'bu_name','bu_rent', 'bu_price', 'bu_type','created_at','bu_status','rooms',
            'bu_place','bu_langtuide','bu_latitde','image');
//       'bu_small_dis' ,,'bu_large_dis', 'bu_meta'

        $bus = $query->offset($skip)->limit($length)->get();

        $return = new \stdClass;

        $return->draw = $draw;
        $return->recordsTotal = static::all()->count();
        $return->recordsFiltered = static::all()->count();

        $return->data = array();

        foreach($bus as $bu){
            $item = array();
            array_push($item, $bu->id);
            array_push($item, $bu->bu_name);
            if ($bu->bu_type==0){
                array_push($item, "شقة");
            }elseif ($bu->bu_type==1){
                array_push($item, "فيلا");
            }else{
                array_push($item, "شاليه");
            }
            array_push($item, $bu->bu_square);
            array_push($item, $bu->rooms);
            array_push($item, ($bu->bu_rent == 1 ? "تمليك" : "ايجار"));
            array_push($item, $bu->bu_price);
            array_push($item, ($bu->bu_status == 1 ? "مفعل" : "غير مفعل"));
//            array_push($item, $bu->bu_meta);
//            array_push($item, $bu->bu_small_dis);
            array_push($item, $bu->bu_langtuide);
            array_push($item, $bu->bu_latitde);
//            array_push($item, $bu->bu_large_dis);
            array_push($item, bu_place ()[$bu->bu_place]);
            array_push($item, $bu->created_at->toDateTimeString());

            //array_push($item, bu_type($bu->bu_type));
            // array_push($item, ($bu->bu_type == 0 ? "شقه" :$bu->bu_type == 1 ? "فيلا": "شاليه"));
            // array_push($item, $bu->user_id);
//            array_push($item, $bu->image);
//           if ($user->id !=1) {
            $deleteBtn = "<a href='" . url('/adminpanel/bu/' . $bu->id . '/delete/') . "'><i class='fa fa-trash'></i></a>";
//          }
            $updateBtn = "<a style='margin-right:10px;' href='". url('/adminpanel/bu/'.$bu->id.'/edit/') ."'><i class='fa fa-edit'></i></a>";
            $control = $deleteBtn.$updateBtn;

            array_push($item, $control);

            array_push($return->data, $item);
        }
        return $return;
    }
}
