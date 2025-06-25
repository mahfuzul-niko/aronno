<x-backend>
    <x-slot name="title">Products</x-slot>
    <section class="my-3">
        <div class="card p-3">
            <div class="row">
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
                    <a href="{{ route('agent.product.grid') }}" class="btn btn-danger"><i
                            class="bi bi-arrow-clockwise"></i></a>
                    <a href="{{ route('agent.product.create') }}" class="btn btn-success"><i
                            class="bi bi-plus-circle"></i> </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card p-2">
                        <div class="card-body mt-2">
                            <div class="text-center">
                                <img src="{{ $product->prime_image ? Storage::url($product->prime_image) : asset('assets/img/no-profile.png') }}"
                                    alt="" class="img-fluid" style="height: 200px;">
                            </div>
                            <div class="fw-bold mt-2">{{ $product->name }} (<span
                                    class="test-secondary fw-light">{{ $product->sku }}</span>)</div>
                            <div class="text-secondary">{{ $product->category->category }}</div>
                            <div class="d-flex justify-content-between">
                                <div class="text-secondary">Price: {{ $product->price }}</div>
                                <div class="text-secondary">Quantity: {{ $product->quantity }}</div>
                            </div>
                            <div class="text-secondary">
                                {{ \Illuminate\Support\Str::words($product->description, 20, '...') }}
                            </div>

                        </div>
                        <div class="px-3 py-2 border-top text-end">
                            <ul class="list-inline mb-0">

                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agent.product.view', $product) }}"
                                        class="fw-bold btn btn-success"><i class="bi bi-eye"></i> </a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="{{ route('agent.product.edit', $product) }}"
                                        class="fw-bold btn btn-warning"><i class="bi bi-pencil"></i> </a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <form action="{{ route('agent.product.destroy', $product) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section>
        <div class="card">
            <div class="card-body pt-4">
                {{ $products->links() }}
            </div>
        </div>
    </section>

</x-backend>
