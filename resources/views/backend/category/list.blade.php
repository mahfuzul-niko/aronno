<x-backend>
    <x-slot name="title">Categories</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class=" my-3">
                    <div class="col-md-6">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div>
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
                                    <th scope="col ">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="">{{ $category->title }}</td>
                                        <td>
                                            <div class="text-nowrap">
                                                <a class="btn btn-primary btn-sm d-inline-block" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#category{{ $category->id }}"><i
                                                        class="bi bi-pen"></i></a>
                                                <form action="{{ route('admin.category.delete', $category) }}"
                                                    method="POST" class="d-inline-block m-0 p-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="category{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update
                                                            baneer</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.category.update', $category) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-gorup">
                                                                <label for="category" class="form-label mt-3">Category
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="category" name="title"
                                                                    value="{{ $category->title }}"
                                                                    placeholder="Enter Category Name">
                                                            </div>
                                                            <div class="text-end  mt-3">

                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="createCategory" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createCategory">Create Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="form-gorup">
                                <label for="category" class="form-label mt-3">Category Name</label>
                                <input type="text" class="form-control" id="category" name="title"
                                    placeholder="Enter Category Name">
                            </div>
                            <div class="text-end  mt-3">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-backend>
