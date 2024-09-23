{{-- DELETE --}}
<div class="modal fade" id="delete-category{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h4"><i class="fa-solid fa-trash-can"></i> Delete Ctegory</h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete                
                <strong>{{ $category->name }}</strong> category?
                <br><br>
                This action will affect all the posts under this category. Posts without a category will fall under Uncategorized.
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.categories.delete', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- EDIT --}}
<div class="modal fade" id="edit-category{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h3 class="h4"><i class="fa-solid fa-pen-to-square"></i> Edit Ctegory</h3>
            </div>
            
            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input type="text" name="name{{ $category->id }}" value="{{ old('name'.$category->id, $category->name) }}" class="form-control">
                @error('name'.$category->id)
                    <p class="mb-0 text-danger small">{{ $message }}</p>
                @enderror
                </div>
            
                <div class="modal-footer">                
                        <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-warning">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>                    
                </div>
            </form>
        </div>
    </div>
</div>