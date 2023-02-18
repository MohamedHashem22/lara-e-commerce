<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="updateBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Select Category</label>
                    <select wire:model.defer="category_id" class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" wire:model.defer="name" class="form-control" value="{{ old('name') }}">
                    @error('name')<small class="text-danger"> {{ $message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control" value="{{ old('slug') }}">
                    @error('slug')<small class="text-danger"> {{ $message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label>status</label>
                    <input type="checkbox" wire:model.defer="status"> <br>checked=hidden
                    @error('status')<small class="text-danger"> {{ $message }}</small>@enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="color: white;">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
</div>
