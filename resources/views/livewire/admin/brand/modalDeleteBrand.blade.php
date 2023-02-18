<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <h4>Are You Sure You Want To Delete This Brand?</h4>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="color: white;">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cansel</button>
                </div>
            </form>
        </div>
    </div>
</div>
