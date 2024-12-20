<div wire:ignore.self class="modal fade" id="ViewStudentModal" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Student Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        wire:click="closeViewStudentModal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID :</th>
                                <td>{{ $view_student_id }}</td>
                            </tr>

                            <tr>
                                <th>Name :</th>
                                <td>{{ $view_student_name }}</td>
                            </tr>

                            <tr>
                                <th>Email :</th>
                                <td>{{ $view_student_email }}</td>
                            </tr>

                            <tr>
                                <th>Phone :</th>
                                <td>{{ $view_student_phone }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>