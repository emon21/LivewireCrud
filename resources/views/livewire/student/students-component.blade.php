<div>
    <style>
        .search-field {
            background-color: transparent;
            background-image: url(https://wp-themes.com/wp-content/themes/twentythirteen/images/search-icon.png);
            background-position: 5px center;
            background-repeat: no-repeat;
            background-size: 24px 24px;
            border: none;
            cursor: pointer;
            height: 40px;
            margin: 3px 0;
            padding: 0 0 0 34px;
            position: relative;
            transition: width 400ms ease, background 400ms ease;
            width: 0px;
            cursor: pointer;
        }

        .search-field:focus {
            background-color: #d4cece;
            border: 2px solid #c3c0ab;
            cursor: text;
            outline: 0;
            width: 250px;
            color: #fff;
        }

        .hide {
            display: none
        }


        .alert-success {
            background: #f4f4f4;
            color: #269612;
            border-radius: 4px;
            padding: 10px;
        }

    </style>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h3 class="text-success text-bold"><strong>Laravel LivewireCRUD with Bootstrap Modal</strong></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center p-3">
                        <h5 style="float: left;"><strong>All Students</strong></h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addStudentModal">
                            Create Student
                        </button>
                    </div>


                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center hide">{{ session('message') }}</div>
                        @endif
                        
                        <div class="alert alert-success hide">User Created successfully</div>

                        <div class="row mb-3">



                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                <label>
                                    <input type="search" class="search-field rounded" placeholder="Search …"
                                        wire:model.live="searchTerm" />
                                </label>

                                <input type="search" class="form-control w-25" placeholder="search"
                                    wire:model.live="searchTerm" style="float: right;" />
                            </div>
                        </div>


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary"
                                                    wire:click="viewStudentDetail({{ $student->id }})">View</button>
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click="EditStudent({{ $student->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="DeleteConfirm({{ $student->id }})">Delete</button>

                                                {{-- <button class="btn btn-danger btn-sm"
                                                    wire:click="DeleteConfirm({{ $student->id }})">
                                                    Delete
                                                </button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;"><small
                                                class="text-danger fw-bold">No Student Found</small>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    @include('livewire.student.add-student-modal')

    <!-- Edit Student Modal -->
    @include('livewire.student.edit-student-modal')

    <!-- Delete Student Modal -->
    @include('livewire.student.delete-student-modal')

    <!-- View Student Modal -->
    @include('livewire.student.view-student-modal')

</div>


@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: 'Student Created Successfully !!',
                showConfirmButton: false,
                timer: 1500
            });
            $('#addStudentModal').modal('hide');
            // $('#EditStudentModal').modal('hide');
            $('#DeleteStudentModal').modal('hide');
        });


        //Edit Student Data
        window.addEventListener('edit-student-modal', event => {
            $('#EditStudentModal').modal('show');
        });

        //Update Student 
        window.addEventListener('update-student', event => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: 'Student Update Successfully !!',
                showConfirmButton: false,
                timer: 1500
            });


            $('#EditStudentModal').modal('hide');

        });

        //Delete Student Data
        window.addEventListener('delete-student-modal', event => {
            $('#DeleteStudentModal').modal('show');
        });

        // Delete Message
        window.addEventListener('delete-student', event => {

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: 'Student Deleted Successfully !!',
                showConfirmButton: false,
                timer: 1500
            });

            $('#DeleteStudentModal').modal('hide');

        });

        // view Student Data
        window.addEventListener('view-student-modal', event => {
            $('#ViewStudentModal').modal('show');
        });


        $(document).ready(function() {
            // alert('hiiiii');
            $("#demo").click(function() {
                $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
                // alert('hiiiii');

            });
        });
    </script>
@endpush
