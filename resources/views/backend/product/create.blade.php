<x-backend>
    <x-slot name="title">Create Products</x-slot>
    <form action="{{ route('agent.product.store') }}" method="POST" enctype="multipart/form-data" class="row my-3">
        @csrf
        <div class="col-12">
            <h5 class="card-title">Create Product Errors</h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">General Product Information</h5>


                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFileMultiple" name="prime_image"
                                accept="image/*">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Images</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Product Title"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Category select" name="category_id" required>
                                <option selected disabled>Choose a category</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->category }}">
                                        @foreach ($category->child as $child)
                                            <option value="{{ $child->id }}">{{ $child->category }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" rows="5" id="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stock Information</h5>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Product Unit</label>
                        <div class="col-sm-8">
                            <select name="unit" id="unit" class="form-control">
                                <option selected disabled>Choose a unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Product Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="price" placeholder="Add Price" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Discound Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="discount" placeholder="Add discount %">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Cost Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="cost_price" placeholder="Cost Price"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Product Quantity</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="quantity"
                                placeholder="Product Quantity" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8 mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="productstatus"
                                    name="status" checked>
                                <label class="form-check-label" for="productstatus">Product status</label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product Options</h5>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Create Product</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-backend>
