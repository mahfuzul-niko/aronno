<x-backend>
    <x-slot name="title">Product View</x-slot>

    <div class="card">
        <div class="d-flex justify-content-between align-items-start p-4 mb-3   ">
            <h5 class="card-title mb-3">{{ $product->name }}</h5>


            {{-- Edit Button --}}
            <a href="{{route('agent.product.edit',$product)}}" class="btn btn-warning d-flex align-items-center">
                <i class="bi bi-pencil me-2"></i> Edit Product
            </a>

        </div>
        <div class="card-body mb-3">
            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Category:</div>
                <div class="col-lg-10 col-md-8">{{ $product->category->category }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">SKU:</div>
                <div class="col-lg-10 col-md-8">{{ $product->sku }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Status:</div>
                <div class="col-lg-10 col-md-8">
                    <span class="{{ $product->status ? 'text-success' : 'text-danger' }}">
                        {{ $product->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Price:</div>
                <div class="col-lg-10 col-md-8">${{ number_format($product->price, 2) }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Discount:</div>
                <div class="col-lg-10 col-md-8">{{ $product->discount }}%</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Cost Price:</div>
                <div class="col-lg-10 col-md-8">${{ number_format($product->cost_price, 2) }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Quantity:</div>
                <div class="col-lg-10 col-md-8">{{ $product->quantity }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Unit:</div>
                <div class="col-lg-10 col-md-8">{{ $product->unit }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Created At:</div>
                <div class="col-lg-10 col-md-8">{{ $product->created_at->format('d M Y') }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Created By:</div>
                <div class="col-lg-10 col-md-8">{{ $product->user->name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-2 col-md-4 fw-bold">Description:</div>
                <div class="col-lg-10 col-md-8">{{ Str::limit($product->description, 150, '...') }}</div>
            </div>


        </div>
        <hr>
        <div class="card-body mt-3">
            <div class="row">
                {{-- Prime Image --}}
                <div class="col-12 mb-4">
                    <h5 class="mb-3">Prime Image:</h5>
                    <div class="col-md-6 mx-auto">
                        <img src="{{ $product->prime_image ? Storage::url($product->prime_image) : asset('assets/img/no-profile.png') }}"
                            alt="Prime Image" class="img-fluid rounded shadow-sm">
                    </div>
                </div>

                {{-- Extra Images --}}
                <div class="col-12">
                    <h5 class="mb-3">Extra Images:</h5>
                    <div class="row row-cols-2 row-cols-md-4 g-3">
                        @foreach ($product->images as $image)
                            <div class="col">
                                <img src="{{ Storage::url($image->image) }}" alt="Extra Image"
                                    class="img-fluid rounded shadow-sm">
                            </div>
                            {{-- <div class="col position-relative">
                                
                                <span class="position-absolute top-0 end-0 px-4 pt-2 text-danger" style="cursor: pointer;">
                                    <i class="bi bi-x-circle"></i>
                                </span>
                                <img src="{{ Storage::url($image->image) }}" alt="Extra Image"
                                    class="img-fluid rounded shadow-sm">
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-backend>
