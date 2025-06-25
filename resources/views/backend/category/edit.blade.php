<x-backend>
    <x-slot name="title">Category edit</x-slot>

    <div class="d-flex justify-content-center my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('agent.category.update', $category->id) }}" method="POST">
                        @csrf

                        <select class="form-select" aria-label="Category Create" name="parent_id">
                            <option value="">No Category</option>
                            @foreach ($categories as $item)

                                <option value="{{ $item->id }}"
                                    
                                    {{ $item->id == $category->parent_id ? 'selected' : '' }}>
                                    {{ $item->category }}</option>
                            @endforeach
                        </select>
                        <div class="form-gorup">
                            <label for="category" class="form-label mt-3">Category Name</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Enter Category Name" value="{{ $category->category }}">
                        </div>
                        <div class="text-end  mt-3">
                            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-backend>
