<x-app-layout layout="simple">
    <span class="uisheet screen-darken"></span>
    <div class="header"
        style="background: url({{ asset('images/dashboard/top-image.jpg') }}); background-size: cover; background-repeat: no-repeat; height: 100vh;position: relative;">
        <div class="main-img">
            <div class="container">
                <h3 class="my-4 text-white">
                    <span>Sistem informasi permohonan surat rekomendasi Nagari Limo Koto</span>
                </h3>
                <h6 class="text-white mb-5">Melalui aplikasi ini Bapak/Ibu/Saudara yang berdomisili di Nagari Limo Koto
                    dapat mengajukan permohonan surat rekomendasi dari jorong setempat.</h6>
            </div>
        </div>
    </div>
    <div class="container">
        <div class=" mt-n5">
            <div class="bd-heading sticky-xl-top align-self-start">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-5">Permohonan surat rekomendasi</h5>

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('store.application') }}">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="inputName" class="form-label text-dark">Nama<sup
                                        class="text-danger">*</sup></label>
                                <input type="text"
                                    class="form-control text-dark @if($errors->has('citizen_name')) is-invalid @endif"
                                    id="inputName" name="citizen_name" placeholder="Masukkan data nama"
                                    value="{{ old('citizen_name') }}" required>

                                @if ($errors->has('citizen_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('citizen_name') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputPlaceOfBirth" class="form-label text-dark">Tempat lahir<sup
                                        class="text-danger">*</sup></label>
                                <input type="text"
                                    class="form-control text-dark @if ($errors->has('place_of_birth')) is-invalid @endif"
                                    id="inputPlaceOfBirth" name="place_of_birth"
                                    placeholder="Masukkan data tempat lahir" value="{{ old('place_of_birth') }}"
                                    required>

                                @if ($errors->has('place_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('place_of_birth') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputDateOfBirth" class="form-label text-dark">Tanggal lahir<sup
                                        class="text-danger">*</sup></label>
                                <input type="date"
                                    class="form-control text-dark @if ($errors->has('date_of_birth')) is-invalid @endif"
                                    id="inputDateOfBirth" name="date_of_birth" placeholder="Masukkan data tanggal lahir"
                                    value="{{ old('date_of_birth') }}" required>

                                @if ($errors->has('date_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputGender" class="form-label text-dark">Jenis kelamin<sup
                                        class="text-danger">*</sup></label>
                                <select class="form-select text-dark @if ($errors->has('gender')) is-invalid @endif"
                                    aria-label="Default select example" name="gender" id="inputGender">
                                    <option hidden value="">Pilih jenis kelamin</option>
                                    <option @if(old('gender')==='M' ) selected @endif value="M">Laki-laki</option>
                                    <option @if(old('gender')==='F' ) selected @endif value="F">Perempuan</option>
                                </select>

                                @if ($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputReligion" class="form-label text-dark">Agama<sup
                                        class="text-danger">*</sup></label>
                                <select class="form-select text-dark @if ($errors->has('religion')) is-invalid @endif"
                                    aria-label="Default select example" name="religion" id="inputReligion">
                                    <option hidden value="">Pilih agama</option>
                                    <option @if(old('religion')==='Islam' ) selected @endif value="Islam">Islam</option>
                                    <option @if(old('religion')==='Kristen' ) selected @endif value="Kristen">Kristen
                                    </option>
                                    <option @if(old('religion')==='Hindu' ) selected @endif value="Hindu">Hindu</option>
                                    <option @if(old('religion')==='Buddha' ) selected @endif value="Buddha">Buddha
                                    </option>
                                    <option @if(old('religion')==='Khonghucu' ) selected @endif value="Khonghucu">
                                        Khonghucu</option>
                                </select>

                                @if ($errors->has('religion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('religion') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputOccupation" class="form-label text-dark">Pekerjaan<sup
                                        class="text-danger">*</sup></label>
                                <input type="text"
                                    class="form-control text-dark @if ($errors->has('occupation')) is-invalid @endif"
                                    id="inputOccupation" name="occupation" placeholder="Masukkan data pekerjaan"
                                    value="{{ old('occupation') }}" required>

                                @if ($errors->has('occupation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('occupation') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputJorong" class="form-label text-dark">Jorong domisili<sup
                                        class="text-danger">*</sup></label>
                                <select class="form-select text-dark @if ($errors->has('jorong_id')) is-invalid @endif"
                                    aria-label="Default select example" name="jorong_id" id="inputJorong">
                                    <option hidden value="">Pilih jorong domisili</option>

                                    @foreach ($jorongs as $jorong)
                                    <option @if(old('jorong_id')==$jorong->id) selected @endif
                                        value="{{ $jorong->id }}">{{ $jorong->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jorong_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jorong_id') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputNeed" class="form-label text-dark">Keperluan<sup
                                        class="text-danger">*</sup></label>
                                <input type="text"
                                    class="form-control text-dark @if ($errors->has('need')) is-invalid @endif"
                                    id="inputNeed" name="need" placeholder="Masukkan tujuan pembuatan surat"
                                    value="{{ old('need') }}" required>

                                @if ($errors->has('need'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('need') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputLetters" class="form-label text-dark">Jenis surat<sup
                                        class="text-danger">*</sup></label>

                                @foreach ($letters as $key => $value)
                                <div class="form-check">
                                    <input class="form-check-input @if ($errors->has('letters')) is-invalid @endif"
                                        type="checkbox" value="{{ $value->id }}" id="{{ $value->id }}" name="letters[]"
                                        @if(old('letters') && in_array($value->id, old('letters'))) checked @endif>
                                    <label class="form-check-label text-dark" for="{{ $value->id }}">
                                        {{ $value->name }}
                                    </label>
                                </div>
                                @endforeach

                                @if ($errors->has('letters'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('letters') }}
                                </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim permohonan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="back-to-top" style="display: none;">
        <a class="btn btn-primary btn-xs p-0 position-fixed top" id="top" href="#top">
            <svg width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 15.5L12 8.5L19 15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
    <div class="middle" style="display: none;">
        <button data-trigger="left-side-bar" class="d-xl-none btn btn-xs mid-menu" type="button">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.75 11.7256L4.75 11.7256" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M13.7002 5.70124L19.7502 11.7252L13.7002 17.7502" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </button>
    </div>
</x-app-layout>
