<?php
use App\SiteSetting;
function getsetting ($settingname ='sitename'){
    return SiteSetting::where('namesetting',$settingname)->first()->value;
}

function checkImageExist($imageName ,$pathImage = 'website/bu_images/',$url ='/website/bu_images/'){

    if ($imageName != ''){
        $path = $pathImage.$imageName;
        if (file_exists($path)){
            return url('/').$url.$imageName ;
        }
    } else{
        return  getsetting('no_image');
    }
}

    function uploadImage($request, $path = '/public/website/bu_images/',$width='500' ,$height='362',$deleteFileWithName = ' '){
        $dim = getimagesize($request);
        $fileName = $request->getClientOriginalName();
        $request->move(
            base_path().$path,$fileName
        );
        if ($width == '500' && $height =='362'){
            $thumbPath =base_path().'/public/website/thumb/';
            $thumbPathNew =$thumbPath.$fileName;
          \Intervention\Image\Facades\Image::make(base_path().$path.'/'.$fileName)->resize('500','362')->save($thumbPathNew,100);
            if ($deleteFileWithName != ''){
                deleteImage($thumbPath.$deleteFileWithName);
            }
        }
        if ($deleteFileWithName != ''){
            deleteImage(base_path().$path.'/'.$deleteFileWithName);
        }
        return $fileName ;
    }
    function deleteImage($deleteFileWithName){
        if (file_exists($deleteFileWithName)){
            \Illuminate\Support\Facades\File::delete($deleteFileWithName);
        }
    }
    function bu_type(){
    $array =[
        'شقه',
        'فيلا',
        'شاليه'
    ];
    return $array;
}
    function bu_rent(){
        $array =[
            'ايجار',
            'تمليك'
        ];
        return $array;
    }
function contact(){
         $array = [
           '1'=>'اعجاب',
           '2'=>'مشكله',
           '3'=>'اقتراح',
           '4'=>'استفسار'
         ];
        return $array ;
}

function unreadMessage(){
    return \App\Contact::where('view',0)->get();
}
function countunreadMessage(){
    return \App\Contact::where('view',0)->count();
}
    function room_num(){
        $array=[];
         for ($i=2;$i<=40;$i++){
            $array[$i]=$i;
         }
         return $array ;
    }
    function searchNameFields(){
        return[
            'bu_price'=>'السعر',
            'bu_price_from'=>' السعر من',
            'bu_price_to'=>'السعر الي ',
            'rooms'=>'عدد الغرف',
            'bu_type'=>'نوع العقار',
            'bu_place'=>'المنطقه',
            'bu_rent'=>'نوع العمليه',
            'bu_square'=>'المساحه'
        ];
    }
    function bu_place (){
        return[ "0"=>" اختار المنطقه",
               "2"=>" القاهرة", "3"=>"الأسكندرية",
               "40"=>" الغربية", "88"=>"أسيوط",
               "97"=>" أسوان", "45"=>"البحيرة",
               "82"=>" بني سويف", "50"=>"الدقهلية",
               "57"=>" دمياط", "84"=>" الفيوم",
               "64"=>" الإسماعيلية", "95"=>" الأقصر",
               "46"=>" مطروح", "86"=>" المنيا",
               "48"=>" المنوفية", "66"=>" بور سعيد",
               "13"=>" القليوبية", "96"=>" قنا",
               "55"=>" الشرقية", "93"=>" سوهاج",
               "69"=>"سيناء", "62"=>" السويس",
    ];
}