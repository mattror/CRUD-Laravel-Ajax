<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\students;

class StudentController extends Controller
{
    function view(){
        return view("students_view.view")->with('students',students::all());
    }

    function validated($req){
        $this->validate($req,[
            'name'=>'required|string|max:30',
            'sex'=>'required|string|max:6',
            'age'=>'required|int|max:150',
            'class'=>'required|string|max:5',
            'grade'=>'required',
            'photo *'=>'required|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
    }   

    function validate_image($req){
        $allowedImageExtension = ['jpg','png','jpeg','gif','webp','PNG'];
        $images = $req;
        $destPath = public_path('/images');
        $dbImage = '';
        foreach($images as $image){
            $imgName = $image->getClientOriginalName(); 
            $extension = $image->getClientOriginalExtension();
            $check = in_array($extension,$allowedImageExtension);
            $newImg = pathinfo($imgName, PATHINFO_FILENAME).'_'.rand().time().'.'.$extension.',';
            $dbImage .= $newImg;
            $image->move($destPath,substr($newImg,0,-1));
        }
        return $dbImage;
    }

    function add(request $req){
        $this->validated($req); 
        $stu = new students();
        $stu->name = $req->name;
        $stu->sex = $req->sex;
        $stu->age = $req->age;
        $stu->class = $req->class;
        $stu->grade = $req->grade;
        $stu->photo = substr($this->validate_image($req->file('photo')),0,-1);
        $stu->save();
        return $this->view();
    }

    function edit($id){
        return view('students_view.edit')->with('edit',students::find($id));
    }

    function update(request $req){
        $this->validated($req);
        
        $stu = students::find($req->id);
        $stu->name = $req->name;
        $stu->sex = $req->sex;
        $stu->age = $req->age;
        $stu->class = $req->class;
        $stu->grade = $req->grade;
        $stu->photo = substr($this->validate_image($req->file('photo')),0,-1);

        $stu->save();
        return $this->view();
    }

    function delete($id){
        students::find($id)->delete();
        return $this->view();
    }
}
