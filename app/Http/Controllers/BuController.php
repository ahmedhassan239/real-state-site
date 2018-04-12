<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\BuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class BuController extends Controller
{
    public function index()
    {
        return view('admin.bu.index');
    }
    public function create()
    {
        return view('admin.bu.add');
    }
    public function store(BuRequest $buRequest, Bu $bu)
    {
        /*$this->validate($buRequest,[
            'bu_square'=>'digits|integer|numeric',
        ]);*/
        /*image upload code*/
        if ($buRequest->file('image')){
            $fileName = uploadImage($buRequest->file('image'));
            if (!$fileName){
                Redirect::back()->withFlashMessage('من فضلك اختار صوره بمقايس اقل من 362*500');
            }
            $image = $fileName;
        }else{
            $image = '';
        }
        $user =Auth::user();
        $data =[
            'bu_name'=>$buRequest->bu_name,
            'bu_price'=>$buRequest->bu_price,
            'bu_rent'=>$buRequest->bu_rent,
            'bu_square'=>$buRequest->bu_square,
            'bu_type'=>$buRequest->bu_type,
            'bu_small_dis'=>$buRequest->bu_small_dis,
            'bu_meta'=>$buRequest->bu_meta,
            'bu_langtuide'=>$buRequest->bu_langtuide,
            'rooms'=>$buRequest->rooms,
            'bu_latitde'=>$buRequest->bu_latitde,
            'bu_large_dis'=>$buRequest->bu_large_dis,
            'bu_status'=>$buRequest->bu_status,
            'user_id'=>$user->id,
            'bu_place'=>$buRequest->bu_place,
            'image'=> $image
        ];
        $bu -> create($data);
        return redirect('/adminpanel/bu')->withFlashMessage('تم اضافه العقار بنجاح');
    }
    public function edit($id)
    {
        $bu =Bu::find($id);
        return view ('admin.bu.edit',compact('bu'));
    }

    public function update(Bu $bu,$id, Request $request)
    {
        $buUpdate = $bu->find($id);
        $buUpdate->fill(array_except($request->all(),['image']))->save();
        /*image upload code*/
        if ($request->file('image')){
           $fileName = uploadImage($request->file('image'),'/public/website/bu_images/','500','362',$buUpdate->image);
           if (!$fileName){
               Redirect::back()->withFlashMessage('من فضلك اختار صوره بمقايس اقل من 362*500');
           }


            $buUpdate->fill(['image'=>$fileName])->save();
        }
        return Redirect::back()->withFlashMessage('تم التعديل علي العقار بنجاح');
    }


    public function destroy($id, Bu $bu)
    {

            $bu->find($id)->delete();
            return redirect('/adminpanel/bu')->withFlashMessage('تم حذف العقار بنجاح');

    }

    public function showAllEnable(Bu $bu)
    {
        $buAll =$bu->where('bu_status',1)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }

    public function for_rent(Bu $bu)
    {
        $buAll =$bu->where('bu_status',1)->where('bu_rent',0)->orderBy('id','desc')->paginate(15);
//        ->toArray()
        return view('website.bu.all',compact('buAll'));
    }
    public function for_buy(Bu $bu)
    {
        $buAll =$bu->where('bu_status',1)->where('bu_rent',1)->orderBy('id','desc')->paginate(15);
//        ->toArray()
        return view('website.bu.all',compact('buAll'));
    }
    public function showByType($type , Bu $bu)
    {
        if (in_array($type,['0','1','2'])){
            $buAll =$bu->where('bu_status',1)->where('category_id',$type)->orderBy('id','desc')->paginate(15);
//        ->toArray()
            return view('website.bu.all',compact('buAll'));
        }else{
            return Redirect::back();
        }

    }


   /*
   Search using sql with out pagination
   public function search(Request $request,Bu $bu)
    {
        $requestAll= array_except($request->toArray(),['submit','_token']);
        $out ='';
        $i = 0;
        foreach ($requestAll as $key => $req){
            if ($req != ''){
                $where = $i == 0 ? " where " :" and ";
                $out .=$where.' '.$key.' = '.$req;
                $i= 2;
            }
        }
        $query = "select*from bu".$out;
        $buAll = DB::select($query);
        $search = 'search';

        return view('website.bu.all',compact('buAll','search'));
    }*/
    public function search(Request $request,Bu $bu)
        /*laravel search*/
    {
      /*  $this->validate($request,[
            'bu_price'=>'integer',
            'bu_square'=>'integer',
        ]);*/
        $requestAll= array_except($request->toArray(),['submit','_token','page']);
        $query = DB::table('bu')->select('*');
        $array=[];
        $count = count($requestAll);
        $i=0;
        foreach ($requestAll as $key => $req){
            $i++;
            if ($req != ''){
                if ($key == 'bu_price_to'&& $request->bu_price_from ==''){
                   $query->where('bu_price','<=',$req);
                }elseif ($key == 'bu_price_from'&& $request->bu_price_to ==''){
                    $query->where('bu_price','>=',$req);
                }else{
                    if ($key!='bu_price_to'&&$key!='bu_price_from'){
                        $query->where($key,$req);
                    }
                }
                $array [$key]= $req;
            }elseif ($count ==$i && $request->bu_price_to !='' && $request->bu_price_from){
                $query->whereBetween('bu_price',[$request->bu_price_from,$request->bu_price_to]);
                $array[$key] = $req;
            }
        }
        $buAll = $query->paginate(15);
        return view('website.bu.all',compact('buAll','array'));
    }


    public function anyData(Request $request)
    {
        /* Datatable function*/
        if ($request->ajax()) {
            $bus= Bu::getBusList($request->start, $request->draw, $request->length);
            // dd($bus);
            return response()->json($bus);
        }
    }

    public function getAjaxInfo(Request $request ,Bu $bu){
        return $bu->find($request->id)->toJson();
    }

    public function showSingle($id,Bu $bu){
        $buInfo = $bu->findOrFail($id);
        $same_rent=$bu->where('bu_rent',$buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type=$bu->where('bu_type',$buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
          return view('website.bu.singlebu',compact('buInfo','same_rent','same_type'));
    }
}
