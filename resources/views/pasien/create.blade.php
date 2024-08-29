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



        <form action="/pasien" method="POST" enctype="multipart/form-data">
            <div class=" col-10">
                @csrf
                <div class=" form-group m-3">
                    <label for="exampleInputEmail1">Rekam Medis</label>
                    <input name="rm" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Rekam Medis">
                </div>
                <div class="form-group m-3">
                    <label for="exampleInputEmail1">Nama Pasien </label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Nama Pasien">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Masuk</label>
                    <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Tanggal">
                </div>
                <div class="form-group m-3">
                    <label for="exampleInputEmail1">KTP Pasien</label>
                    <input name="ktp" type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="KTP Pasien" required>
                </div>
                <div class="form-group m-3">
                    <label for="exampleInputEmail1">KK Pasien</label>
                    <input name="kk" type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="KK Pasien" required>
                </div>
                <div class="form-group m-3">
                    <label for="exampleInputEmail1">Dokumen Lain</label>
                    <input name="fotolain" type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Dokumen Lain" required>
                </div>
                <div class="form-group m-3">
                    <label for="exampleInputEmail1">KTP Penanggung Jawab</label>
                    <input name="ktppj" type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="KTP Penanggung Jawab" required>
                </div>
                <div class="form-group m-3">
                    <label for="exampleInputEmail1">Foto Penanggung Jawab</label>
                    <input name="fotopj" type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Foto Penanggung Jawab" required>
                </div>

                <button type="submit" class="btn btn-primary mt-5 float-end">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    </div>
</body>

</html>