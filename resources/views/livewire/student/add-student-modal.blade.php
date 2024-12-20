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

                    <div class="d-flex gap-2 my-3">
                        <div class="form-group col-sm-2">
                            <label for="student_id" class="form-label">Student ID : </label>
                        </div>
                        <div class="form-group col-sm-5">
                            <input type="number" id="student_id"
                                class="form-control @error('student_id') is-invalid @enderror"
                                placeholder="Enter Student ID" wire:model="student_id">
                            @error('student_id')
                                <span class="text-danger py-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 my-3">
                        <div class="form-group col-sm-2">
                            <label for="name" class="form-label">Name : </label>
                        </div>
                        <div class="form-group col-sm-10">
                            <input type="text" id="name" class="form-control @error('student_id') is-invalid @enderror w-75" placeholder="Enter Name..." wire:model="name">
                            @error('name')
                                <span class="text-danger py-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 my-3">
                        <div class="form-group col-sm-2">
                            <label for="email" class="form-label">Email : </label>
                        </div>
                        <div class="form-group col-sm-10">
                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email ID..." wire:model="email">
                            @error('email')
                                <span class="text-danger py-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 my-3">
                        <div class="form-group col-sm-2">
                            <label for="phone" class="form-label">Phone No : </label>
                        </div>
                        <div class="form-group col-sm-10">
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror w-50" placeholder="Enter Phone No..." wire:model="phone">
                            @error('phone')
                                <span class="text-danger py-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check col-sm-4" style="margin-left:105px">

                        <button type="submit" class="btn btn-outline-success">Create Student</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
