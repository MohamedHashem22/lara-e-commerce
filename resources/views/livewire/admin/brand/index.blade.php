<div>
@include('livewire.admin.brand.modalAddBrand')

@include('livewire.admin.brand.modalEditBrand')

@include('livewire.admin.brand.modalDeleteBrand')

<div class="row">
    <div class="col-md-12 ">

        <div class="card">
            <div class="card-header">
                <h3>
                    Brands List
                    <a href="" type="button" class="btn btn-primary  btn-sm  float-end " data-bs-toggle="modal"
                        data-bs-target="#exampleModal" style="padding: 10px; font-size:15px;">
                        + Add Brand
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->category->name }}
                            <td>{{ $brand->status == 0 ? 'visible' : 'hidden' }}
                            <td>
                                <a href="" wire:click="editBrand({{ $brand->id }})" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editModal">Edit</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" wire:click="deltetBrand({{ $brand->id }})">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <td colspan="5">Not Found Brands</td>
                        @endforelse

                    </tbody>
                </table>
                <br>
                {{ $brands->links() }}

            </div>
        </div>
    </div>
</div>
</div>



@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#exampleModal').modal('hide');
        $('#editModal').modal('hide');
        $('#deleteModal').modal('hide');

    });
</script>

@endpush
