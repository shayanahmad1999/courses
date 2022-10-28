<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Support\Facades\File;


class CourseController extends Controller
{
    public function courseform()
    {
        return view('backend.courses.addcourse');
    }
    public function coursestore(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'credithr'=>'required',
                'courseimage'=>'required'
            ]
        );

        $course = new course;

        $course->courseName = $request['name'];
        $course->courseCreditHr = $request['credithr'];
        $course->CourseDisc = $request['description'];

        $courseimage = time() . '-img.' . $request->file('courseimage')->getClientOriginalExtension();
        $course->courseImage = $request->file('courseimage')->move('uploads/',$courseimage);

        $course->save();
        session()->flash('course','Course Added Successfully');
        return redirect('backend/courses/addcourse');

    }
    public function coursview(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $course = course::where('courseName','LIKE',"%$search%")->orwhere('courseCreditHr','LIKE',"%$search%")->get();
        }
        else
        {
            $course = course::all();
        }
        $data = compact('course','search');
        return view('backend.courses.viewcourse')->with($data);
    }
    public function coursedelete($id)
    {
        $delete = course::find($id);
        if(!is_null($delete))
        {
            $delete->delete();
        }
        session()->flash('delete','Course delete Successfully');
        return redirect('backend/courses/viewcourse');
    }
    public function changestatus($id)
    {
        $status = course::select('courseStatus')->where('courseId',$id)->first();
        if($status->courseStatus == 1)
        {
            $changestatus = 0;
        }
        else
        {
            $changestatus = 1;
        }
        course::where('courseId',$id)->update(['courseStatus'=>$changestatus]);
        return redirect('backend/courses/viewcourse');
    }
    public function courseedit($id)
    {
        $course = course::find($id);
        if(is_null($course))
        {
            return redirect('backend/courses/viewcourse');
        }
        $data = compact('course');
        return view('backend.courses.editcourse')->with($data);
    }
    public function courseupdate($id, Request $request)
    {
        $course = course::find($id);

        $course->courseName = $request['name'];
        $course->courseCreditHr = $request['credithr'];
        $course->CourseDisc = $request['description'];
                            //form
        if($request->hasfile('courseimage'))
        {                                       //database
            $imageExist = 'uploads/' . $course->courseImage;
            if(File::exists($imageExist))
            {
                File::delete($imageExist);
            }
            $courseimage = time() . '-img.' . $request->file('courseimage')->getClientOriginalExtension();
            $course->courseImage = $request->file('courseimage')->move('uploads/',$courseimage);
        }
        $course->update();
        session()->flash('update','Course update Successfully');
        return redirect('backend/courses/viewcourse');
    }

}
