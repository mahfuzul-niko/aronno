<x-backend>
    <x-slot name="title">Booking List</x-slot>
    <section class="rooms">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-4 col-sm-2">
                            {{-- <form action="">
                                <div class="d-flex gap-2 align-items-center">
                                    <input type="text" placeholder="search" class="form-control">
                                    <div class=""><button type="submit" class="btn btn-sm btn-primary"><i
                                                class="bi bi-search"></i></button></div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th>Room Number</th>
                            <th>Guest Name</th>
                            <th>Guest Number</th>
                            <th>Guest Email</th>
                            <th>Payable</th>
                            <th>Payment Status</th>
                            <th>Payment Type</th>
                            <th>Booking Status</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->guest_name }}</td>
                                <td>{{ $booking->guest_number }}</td>
                                <td>{{ $booking->guest_email }}</td>
                                <td>{{ $booking->price }}</td>
                                <td>
                                    <span
                                        class="badge rounded-pill 
        {{ $booking->payment_status == 'paid' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($booking->payment_status) }}
                                    </span>
                                </td>

                                <td>
                                    <span
                                        class="badge rounded-pill 
        {{ $booking->payment_type == 'cash' ? 'bg-primary' : 'bg-info' }}">
                                        {{ ucfirst($booking->payment_type) }}
                                    </span>
                                </td>

                                <td>
                                    <span
                                        class="badge rounded-pill 
        {{ $booking->booking_status == 'pending'
            ? 'bg-warning text-dark'
            : ($booking->booking_status == 'arrived'
                ? 'bg-success'
                : 'bg-secondary') }}">
                                        {{ ucfirst($booking->booking_status) }}
                                    </span>
                                </td>


                                <td>{{ $booking->start_date }}</td>
                                <td>{{ $booking->end_date }}</td>
                                {{-- <td>
                                    <a href="" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                </td> --}}

                            </tr>
                        @endforeach
                    </table>
                    {{ $bookings->links() }}
                </div>

            </div>
        </div>
    </section>
</x-backend>
