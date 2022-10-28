<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    public function contactview(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $contact = contact::where('contactName','LIKE',"%$search%")->orwhere('contactEmail','LIKE',"%$search%")->get();
        }
        else{
        $contact = contact::all();
        }
        return view('backend.contact.viewcontact',compact('contact','search'));
    }
    public function contactdelete($id)
    {
        $delete = contact::find($id);
        if(!is_null($delete))
        {
            $delete->delete();
        }
        session()->flash('delete','contact delete successfully');
        return redirect('backend/contact/viewcontact');
    }
}
