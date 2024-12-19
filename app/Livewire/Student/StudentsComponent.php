<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentsComponent extends Component
{
    use WithPagination;

    // public Student $student;

    public $student_id, $name, $email, $phone, $student_edit_id, $student_delete_id;

    public $view_student_id, $view_student_name, $view_student_email, $view_student_phone;

    public $searchTerm;

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'student_id' => 'required|unique:students,student_id,' . $this->student_edit_id . '', //Validation with ignoring own data
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
    }

    //Create Student
    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'student_id' => 'required', //students = table name
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);


        //Add Student Data
        $student = new Student();
        $student->student_id = $this->student_id;
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;
        $student->save();


        session()->flash('message', 'New student has been added successfully');

        // $this->reset();
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';

        //For hide modal after add student success
        $this->dispatch('close-modal');
    }


    public function resetInput()
    {
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->student_edit_id = '';
    }

    public function close()
    {
        $this->resetInput();
    }
    # Edit Student

    public function EditStudent($id)
    {

        $student = Student::where('id', $id)->first();

        $this->student_edit_id = $student->id;
        $this->student_id = $student->student_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;

        $this->dispatch('edit-student-modal');
    }

    # Update Student
    public function EditStudentData()
    {

        //validation code after added
        // $this->validate([
        //     'student_id' => 'required|unique:students,student_id,' . $this->student_edit_id . '',
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|numeric',
        // ]);f

        $this->validate([
            'student_id' => 'required|unique:students,student_id,' . $this->student_edit_id . '', //Validation with ignoring own data
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        // $student = Student::find($this->student_edit_id);
        $student = Student::where('id', $this->student_edit_id)->first();

        //Update Student Data

        $student->student_id = $this->student_id;
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;

        $student->save();

        session()->flash('message', 'Student has been Updated successfully');

        $this->dispatch('update-student');
    }


    # Delete Student

    public function DeleteConfirm($id)
    {

        $this->student_delete_id = $id; // student id

        $this->dispatch('delete-student-modal');
    }

    # Delete Process

    public function DeleteStudentData()
    {

        $student = Student::where('id', $this->student_delete_id)->first();
        $student->delete();

        session()->flash('message', 'Student has been deleted successfully');

        $this->dispatch('delete-student');

        $this->student_delete_id = '';
    }

    public function cancel()
    {
        $this->student_delete_id = '';
    }

    public function viewStudentDetail(Student $student)
    {

        // $student = Student::where('id', $id)->first();


        $this->view_student_id = $student->student_id;
        $this->view_student_name = $student->name;
        $this->view_student_email = $student->email;
        $this->view_student_phone = $student->phone;

        $this->dispatch('view-student-modal');
    }
    public function closeViewStudentModal()
    {
        $this->view_student_id = '';
        $this->view_student_name = '';
        $this->view_student_email = '';
        $this->view_student_phone = '';
    }

    public function render()
    {

        // Get All Students
        // $students = Student::latest()->paginate(6);

        // $students = Student::where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('email', 'like', '%' . $this->searchTerm . '%')->orWhere('student_id', 'like', '%' . $this->searchTerm . '%')->orWhere('phone', 'like', '%' . $this->searchTerm . '%')->paginate(6);

        // $students = Student::search($this->searchTerm)->paginate(6);
        return view('livewire.student.students-component', [
            'students' => Student::where('name', 'like', '%' . $this->searchTerm . '%')->paginate(6),
        ]);


        // return view('livewire.student.students-component', ['students' => $students])->extends('layouts.base');
        
        // return view('livewire.student.students-component', ['students' => $students])->layout('layouts.base');
    }
}
