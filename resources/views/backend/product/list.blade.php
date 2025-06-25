<x-backend>
    <x-slot name="title">Products</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-md-6 ">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Products" name="q"
                                    value="{{ request('q') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('agent.product.list') }}" class="btn btn-danger"><i
                                class="bi bi-arrow-clockwise"></i></a>
                        <a href="{{ route('agent.product.create') }}" class="btn btn-success"><i
                                class="bi bi-plus-circle"></i> </a>
                        {{-- <a href="#" class="btn btn-info text-light"><i class="bi bi-sliders2-vertical"></i> </a> --}}
                    </div>


                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <form action="" method="GET">
                                    <tr>
                                        <th scope="col">N/L</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col"><a
                                                href="{{ route('agent.product.list', ['sort_by' => 'category_id', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                                                class="text-dark">Category
                                                @if ($sortBy == 'category_id')
                                                    <span class="text-primary"><i
                                                            class="bi bi-arrow-{{ $sortOrder == 'asc' ? 'up' : 'down' }}-short"></i></span>
                                                @endif
                                            </a>

                                        <th scope="col ">SKU</th>
                                        <th scope="col "><a
                                                href="{{ route('agent.product.list', ['sort_by' => 'quantity', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                                                class="text-dark">Quantity
                                                @if ($sortBy == 'quantity')
                                                    <span class="text-primary"><i
                                                            class="bi bi-arrow-{{ $sortOrder == 'asc' ? 'up' : 'down' }}-short"></i></span>
                                                @endif
                                            </a>
                                        </th>

                                        <th scope="col "><a
                                                href="{{ route('agent.product.list', ['sort_by' => 'status', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                                                class="text-dark">Status
                                                @if ($sortBy == 'status')
                                                    <span class="text-primary"><i
                                                            class="bi bi-arrow-{{ $sortOrder == 'asc' ? 'up' : 'down' }}-short"></i></span>
                                                @endif
                                            </a>
                                        <th scope="col "><a
                                                href="{{ route('agent.product.list', ['sort_by' => 'price', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                                                class="text-dark">Price
                                                @if ($sortBy == 'price')
                                                    <span class="text-primary"><i
                                                            class="bi bi-arrow-{{ $sortOrder == 'asc' ? 'up' : 'down' }}-short"></i></span>
                                                @endif
                                            </a>
                                        </th>
                                        <th scope="col "><a
                                                href="{{ route('agent.product.list', ['sort_by' => 'created_at', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                                                class="text-dark">Created
                                                @if ($sortBy == 'created_at')
                                                    <span class="text-primary"><i
                                                            class="bi bi-arrow-{{ $sortOrder == 'asc' ? 'up' : 'down' }}-short"></i></span>
                                                @endif
                                            </a>
                                        </th>
                                        <th scope="col ">Actions</th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @if ($products->count() == 0)
                                    <tr>
                                        <td colspan="10" class="text-center">No Products Found</td>
                                    </tr>
                                @endif
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                        </th>
                                        <td><img src="{{ $product->prime_image ? Storage::url($product->prime_image) : asset('assets/img/no-profile.png') }}"
                                                alt="" width="60px"></td>
                                        <td class="fw-bold">{{ $product->name }}</td>
                                        <td>{{ $product->category->category }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if ($product->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->created_at->format('j M Y') }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('agent.product.view', $product) }}"
                                                class="fw-bold btn btn-success">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('agent.product.edit', $product) }}"
                                                class="btn btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('agent.product.destroy', $product->id) }}"
                                                method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>




    </div>
</x-backend>
