<x-app-layout layout="dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Daftar Permohonan Surat</h4>
                    </div>
                </div>
                <div class="card-body px-0">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="permohonan-list" class="table table-striped" role="grid" data-toggle="data-table">
                            <thead>
                                <tr class="text-dark">
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Surat</th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Keperluan</th>
                                    <th>Permohonan Surat</th>
                                    <th style="min-width: 100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $app)
                                <tr>
                                    <td class="text-dark">{{ $loop->iteration }}.</td>
                                    <td class="text-dark">{{ date('d-m-Y', strtotime($app->date)) }}</td>
                                    <td class="text-dark">{{ $app->ref_number ?? '-' }}</td>
                                    <td class="text-dark">{{ $app->citizen_name }}</td>
                                    <td class="text-dark">{{ $app->occupation }}</td>
                                    <td class="text-dark">{{ $app->need }}</td>
                                    <td class="text-dark">
                                        <ol>
                                            @foreach ($app->detailApplications as $detail)
                                            <li>{{ $detail->letter->name }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#printModal" onclick="printData({{ $app }})">
                                            {{ __('Cetak') }}
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" onclick="deleteData({{ $app }})">
                                            {{ __('Hapus') }}
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formTitle">Data surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="printData" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputRefNumber" class="form-label text-dark">Nomor surat<sup
                                    class="text-danger">*</sup></label>
                            <input type="text" class="form-control text-dark" id="inputRefNumber"
                                onkeypress="return onlyNumber(event)" placeholder="Masukkan nomor surat"
                                name="ref_number">

                            <div class="invalid-feedback">
                                Nomor surat harus diisi.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputPropertyTaxes" class="form-label text-dark">Status pbb<sup
                                    class="text-danger">*</sup></label>
                            <select class="form-select text-dark" aria-label="Default select example"
                                name="property_taxes" id="inputPropertyTaxes">
                                <option value="Belum Bayar">
                                    Belum bayar</option>
                                <option value="Sudah Bayar">
                                    Sudah bayar</option>
                                <option value="Bebas Pajak">
                                    Bebas pajak</option>
                            </select>

                            <div class="invalid-feedback">
                                Pilih status PBB.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputSign" class="form-label text-dark">Tanda tangan</label>
                            <input class="form-control text-dark" type="file" id="inputSign" name="sign">
                            <div class="invalid-feedback" id="feedbackFile"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="validation()">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formTitle">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="deleteData">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-dark">Yakin untuk menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let url = "";
        const formDeleteData = document.getElementById("deleteData");
        const formPrintData = document.getElementById("printData");
        const refNumber = document.getElementById('inputRefNumber');
        const propertyTaxes = document.getElementById('inputPropertyTaxes');
        const fileSign = document.getElementById('inputSign');
        const feedbackFile = document.getElementById('feedbackFile');

        const deleteData = (row) => {
            url = "{{ route('delete.application', ['id' => ':id']) }}";
            url = url.replace(':id', row.id);
            formDeleteData.action = url
        }

        const printData = (row) => {
            url = "{{ route('print.application', ['id' => ':id']) }}";
            url = url.replace(':id', row.id);
            formPrintData.action = url;
            refNumber.value = row.ref_number;
            propertyTaxes.value = row.property_taxes;
        }

        const onlyNumber = (evt) => {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        const validation = () => {
            let valid = true;
            const file = fileSign.files[0];
            const allowedExtensions = ['png', 'jpg', 'jpeg', 'webp'];

            // validasi nomor surat
            if (refNumber.value === "") {
                valid = false;
                refNumber.classList.add('is-invalid');
            } else {
                refNumber.classList.remove('is-invalid');
            }

            // validasi status pbb
            console.log(propertyTaxes.value);
            if (propertyTaxes.value === "") {
                valid = false;
                propertyTaxes.classList.add('is-invalid');
            } else {
                propertyTaxes.classList.remove('is-invalid');
            }

            // validasi file
            if (file) {
                const fileExtension = file.name.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExtension)) {
                    valid = false;
                    fileSign.classList.add('is-invalid');
                    feedbackFile.innerText = 'Hanya mengizinkan format png, jpg, jpeg, dan webp';
                } else if (file.size > 2 * 1024 * 1024) {
                    valid = false;
                    fileSign.classList.add('is-invalid');
                    feedbackFile.innerText = 'Ukuran file maksimal 2MB';
                } else {
                    fileSign.classList.remove('is-invalid');
                }
            }

            if (valid) {
                formPrintData.submit();
            }
        }

    </script>
    @endpush
</x-app-layout>
