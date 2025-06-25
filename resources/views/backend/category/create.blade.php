<x-backend>
    <x-slot name="title">Category Create</x-slot>

    <div class="d-flex justify-content-center my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Create Category
                </div>
                <div class="card-body mt-3">
                    <form action="{{ route('agent.category.store') }}" method="POST">
                        @csrf

                        <select class="form-select" aria-label="Category Create" name="parent_id">
                            <option selected value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <div class="form-gorup">
                            <label for="category" class="form-label mt-3">Category Name</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Enter Category Name">
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
