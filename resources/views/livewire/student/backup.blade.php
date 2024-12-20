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
                        {{-- <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
                            data-target="#addStudentModal">Add New Student</button> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Open modal
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
                                                    wire:click="editStudents({{ $student->id }})">Edit</button>
                                                {{-- <button class="btn btn-sm btn-danger"
                                                    wire:click="deleteConfirmation({{ $student->id }})">Delete</button> --}}

                                                <button class="btn btn-danger btn-sm"
                                                    wire:click="deleteConfirmation({{ $student->id }})">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>No Student Found</small>
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

    @include('livewire.student.add-student-modal')


</div>

@push('scripts')
    <script>
        // document.addEventListener('livewire:load', () => {
        //     // Listen for the `closeModal` event
        //     Livewire.on('closeModal', () => {
        //         const modal = new bootstrap.Modal(document.getElementById('myModal'));
        //         modal.hide();
        //         // const modalElement = document.getElementById('myModal');
        //         // const modalInstance = bootstrap.Modal.getInstance(modalElement);
        //         // modalInstance.hide(); // Close the modal
        //     });

        //     // Handle alert browser events
        //     window.addEventListener('alert', event => {
        //         alert(event.detail.message); // Display alert message
        //     });
        // });

        // document.addEventListener('livewire:load', () => {
        //     // Listen for the `closeModal` event
        //     Livewire.on('closeModal', () => {
        //         const modal = new bootstrap.Modal(document.getElementById('myModal'));
        //         modal.hide();
        //     });
        // });

        // window.livewire.on('close', () => {
        //     $('#myModal').modal('hide');
        // });

        window.addEventListener('btn-close', event => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
            $('#myModal').modal('hide');

        });

        // window.addEventListener('show-modal', event => {
        //     $('#myModal').modal('show');
        // })

        // window.addEventListener('alert', event => {
        //     alert(event.detail.message); // Display alert message
        // });

        // window.addEventListener('close-modal', event => {
        //     $('#myModal').modal('hide');
        // });

        // window.addEventListener('show-modal', event => {
        //     $('#myModal').modal('show');
        // })

        // window.addEventListener('btn-delete-confirmation', event => {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire({
        //                 title: "Deleted!",
        //                 text: "Your file has been deleted.",
        //                 icon: "success"
        //             });
        //         }
        //     });
        // });

        // window.addEventListener('close-modal', event => {
        //     $('#myModal').modal('hide');
        // });

        // window.addEventListener('show-modal', event => {
        //     $('#myModal').modal('show');
        // })


        // Delete Student
        // document.addEventListener('delete', event => {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire({
        //                 title: "Deleted!",
        //                 text: "Your file has been deleted.",
        //                 icon: "success"
        //             });
        //             // livewire.dispatch('delete')
        //         }
        //     })

        //     // Livewire.on('delete', () => {

        //     // })
        // })


        // Swal.fire({
        // title: "Are you sure?",
        // text: "You won't be able to revert this!",
        // icon: "warning",
        // showCancelButton: true,
        // confirmButtonColor: "#3085d6",
        // cancelButtonColor: "#d33",
        // confirmButtonText: "Yes, delete it!"
        // }).then((result) => {
        // if (result.isConfirmed) {
        //     Swal.fire({
        //         title: "Deleted!",
        //         text: "Your file has been deleted.",
        //         icon: "success"
        //     });
        // }
        // });


        document.addEventListener('livewire:load', () => {
            // Listen for the `confirmDelete` event
            Livewire.on('confirmDelete', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Trigger the Livewire method to delete the item
                        Livewire.dispatch('confirmedDelete');

                        // Optional success notification
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        );
                    }
                });
            });

            // Listen for the `itemDeleted` event (optional for additional UI updates)
            Livewire.on('deleteConfirmation', () => {
                Swal.fire(
                    'Deleted!',
                    'Your item has been successfully removed.',
                    'success'
                );
            });
        });
    </script>
@endpush
