<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Illuminate\Support\Facades\Redirect;


class SiteSettingController extends Controller
{
    public function index(SiteSetting $siteSetting )
    {
        $siteSetting = $siteSetting->all();
        return view('admin.sitesetting.index',compact('siteSetting'));
    }
    public function store(Request $request, SiteSetting $siteSetting)
    {
        foreach (array_except( $request->toArray() ,['_token','submit'])as $key=> $req){
          $siteSettingUpdate=$siteSetting->where('namesetting',$key)->get()[0];
          if ($siteSettingUpdate->type != 3){
              $siteSettingUpdate->fill(['value'=>$req])->save();
          }else{
                $fileName = uploadImage($req,'/public/website/images/slider','1600','500',$siteSettingUpdate->value);
                if ($fileName){
                    $siteSettingUpdate->fill(['value'=>$fileName])->save();
                }
          }
//          $siteSettingUpdate->fill(['value'=>$req])->save();
//            SiteSetting::where('namesetting', $key)->update(['value'=> $req]);
        }
        return Redirect::back()->withFlashMessage('تم التعديل علي الاعدادات بنجاح');
//        Client::findOrFail($id)->first()->fill($request->all())->save();
    }
}
