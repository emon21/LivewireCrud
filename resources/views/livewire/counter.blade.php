
<div class="container my-4">
    <h2 class="pb-4 text-center text-success">Nothing in the world is as soft and yielding as water.</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="pt-1">All Info</h2>
            <a href="#" class="btn btn-success float-end py-2 px-3">Create User</a>
        </div>
        <div class="card-body">
            <h2 class="text-danger text-bold"> Total Number : {{ $count }}</h2>
            <div class="d-flex gap-2">
                <button wire:click="increment" class="btn btn-success py-2 px-4">+ Add Number</button>
                <button wire:click="decrement" class="btn btn-danger py-2 px-4">- Sub Number</button>
            </div>
        </div>
        <div class="card-footer">Footer</div>
    </div>

</div>
