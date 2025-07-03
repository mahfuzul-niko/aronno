<x-backend>
    @php
        $startDate = $checkIn ?? now()->toDateString();
        $endDate = $checkOut ?? now()->toDateString();
    @endphp
    <x-slot name="title">Room Booking</x-slot>
    <section class="rooms">
        <div class="card">
            <div class="card-body">
                <div class="card-title">

                </div>
                <div class="mb-3 class card">
                    <div class="card-body">
                        <div class="card-title">
                            Look for rooms here And make Booking
                        </div>
                        <form action="{{ route('admin.booking.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Check In</label>
                                        <input type="date" class="form-control" name="check_in"
                                            value="{{ request('check_in') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Check Out</label>
                                        <input type="date" class="form-control" name="check_out"
                                            value="{{ request('check_out') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Category</label>
                                        <select name="category_id" id="" class="form-control">
                                            <option selected disabled>Select Category </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-danger"><i
                                        class="bi bi-arrow-counterclockwise"></i> Reset</a>
                                <button type="submit" class="btn btn-primary ">
                                    <i class="bi bi-search"></i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- @foreach ($rooms as $room)
                    <div class="room">
                        <h4>{{ $room->name }} ({{ $room->room_number }})</h4>

                        @if ($checkIn && $checkOut)
                            @if ($room->isAvailable($checkIn, $checkOut))
                                <span class="text-success">Available</span>
                            @else
                                <span class="text-danger">Unavailable</span>
                            @endif
                        @endif
                    </div>
                @endforeach --}}

                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="">{{ $room->room_number }}</div>

                                            @if ($room->isAvailable($startDate, $endDate))
                                                <div>
                                                    <form action="{{ route('admin.booking.checkout') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="check_in"
                                                            value="{{ $startDate }}">
                                                        <input type="hidden" name="check_out"
                                                            value="{{ $endDate }}">
                                                        <input type="hidden" name="room_id"
                                                            value="{{ $room->id }}">
                                                        <input type="hidden" name="price"
                                                            value="{{ $room->getPrice() }}">


                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="bi bi-plus-lg"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="d-flex gap-2">
                                                    <a href="#" class="btn btn-sm btn-info">
                                                        <i class="bi bi-eye"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.booking.make-available', $room->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to make this room Available?')"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-check-all"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <a href="{{ route('admin.room.view', $room) }}">
                                        <img src="{{ $room->image ? Storage::url($room->image) : asset('assets/img/no-profile.png') }}"
                                            alt="" class="img-fluid mb-2">
                                    </a><br>
                                    <a href="{{ route('admin.room.view', $room) }}">

                                        <strong>{{ $room->name }}</strong>
                                    </a>
                                    <div class="d-flex">
                                        <div class="text-success fw-bold">{{ $room->getPrice() }} BDT</div>
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::words($room->description, 20, '...') }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex gap-1">
                                            <i class="bi bi-balloon-heart"></i>
                                            {{ $room->view }}
                                        </div>
                                        <div class="d-flex gap-1">
                                            <i class="bi bi-person-hearts"></i>
                                            {{ $room->guest }}
                                        </div>
                                        <div class="d-flex gap-1">
                                            <i class="bi bi-droplet-half"></i>
                                            {{ $room->bathroom }}
                                        </div>
                                        <div class="d-flex gap-1">
                                            <i class="bi bi-slash-square"></i>
                                            {{ $room->area }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-backend>
