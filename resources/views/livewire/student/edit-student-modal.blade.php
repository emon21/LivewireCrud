 <div wire:ignore.self class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
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
                            <div class="form-group">
                                <label for="student_id">Student ID</label>
                                <input type="number" class="form-control" wire:model="student_id" autocomplete="off" />
                                {{-- for validation --}}
                                @error('student_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
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
                        <div class="d-flex">
                            <div class="mb-3 mt-3 w-20">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    wire:model="email">
                                @error('email')
                                    <span class="text-danger py-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3 w-80">
                                <label for="phone" class="form-label">Phone No:</label>
                                <input type="number" class="form-control" id="phone" placeholder="Enter phone"
                                    wire:model="phone">
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