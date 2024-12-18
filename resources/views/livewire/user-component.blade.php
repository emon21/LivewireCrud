{{-- <div>
    Knowing others is intelligence; knowing yourself is true wisdom.
</div> --}}

<div class="container my-5">
    <h2 class="text-center text-danger">Hello From Our First Livewire Component!</h2>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form class="form" action="" wire:submit="UserCreate">
        <div class="form-group mb-3 mt-3">
            <label for="name" class="form-label">User Name:</label>
            <input type="text" class="form-control" id="name" wire:model="userName"
                placeholder="Enter User Name...">
            @error('userName')
                <span class="text-danger my-2"> {{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

    <div class="shadow p-4 my-3">
        <h2 class="pt-3">All Information :- </h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-success">
                    <th>#SL No</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AllUser as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->userName }}</td>
                        <td>
                            <a href="{{ $item->id }}" class="btn btn-success">Edit</a>
                            <a href="{{ $item->id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $AllUser->links() }}
    </div>

</div>
