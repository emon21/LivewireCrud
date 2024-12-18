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


        // $this->student_id = '';
        // $this->name = '';
        // $this->email = '';
        // $this->phone = '';

        $this->reset();
        //For hide modal after add student success
        // $this->emit('close-modal');
        // $this->emit('closeModal');
        // Emit an event to close the modal
        // $this->emit('closeModal');

        // Optional: Add a success message
        // $this->dispatchBrowserEvent('alert',
        //     ['message' => 'Data saved successfully!']
        // );

        $this->dispatch('btn-close', ['message' => 'Data saved successfully!']);
    }

    public function resetInputs()
    {
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->student_edit_id = '';
    }


    public function close()
    {
        $this->resetInputs();
    }


    //Edit Student

    public function editStudents($id)
    {
        $student = Student::where('id', $id)->first();


        $this->student_edit_id = $student->id;
        $this->student_id = $student->student_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;

        $this->dispatchBrowserEvent('show-edit-student-modal');
    }

    public function editStudentData()
    {
        //on form submit validation
        $this->validate([
            'student_id' => 'required|unique:students,student_id,' . $this->student_edit_id . '', //Validation with ignoring own data
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);


        $student = Student::where('id', $this->student_edit_id)->first();
        $student->student_id = $this->student_id;
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;


        $student->save();


        session()->flash('message', 'Student has been updated successfully');


        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }


    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->student_delete_id = $id; //student id


        // $this->dispatchBrowserEvent('show-delete-confirmation-modal');

        // $student = Student::where('id', $this->student_delete_id)->first();
        // $student->delete();

        // session()->flash('message', 'Student has been deleted successfully');

        // $this->dispatchBrowserEvent('show-delete-confirmation-modal');
        // $this->dispatch('btn-delete-confirmation', ['message' => 'Data saved successfully!']);
        // $this->dispatch('delete');

        $this->dispatch('confirmDelete');
        
    }


    public function confirmDelete()
    {
        // $student = Student::where('id', $this->student_delete_id)->first();
        // $student->delete();

        Student::destroy($this->student_delete_id);

        session()->flash('message', 'Student has been deleted successfully');

        // $this->dispatchBrowserEvent('close-modal');
        // $this->dispatch('btn-close', ['message' => 'Data saved successfully!']);
        // $this->dispatch('btn-close');

        $this->dispatch('itemDeleted');

        // $this->student_delete_id = '';
    }


    public function cancel()
    {
        $this->student_delete_id = '';
    }


    public function viewStudentDetails($id)
    {
        $student = Student::where('id', $id)->first();


        $this->view_student_id = $student->student_id;
        $this->view_student_name = $student->name;
        $this->view_student_email = $student->email;
        $this->view_student_phone = $student->phone;


        $this->dispatchBrowserEvent('show-view-student-modal');
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
        // return view('livewire.student.students-component');

        //Get all students
        // $students = Student::where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('email', 'like', '%' . $this->searchTerm . '%')->orWhere('student_id', 'like', '%' . $this->searchTerm . '%')->orWhere('phone', 'like', '%' . $this->searchTerm . '%')->get();

        $students = Student::latest()->paginate(6);

        return view('livewire.student.students-component', ['students' => $students])->layout('layouts.base');
    }
}
