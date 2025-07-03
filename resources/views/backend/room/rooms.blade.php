<x-backend>
    <x-slot name="title">Rooms</x-slot>
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
                        <div class="col-md-8 text-end mt-3">
                            <a href="{{ route('admin.room.create') }}" class="btn btn-success mb-3"><i
                                    class="bi bi-plus-circle"></i> Add
                                Room</a>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="">{{ $room->room_number }}</div>
                                            <div class=""><button type="submit" class="btn btn-sm btn-success"><i
                                                        class="bi bi-plus-lg"></i></button></div>
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
