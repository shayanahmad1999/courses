<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\contact;
use App\Models\coursedetail;

class FrontEndController extends Controller
{
    public function frontedabout()
    {
        return view('fronted.about');
    }
    public function frontedcontact()
    {
        return view('fronted.contact');
    }
    public function frontedcourse()
    {
        $course = course::all();
        $data = compact('course');
        return view('fronted.course')->with($data);
    }
    public function frontedcoursedetail($id)
    {
        $coursedetail = coursedetail::where('courseId', '=', "$id")->get();
        $join = coursedetail::join('courses', 'courses.courseId', '=', 'coursedetails.courseId')->get();
        return view('fronted.coursedetail',compact('coursedetail','join'));
    }
    public function storecontact(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);

        $contact = new contact;

        $contact->contactName = $request['name'];
        $contact->contactEmail = $request['email'];
        $contact->contactMessage = $request['message'];
        $contact->save();

        session()->flash('contact','You Contact us Successfully');
        return redirect('fronted/contact');

    }
}
