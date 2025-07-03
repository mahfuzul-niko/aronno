<x-backend>
    <x-slot name="title">View Room</x-slot>
    <section class="view-room">

        <div class="card">

            <div class="card-body">

                <div class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            {{ $room->room_number }}
                        </div>
                        <div class="text-end mt-3">
                            <a href="{{ route('admin.room.edit', $room) }}" class="btn btn-warning "><i
                                    class="bi bi-pencil-square"></i> Edit Room</a>
                            <form action="{{ route('admin.room.delete', $room) }}" method="POST"
                                class="d-inline-block m-0 p-0"
                                onsubmit="return confirm('Are you sure you want to delete this room?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete Room
                                </button>
                            </form>

                        </div>
                    </div>


                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-md-6">
                        <img src="{{ $room->image ? Storage::url($room->image) : asset('assets/img/no-profile.png') }}"
                            class="img-fluid shadow" alt="">
                    </div>
                </div>
                <div class="my-3">
                    <div class="text-center fw-bold">
                        <h5 class="mb-3 text-primary">Room Pricing Details</h5>

                        <div class="d-flex justify-content-center flex-column align-items-center"
                            style="max-width: 300px; margin: 0 auto;">
                            <div class="d-flex justify-content-between w-100 mb-2">
                                <span class="text-muted">Selling Price:</span>
                                <span class="text-success">{{ $room->getPrice() }} Taka</span>
                            </div>

                            <div class="d-flex justify-content-between w-100 mb-2">
                                <span class="text-muted">Original Price:</span>
                                <span class="text-dark">{{ $room->price }} Taka</span>
                            </div>

                            <div class="d-flex justify-content-between w-100 mb-2">
                                <span class="text-muted">Discount Price:</span>
                                <span class="text-danger">{{ $room->discount_price ?? 'N/A' }} Taka</span>
                            </div>

                            <div class="d-flex justify-content-between w-100">
                                <span class="text-muted">Discount Percent:</span>
                                <span class="text-warning">{{ $room->discount_percent ?? 'N/A' }}%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <table class="table table-bordered border-info">
                        <tr>
                            <th class="col-2">Room Name</th>
                            <td><strong>{{ $room->name }}</strong></td>
                        </tr>

                        <tr>
                            <th class="col-2">Room Description</th>
                            <td><strong>{{ $room->description }}</strong></td>
                        </tr>
                        <tr>
                            <th class="col-2">Room View</th>
                            <td><strong>{{ $room->view }}</strong></td>
                        </tr>
                        <tr>
                            <th class="col-2">Room Guest</th>
                            <td><strong>{{ $room->guest }}</strong></td>
                        </tr>
                        <tr>
                            <th class="col-2">Room Bathroom</th>
                            <td><strong>{{ $room->bathroom }}</strong></td>
                        </tr>
                        <tr>
                            <th class="col-2">Room Area</th>
                            <td><strong>{{ $room->area }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-backend>
