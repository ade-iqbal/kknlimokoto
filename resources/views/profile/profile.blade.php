<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                                <img src="{{ $profileImage ?? asset('images/avatars/01.png')}}" alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_1.png')}}" alt="User-Profile"
                                    class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_2.png')}}" alt="User-Profile"
                                    class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_4.png')}}" alt="User-Profile"
                                    class="theme-color-green-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_5.png')}}" alt="User-Profile"
                                    class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_3.png')}}" alt="User-Profile"
                                    class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                            </div>
                            <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                <h4 class="me-2 h4">{{ auth()->user()->name  }}</h4>
                                <span class="text-capitalize text-dark"> - Kepala Jorong
                                    {{ str_replace('_',' ',auth()->user()->jorong->name) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="profile-content tab-content">
                <div id="profile-profile" class="tab-pane fade active show">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Profil</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('update.profile') }}">
                                {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="inputName" class="form-label text-dark">Nama<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control text-dark @if ($errors->has('name')) is-invalid @endif"
                                        id="inputName" name="name" placeholder="Masukkan data nama"
                                        value="{{ old('name') ?? auth()->user()->name }}" required>
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="inputUsername" class="form-label text-dark">Username<sup class="text-danger">*</sup></label>
                                    <input type="text"
                                        class="form-control text-dark @if ($errors->has('username')) is-invalid @endif"
                                        id="inputUsername" name="username" placeholder="Masukkan data username"
                                        value="{{ old('username') ?? auth()->user()->username }}" required>
                                    @if ($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Perbarui data</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('changed'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('changed') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('update.password') }}">
                                {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="inputOldPassword" class="form-label text-dark">Password Lama</label>
                                    <input type="password" class="form-control text-dark @if ($errors->has('oldpassword')) is-invalid @endif" id="inputOldPassword" name="oldpassword"
                                        placeholder="Masukkan password lama" required>
                                    @if ($errors->has('oldpassword'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('oldpassword') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label text-dark">Password Baru</label>
                                    <input type="password" class="form-control text-dark @if ($errors->has('password')) is-invalid @endif" id="inputPassword" name="password"
                                        placeholder="Masukkan password baru" required>
                                    @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="inputPasswordConfirmation" class="form-label text-dark">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control text-dark @if ($errors->has('password_confirmation')) is-invalid @endif" id="inputPasswordConfirmation"
                                        name="password_confirmation" placeholder="Konfirmasi password baru" required>
                                    @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Perbarui data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>
