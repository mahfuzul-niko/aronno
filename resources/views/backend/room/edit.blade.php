<x-backend>
    <x-slot name="title">Edit Room</x-slot>
    <section class="create-room">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Edit Room Form</div>
                <div class="col-md-6">
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
                <form action="{{ route('admin.room.update', $room) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="">Room Number</label>
                            <input type="text" name="room_number" class="form-control" placeholder="...."
                                value="{{ $room->room_number }}" required>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="">Room Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $room->name }}"
                                placeholder="..........." required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="{{ $room->image ? Storage::url($room->image) : asset('assets/img/no-profile.png') }}"
                                class="img-fluid shadow mb-3" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option disabled {{ old('category_id', $room->category_id) ? '' : 'selected' }}>Select
                                Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $room->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $room->price }}"
                                placeholder="...." required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Per unit</label>
                            <input type="text" name="unit" class="form-control" value="{{ $room->unit }}"
                                placeholder="...." required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Discount Price</label>
                            <input type="number" name="discount_price" class="form-control"
                                value="{{ $room->discount_price }}" placeholder="....">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Discount Percent</label>
                            <input type="number" name="discount_percent" class="form-control"
                                value="{{ $room->discount_percent }}" placeholder="....">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5" id="" required>{{ $room->description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="">View</label>
                            <input type="text" name="view" class="form-control" value="{{ $room->view }}"
                                placeholder="....">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Guest</label>
                            <input type="number" name="guest" class="form-control" value="{{ $room->guest }}"
                                placeholder="....">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Bathroom</label>
                            <input type="number" name="bathroom" class="form-control"
                                value="{{ $room->bathroom }}" placeholder="....">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Area</label>
                            <input type="number" name="area" class="form-control" value="{{ $room->area }}"
                                placeholder="....">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
</x-backend>
