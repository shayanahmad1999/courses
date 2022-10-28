<?php

namespace App\Http\Controllers;

use App\Models\coursedetail;
use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Support\Facades\File;

class CourseDetailController extends Controller
{
    public function courseDetailView($id)
    {
        $course = course::find($id);
        return view('backend.coursedetail.add',compact('course'));
    }
    public function courseDetailAdd(Request $request)
    {
        $request->validate(
            [
                'lesson'=>'required',
                'topic'=>'required',
                'video'=>'required',
                'file'=>'required',
                'duration'=>'required'
            ]
        );
        $courseDetail = new coursedetail;
        $courseDetail->cdLesson = $request->lesson;
        $courseDetail->cdTopic = $request->topic;
        $courseDetail->cdDesc= $request->description;
        $courseDetail->cdDuration= $request->duration;
        $courseDetail->cdVideo = $request->video;
        $courseDetail->courseId = $request->courseid;
        $file = time() . '-file.' . $request->file('file')->getClientOriginalExtension();
        $courseDetail->cdFile = $request->file('file')->move('uploads/',$file);
        $courseDetail->save();
        session()->flash('course','Course Detail Add Successfuly');
        return redirect('backend/coursedetail/view');

    }
    public function courseDetailShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $courseDetail = coursedetail::join('courses','courses.courseId','=','coursedetails.courseId')
            ->where('courseName','LIKE',"%$search%")
            ->orwhere('cdTopic','LIKE',"%$search%")
            ->orwhere('cdLesson','LIKE',"%$search%")
            ->paginate(3);
        }
        else
        {
            $courseDetail = coursedetail::join('courses','courses.courseId','=','coursedetails.courseId')->paginate(3);
        }
        return view('backend.coursedetail.view',compact('courseDetail'));
    }
    public function courseDetailDelete($id)
    {
        $deletes = coursedetail::find($id);
        if(!is_null($deletes))
        {
            $deletes->delete();
        }
        session()->flash('delete','Record Delete Successfully');
        return redirect('backend/coursedetail/view');
    }
    public function courseDetailEdit($id)
    {
        $edit = coursedetail::find($id);
        if(is_null($edit))
        {
            return view('backend.coursedetail.view');
        }
        else
        {
            return view('backend.coursedetail.edit',compact('edit'));
        }
    }
    public function courseDetailUpdate($id , Request $request)
    {
        $courseDetail = coursedetail::find($id);
        $courseDetail->cdLesson = $request->lesson;
        $courseDetail->cdTopic = $request->topic;
        $courseDetail->cdDesc= $request->description;
        $courseDetail->cdDuration= $request->duration;
        $courseDetail->cdVideo = $request->video;
        $courseDetail->courseId = $request->courseid;
                            //form
        if($request->hasfile('file'))
        {                                           //database
            $fileExit = 'uploads/' . $courseDetail->cdFile;
            if(File::exists($fileExit))
            {
                File::delete($fileExit);
            }
            $file = time() . '-file.' . $request->file('file')->getClientOriginalExtension();
            $courseDetail->cdFile = $request->file('file')->move('uploads/',$file);
        }
       $courseDetail->update();
       session()->flash('update','Record Update Successfully');
       return redirect('backend/coursedetail/view');
    }
}
