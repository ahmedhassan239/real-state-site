<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ContactsController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }


    public function store(ContactRequest $contactRequest ,  Contact $contactus)
    {
        $contactus->create($contactRequest->all());
        return Redirect::back()->withFlashMessage('تم ارسال رسالتك الينا بنجاح');
    }


    public function anyData(Request $request)
    {
        /* Datatable function*/
        if ($request->ajax()) {
            $contact= Contact::getContactList($request->start, $request->draw, $request->length);
            return response()->json($contact);
        }
    }

    public function edit($id )
    {
        $contact =Contact::find($id);
        $contact->fill(['view'=>1])->save();

        return view ('admin.contact.edit',compact('contact'));
    }


    public function update($id ,Contact $contact ,Request $request)
    {
        $contactupdate = Contact::find($id);
        $contactupdate->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم التعديل علي الرساله بنجاح');
    }


    public function destroy($id, Contact $contact)
    {
        $contact->find($id)->delete();
        return redirect('/adminpanel/contact')->withFlashMessage('تم حذف الرساله بنجاح');
    }

}


