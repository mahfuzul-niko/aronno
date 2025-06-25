<x-backend>
    <x-slot name="title">Categories</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-md-6 ">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search category" name="q"
                                    value="{{ request('q') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6 text-end">
                        <a type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createCategory"><i class="bi bi-plus-circle"></i> Add Category</a>
                    </div>


                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Sub Categories</th>
                                    <th scope="col ">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="fw-bold">{{ $category->category }}</td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('agent.category.edit', $category->id) }}"
                                                class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>


                                            <form action="{{ route('agent.category.destroy', $category->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @if ($category->child->isNotEmpty())
                                        @foreach ($category->child as $key => $child)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>-- {{ $child->category }}</td>
                                                <td>
                                                    <a href="{{ route('agent.category.edit', $child->id) }}"
                                                        class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('agent.category.destroy', $child->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="createCategory" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createCategory">Create Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
    </div>
</x-backend>
