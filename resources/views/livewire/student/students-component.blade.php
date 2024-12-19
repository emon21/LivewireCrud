<div>
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
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif


                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="search" class="form-control w-25" placeholder="search"
                                    wire:model="searchTerm" style="float: right;" />
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
                                                    wire:click="viewStudentDetails({{ $student->id }})">View</button>
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
    <div wire:ignore.self class="modal fade" id="addStudentModal">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Student</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form wire:submit.prevent="storeStudentData">
                        <div class="d-flex gap-2 mb-3 mt-3 justify-content-between align-items-center">
                            <div class="mb-3 mt-3 w-50">
                                <label for="student_id" class="form-label">Student ID:</label>
                                <input type="number" class="form-control" id="student_id"
                                    placeholder="Enter Student ID" wire:model="student_id">
                                @error('student_id')
                                    <span class="text-danger py-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3 w-50">
                                <label for="name" class="form-label">Student Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter email"
                                    wire:model="name">
                                @error('name')
                                    <span class="text-danger py-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                wire:model="email">
                            @error('email')
                                <span class="text-danger py-3">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone No:</label>
                            <input type="number" class="form-control" id="phone" placeholder="Enter phone"
                                wire:model="phone">
                            @error('phone')
                                <span class="text-danger py-3">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div wire:ignore.self class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Student</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form wire:submit.prevent="EditStudentData">
                        <div class="d-flex gap-2 mb-3 mt-3 justify-content-between align-items-center">
                            <div class="mb-3 mt-3 w-25">
                                <label for="student_id" class="form-label">Student ID</label>
                                <input type="number" class="form-control" wire:model="student_id"
                                    autocomplete="off" />
                                <!-- for validation -->
                                @error('student_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3 w-75">
                                <label for="name" class="form-label">Student Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter email"
                                    wire:model="name">
                                <!-- for validation -->
                                @error('name')
                                    <span class="text-danger py-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-between align-items-center">
                            <div class="mb-3 mt-3 w-50">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    wire:model="email">
                                <!-- for validation -->
                                @error('email')
                                    <span class="text-danger py-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3 w-50">
                                <label for="phone" class="form-label">Phone No:</label>
                                <input type="number" class="form-control" id="phone" placeholder="Enter phone"
                                    wire:model="phone">
                                <!-- for validation -->
                                @error('phone')
                                    <span class="text-danger py-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this student?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click="cancel()" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="DeleteStudentData()">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div>

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
    </script>
@endpush
