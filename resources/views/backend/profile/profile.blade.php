<x-backend>
    <x-slot name="title">Profile</x-slot>


    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('assets/img/no-profile.png') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ auth()->user()->name }} </h2>
                        <h3>{{ auth()->user()->role->name }}</h3>
                        <div class="social-links mt-2">
                            <a href="{{auth()->user()->social('twitter')}}" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="{{auth()->user()->social('facebook')}}" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="{{auth()->user()->social('instagram')}}" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="{{auth()->user()->social('linkedin')}}" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change
                                    Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{auth()->user()->name}} </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{auth()->user()->address}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{auth()->user()->phone}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{auth()->user()->email}}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form action="{{ route('profile.update-password') }}" method="POST">
                                    @method('POST')
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password" class="form-control"
                                                id="currentPassword">
                                            @error('current_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control"
                                                id="newPassword">
                                            @error('new_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password_confirmation" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>


                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ route('profile.update-profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('assets/img/no-profile.png') }}"
                                                alt="Profile">
                                            <div class="input-group mb-3 mt-2">
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" id="profileImage"
                                                        name="avatar">
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('profile.removeAvatar') }}"
                                                        class="btn btn-danger ms-3">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control"
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control"
                                                value="{{ auth()->user()->address }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control"
                                                value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control"
                                                value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="social[twitter]" type="text" class="form-control"
                                                value="{{ json_decode(auth()->user()->social, true)['twitter'] ?? 'https://twitter.com/#' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="social[facebook]" type="text" class="form-control"
                                                value="{{ json_decode(auth()->user()->social, true)['facebook'] ?? 'https://facebook.com/#' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="social[instagram]" type="text" class="form-control"
                                                value="{{ json_decode(auth()->user()->social, true)['instagram'] ?? 'https://instagram.com/#' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">LinkedIn</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="social[linkedin]" type="text" class="form-control"
                                                value="{{ json_decode(auth()->user()->social, true)['linkedin'] ?? 'https://linkedin.com/#' }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->

                            </div>





                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</x-backend>
