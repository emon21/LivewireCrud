<!-- The Modal -->
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
                <form wire:submit.prevent="storeStudentData()">
                    <div class="d-flex gap-2 mb-3 mt-3 justify-content-between align-items-center">
                        <div class="mb-3 mt-3 w-50">
                            <label for="student_id" class="form-label">Student ID:</label>
                            <input type="number" class="form-control" id="student_id" placeholder="Enter Student ID"
                                wire:model="student_id">
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
                            wire:model="phone" max="11">
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
