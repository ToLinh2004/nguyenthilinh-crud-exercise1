<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentmanagementController extends Controller
{
    //
    private $students;
    public function __construct()
    {
        $this->students = new Student();
    }
    public function getAllStudent()
    {
        $students=Student::all();
        return view('qlhs', compact('students'));
    }
    public function addStudent()
    {
        return view('addStudent');
    }
    public function postStudent(Request $request)
    {

        $request->validate(
            [
                'nameStudent' => 'required|min:5',
                'phone' => 'required|numeric',
            ],
            [
                'nameStudent.required' => 'Họ và tên bắt buộc phải nhập',
                'nameStudent.min' => ' Họ và tên phải :min ký tự trở lên',
                'phone.required' => ' Số điện thoại bắt buộc phải nhập',
                'phone.numeric' => 'Số điện thoại phải đúng định dạng',
            ]
        );

        $dataInsert = [
            $request->nameStudent,    // nameStudent là tên input
            $request->phone
        ];
        $this->students->addStudent($dataInsert);
        return redirect()->route('allStudent')->with('msg', 'Thêm thành công');
    }
    public function deleteStudent($id){
        $idStudent=$id;
        $this->students->deleteStudents($idStudent);
        return redirect()->route('allStudent')->with('msg','Xóa thành công');
    }
    public function getDetailStudent(Request $request,$id){
        $studentDetail = $this->students->getDetail($id);
        $request->session()->put('id',$id);
        return view('updateStudent', compact('studentDetail'));
    }
    public function postUpdateStudent(Request $request)
    {
        $request->validate(
            [
                'nameStudent' => 'required|min:5',
                'phone' => 'required|numeric',
            ],
            [
                'nameStudent.required' => 'Họ và tên bắt buộc phải nhập',
                'nameStudent.min' => ' Họ và tên phải :min ký tự trở lên',
                'phone.required' => ' Số điện thoại bắt buộc phải nhập',
                'phone.numeric' => 'Số điện thoại phải đúng định dạng',
            ]
        );

        $dataUpdate = [
            $request->nameStudent,    // nameStudent là tên input
            $request->phone
        ];
        $id=session('id');

        $this->students->updateStudent($dataUpdate,$id);
        return redirect()->route('allStudent')->with('msg', 'Thêm thành công');
    }
    // public function searchStudent(Request $request){
    //     $keywword=$request->keywword;
    //     $resultSearch=$this->students->searchStudent($keywword);
    //     return view('search', compact('resultSearch'));
    // }
}
