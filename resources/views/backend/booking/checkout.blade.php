<x-backend>
    <x-slot name="title">Booking Checkout Page</x-slot>
    <section class="info">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Info on Room
                </div>
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
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img src="{{ $room->image ? Storage::url($room->image) : asset('assets/img/no-profile.png') }}"
                            class="img-fluid shadow rounded" alt="Room Image">
                    </div>
                    <div class="col-md-8">
                        <h4 class="mb-3">Room Details</h4>

                        <div class="row mb-2">
                            <div class="col-4 fw-bold">Room Name:</div>
                            <div class="col-8">{{ $room->name }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4 fw-bold">Room Number:</div>
                            <div class="col-8">{{ $room->room_number }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4 fw-bold">Current Price:</div>
                            <div class="col-8 text-success">{{ $price }} BDT</div>
                        </div>
                    </div>
                </div>
                <div class="card-title">
                    Checkout Form
                </div>
                <form action="{{ route('admin.booking.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="start_date" value="{{ $checkIn }}">
                    <input type="hidden" name="end_date" value="{{ $checkOut }}">
                    <input type="hidden" name="price" value="{{ $room->price }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Check In</label>
                                <input type="date" class="form-control" name="start_date" value="{{ $checkIn }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Check Out</label>
                                <input type="date" class="form-control" name="end_date" value="{{ $checkOut }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Guest Name</label>
                        <input type="text" name="guest_name" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Guest Number</label>
                                <input type="text" name="guest_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Guest Email</label>
                                <input type="email" name="guest_email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Payment Type</label>
                                <select name="payment_type" class="form-control" required>
                                    <option value="cash">Cash</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Payment Status</label>
                                <select name="payment_status" class="form-control" required>
                                    <option value="unpaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Booking Status</label>
                                <select name="booking_status" class="form-control" required>
                                    <option value="pending">Pending</option>
                                    <option value="arrived">Arrived</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>

            </div>
        </div>
    </section>
</x-backend>
