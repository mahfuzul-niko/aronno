<x-backend>
    <x-slot name="title">Units</x-slot>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-md-6 ">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search unit" name="q"
                                    value="{{ request('q') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6 text-end">
                        <a type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createUnits"><i class="bi bi-plus-circle"></i> Add Units</a>
                    </div>


                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Unit Name</th>
                                    <th scope="col">Unit symbol</th>
                                    <th scope="col ">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $key => $unit)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="fw-bold">{{ $unit->name }}</td>
                                        <td></td>
                                        <td>


                                            <form action="{{ route('agent.unit.destroy', $unit->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
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


        <!-- Modal -->
        <div class="modal fade" id="createUnits" tabindex="-1" aria-labelledby="createUnits" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createUnits">Create Unit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('agent.unit.store') }}" method="POST">
                            @csrf
                            <div class="form-gorup">
                                <label for="unit" class="form-label mt-3">Unit Name</label>
                                <input type="text" class="form-control" id="unit" name="name"
                                    placeholder="Enter Unit Name">
                            </div>
                            <div class="form-gorup">
                                <label for="symbol" class="form-label mt-3">Unit Symbol</label>
                                <input type="text" class="form-control" id="symbol" name="symbol"
                                    placeholder="Enter Unit Symbol">
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
