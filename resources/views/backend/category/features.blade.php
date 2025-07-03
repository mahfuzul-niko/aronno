<x-backend>
    <x-slot name="title">Room Features</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="my-3">
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
                        <a type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                            data-bs-target="#createFeature"><i class="bi bi-plus-circle"></i> Add Feature</a>
                    </div>
                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Features Logo</th>
                                    <th scope="col">Features Title</th>
                                    <th scope="col ">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $key => $feature)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="">{{ $feature->title }}</td>
                                        <td><img src="{{ $feature->image ? Storage::url($feature->image) : asset('assets/img/no-profile.png') }}"
                                                style="height: 50px; width: auto;" alt=""></td>
                                        <td>
                                            <div class="text-nowrap">
                                                <a class="btn btn-primary btn-sm d-inline-block" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#feature{{ $feature->id }}"><i
                                                        class="bi bi-pen"></i></a>
                                                <form action="{{ route('admin.feature.delete', $feature) }}"
                                                    method="POST" class="d-inline-block m-0 p-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="feature{{ $feature->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update
                                                            feature</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.feature.update', $feature) }}" enctype="multipart/form-data"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-gorup mb-3">
                                                                <label for="feature" class="form-label ">feature
                                                                    Title</label>
                                                                <input type="text" class="form-control"
                                                                    id="feature" name="title"
                                                                    value="{{ $feature->title }}"
                                                                    placeholder="Enter feature Name">
                                                            </div>
                                                            <div class="form-gorup mb-3">
                                                                <label for="feature" class="form-label ">feature
                                                                    Image</label>
                                                                <input type="file" class="form-control"
                                                                    name="image">
                                                            </div>

                                                            <div class="text-end">

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

        <div class="modal fade" id="createFeature" tabindex="-1" aria-labelledby="createFeature" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createFeature">Create feature</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.feature.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-gorup mb-3">
                                <label for="feature" class="form-label ">Feature
                                    Title</label>
                                <input type="text" class="form-control" id="feature" name="title"
                                    placeholder="Enter feature Name">
                            </div>
                            <div class="form-gorup mb-3">
                                <label for="feature" class="form-label ">Feature
                                    Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="text-end  ">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-backend>
