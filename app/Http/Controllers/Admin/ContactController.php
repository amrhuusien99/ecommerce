<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){

        $contacts = Contact::orderBy('id', 'DESC')->paginate(30);
        return view('admin.contacts.index', compact('contacts'));

    }

    public function delete($id){

        try{
            $contact = Contact::findOrFail($id);
            $contact->delete();
            flash()->success("Successed");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

}
