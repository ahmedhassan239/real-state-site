<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bu_name'=>'required|min:5|max:100',
            'bu_price'=>'required|numeric',
            'bu_rent'=>'required|integer',
            'bu_square'=>'required|integer|min:2|max:255',
            'bu_type'=>'required|integer',
            'bu_small_dis'=>'required|min:4|max:160',
            'bu_meta'=>'required|min:4|max:200',
            'bu_langtuide'=>'required',
            'rooms'=>'required|integer',
            'bu_latitde'=>'required',
            'bu_large_dis'=>'required|min:5',
            'bu_status'=>'required|integer',
            'bu_place'=>'required|integer',
            'image'=>'required|mimes:png,jpg,jpeg'
        ];
    }


    public function attributes()
    {
        return [
            'bu_name'=>'اسم العقار',
            'bu_price'=>'سعر العقار',
            'bu_rent'=>'نوع العمليه',
            'bu_square'=>'مساحه العقار',
            'bu_type'=>'نوع العقار',
            'bu_small_dis'=>'وصف العقار لمحركات البحث',
            'bu_meta'=>'الكلمات الدلاليه',
            'bu_langtuide'=>'خط الطول',
            'rooms'=>'عدد الغرف',
            'bu_latitde'=>'خط العرض',
            'bu_large_dis'=>'وصف العقار',
            'bu_status'=>'الحاله',
            'bu_place'=>'المنطقه',
            'image'=>'الصوره'
        ];
    }
    function messages()
    {
        return [
            'required' => 'حقل  :attribute  مطلوب'
        ];
    }
}
