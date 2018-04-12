<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
//use Auth;
use App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.add');
    }


    public function store(AddUserRequestAdmin $request, User $user)
    {
        $user->create([
            'admin'=>0,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/adminpanel/users')->withFlashMessage('تمت اضافه العضو بنجاح');
    }



    public function edit($id)
//,User $user
    {
//        $updated_at=null;
//        $user = $user->find($id);
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
        //return view('admin.user.edit',[user=>$user]);
    }


    public function update(User $user,$id,Request $request)
    {
        $userUpdated = $user->find($id);
        $userUpdated->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم التعديل علي العضو بنجاح');
    }


    public function updatepassword(Request $request ,User $user)
    {
        $userUpdate =$user->find($request->user_id);
        $password =bcrypt($request->password);
        $userUpdate->fill(['password'=>$password])->save();
        return Redirect::back()->withFlashMessage('تم تغير كلمه المرور بنجاح');
    }


    public function destroy($id, User $user)
    {
        if ($id !=1) {
            $user->find($id)->delete();
//            Bu::where('user_id',$id)->delete();
            return redirect('/adminpanel/users')->withFlashMessage('تم حذف العضو بنجاح');
        }else{
            return redirect('/adminpanel/users')->withFlashMessage('لا يمكن حذف العضويه رقم 1');
        }
    }


    public function anyData(Request $request)
    {
        /* Datatable function*/
        if ($request->ajax()) {
            $users = User::getUsersList($request->start, $request->draw, $request->length);
            return response()->json($users);
        }
    }
    }
