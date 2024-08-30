<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistem Informasi Pasien</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center m-5">Sistem Informasi Pasien</h1>
        @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
        @endif
        <a href="/pasien/create" class="btn btn-info m-2"> Tambah Data Pasien</a>
        <table class="table text-center table-dark table-striped ">


            <thead>
                <tr>
                    <th>No</th>
                    <th>Rekam Medis</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Masuk</th>
                    <th>KTP</th>
                    <th>KK</th>
                    <th>Foto Lain</th>
                    <th>KTP Penanggung Jawab</th>
                    <th>Foto Penanggung Jawab</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                    <th>Download</th>

                </tr>
            </thead>






            <tbody>

                @foreach($patients as $index => $patient)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$patient->rm}}</td>
                    <td>{{$patient->nama}}</td>
                    <td>{{$patient->tanggal}}</td>
                    <td><img src="{{ asset('images/'.$patient->ktp)}}" width="50" height="50" alt="ktp"></td>
                    <td><img src="{{ asset('images/'.$patient->kk)}}" width="50" height="50" alt="kk"></td>
                    <td><img src="{{ asset('images/'.$patient->fotolain)}}" width="50" height="50" alt="fotolain">
                    </td>
                    <td><img src="{{ asset('images/'.$patient->ktppj)}}" width="50" height="50" alt="ktppj">
                    </td>
                    <td><img src="{{ asset('images/'.$patient->fotopj)}}" width="50" height="50" alt="fotopj">
                    </td>

                    <td>
                        <a href="/pasien/{{$patient->id}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="/pasien/{{$patient->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">

                        </form>

                    </td>


                </tr>
                @endforeach
            </tbody>

        </table>

        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>
</div>

</html>