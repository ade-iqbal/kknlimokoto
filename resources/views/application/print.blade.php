<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            line-height: 27px;
        }

        p {
            text-align: justify;
            text-justify: inter-word;
        }

        .container {
            padding: 4rem 3rem 0;
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-style: bold;
        }

        .container .header {
            padding-bottom: 10px;
            border-bottom: 2px solid black;
        }

        .sub-header {
            margin-bottom: 15px;
        }

        .sub-header h4 {
            display: inline;
            border-bottom: 1px solid black;
        }

        .indent-3 {
            text-indent: 3rem;
        }

        .footer {
            margin-top: 2rem;
            float: right;
            width: 300px;
            position: relative;
        }

        .footer img {
            position: absolute;
            z-index: -10;
            width: 90px;
            height: 90px;
            top: 105px;
            left: 35%;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="text-center">
                <h3>PEMERINTAH NAGARI LIMO KOTO</h3>
                <h3>KECAMATAN KOTO VII</h3>
                <h3>JORONG {{ strtoupper($application->jorong->name) }}</h3>
            </div>
            <div>
                <p class="fw-bold">Alamat : Jorong {{ ucwords($application->jorong->name) }}</p>
            </div>
        </div>

        <div class="sub-header text-center">
            <h4> = REKOMENDASI = </h4>
            <p class="text-center">Nomor : 140/{{ $application->ref_number }}/JR.KP-{{ date('Y', strtotime($application->accepted_date)) }}
            </p>
        </div>

        <div class="body">
            <p>Yang bertanda tangan dibawah ini :</p>
            <p class="indent-3">Nama
                <span style="padding-left: 9rem">:</span>
                <span class="fw-bold">{{ strtoupper(auth()->user()->name) }}</span>
            </p>
            <p class="indent-3">Jabatan
                <span style="padding-left: 8.4rem">:</span>
                <span class="fw-bold">KEPALA JORONG
                    {{ strtoupper(auth()->user()->jorong->name) }}</span>
            </p>

            <p>Dengan ini menerangkan bahwa :</p>
            <p class="indent-3">Nama
                <span style="padding-left: 9rem">:</span>
                <span>{{ ucwords($application->citizen_name) }}</span>
            </p>
            <p class="indent-3">Tempat / Tgl. Lahir
                <span style="padding-left: 3.5rem">:</span>
                <span>{{ ucwords($application->place_of_birth) }} /
                    {{ date('d-m-Y', strtotime($application->date_of_birth)) }}</span>
            </p>
            <p class="indent-3">Jenis kelamin
                <span style="padding-left: 5.9rem">:</span>
                <span>{{ $application->gender === 'M' ? 'Laki-laki' : 'Perempuan' }}</span>
            </p>
            <p class="indent-3">Agama
                <span style="padding-left: 8.5rem">:</span>
                <span>{{ ucwords($application->religion) }}</span>
            </p>
            <p class="indent-3">Pekerjaan
                <span style="padding-left: 7.5rem">:</span>
                <span>{{ ucwords($application->occupation) }}</span>
            </p>
            <p class="indent-3">PBB
                <span style="padding-left: 9.6rem">:</span>
                <span>{{ ucwords($application->property_taxes) }}</span>
            </p>

            <p>Nama tersebut diatas adalah benar-benar penduduk Jorong {{ strtoupper(auth()->user()->jorong->name) }}
                Nagari Limo Koto, Kecamatan Koto VII, Kabupaten Sijunjung, selanjutnya yang bersangkutan akan mengurus
                surat-surat ke kantor Wali Nagari Limo Koto antara lain :</p>
            <ol style="padding-left: 4.5rem; margin-bottom: 0.5rem;">
                @foreach ($application->detailApplications as $details)
                <li>{{ $details->letter->name }}</li>
                @endforeach
            </ol>

            <p>Untuk keperluan {{ strtolower($application->need) }}</p>
            <p>Demikianlah rekomendasi ini disampaikan kepada yang bersangkutan untuk dipergunakan menurut semestinya,
                sesuai dengan peraturan yang berlaku.</p>
        </div>

        <div class="footer">
            <p class="text-center">Diberikan di {{ ucwords(auth()->user()->jorong->name) }}</p>
            <p class="text-center">Pada tanggal : {{ date('d-m-Y', strtotime($application->accepted_date)) }}</p>
            <p class="text-center">KEPALA JORONG</p>
            <p class="text-center">{{ strtoupper(auth()->user()->jorong->name) }}</p>
            @if(isset($sign))
            <img src="data:image/png;base64,{{ $sign }}" alt="Tanda tangan">
            @endif
            <p class="text-center fw-bold" style="margin-top: 5rem">{{ strtoupper(auth()->user()->name) }}</p>
        </div>
    </div>
</body>

</html>
