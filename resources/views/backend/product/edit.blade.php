<x-backend>
    <x-slot name="title">Edit Product</x-slot>
    <form action="{{ route('agent.product.update', $product) }}" method="POST" enctype="multipart/form-data"
        class="row my-3">
        @csrf
        <div class="col-12">
            <h5 class="card-title">Edit Product Errors</h5>
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
                                value="{{ $product->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Category select" name="category_id" required>
                                <option disabled>Choose a category</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->category }}">
                                        @foreach ($category->child as $child)
                                            <option value="{{ $child->id }}"
                                                {{ $product->category->id == $child->id ? 'selected' : '' }}>
                                                {{ $child->category }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" rows="5" id="" class="form-control">{{ $product->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body mt-3">
                    <div class="row">
                        {{-- Prime Image --}}
                        <div class="col-12 mb-4">
                            <h5 class="mb-3">Prime Image:</h5>
                            <div class="col-md-4 mx-auto">

                                <img src="{{ $product->prime_image ? Storage::url($product->prime_image) : asset('assets/img/no-profile.png') }}"
                                    alt="Prime Image" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>

                        {{-- Extra Images --}}
                        <div class="col-12">
                            <h5 class="mb-3">Extra Images:</h5>
                            <div class="row row-cols-2 row-cols-md-4 g-3">
                                @foreach ($product->images as $image)
                                    <div class="col position-relative">
                                        <a class="position-absolute top-0 end-0 px-4 pt-2 text-danger"
                                            style="cursor: pointer;" onclick="submitDeleteForm({{ $image->id }})">
                                            <i class="bi bi-x-circle"></i>
                                        </a>
                                        <img src="{{ Storage::url($image->image) }}" alt="Extra Image"
                                            class="img-fluid rounded shadow-sm">
                                    </div>
                                @endforeach


                            </div>
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
                                <option disabled>Choose a unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->name }}"
                                        {{ $product->unit == $unit->name ? 'selected' : '' }}>{{ $unit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Product Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="price" placeholder="Add Price"
                                value="{{ $product->price }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Discound Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="discount"
                                value="{{ $product->discount }}" placeholder="Add discount %">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Cost Price</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="cost_price"
                                value="{{ $product->cost_price }}" placeholder="Cost Price" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Product Quantity</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="quantity"
                                placeholder="Product Quantity" value="{{ $product->quantity }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8 mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="productstatus"
                                    name="status" {{ $product->status ? 'checked' : '' }}>
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
                        <button type="submit" class="btn btn-success">Update Product</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="deleteImageForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <script>
        function submitDeleteForm(imageId) {
            const form = document.getElementById('deleteImageForm');
            form.action = `/agent/delete/product/image/${imageId}`;
            form.submit();
        }
    </script>
    


</x-backend>
