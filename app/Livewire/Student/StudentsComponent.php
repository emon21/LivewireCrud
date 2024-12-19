<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentsComponent extends Component
{
    use WithPagination;

    public Student $student;

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
            'student_id' => 'required|unique:students', //students = table name
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




        $this->reset();
        $this->dispatch('btn-close');
    }


    public function resetInput()
    {
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->student_edit_id = '';
    }

    # Edit Student

    public function EditStudents($id)
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
        // ]);

        // $student = Student::find($this->student_edit_id);
        $student = Student::where('id', $this->student_edit_id)->first();

        //Add Student Data
        $student = new Student();
        $student->student_id = $this->student_id;
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;

        $student->save();

        session()->flash('message', 'Student has been Updated successfully');

        $this->dispatch('btn-close');
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

        $this->dispatch('btn-close');

        $this->student_delete_id = '';
    }

    public function cancel()
    {
        $this->student_delete_id = '';
    }

    public function render()
    {

        // Get All Students
        $students = Student::latest()->paginate(6);

        return view('livewire.student.students-component', ['students' => $students])->layout('layouts.base');
    }
}
