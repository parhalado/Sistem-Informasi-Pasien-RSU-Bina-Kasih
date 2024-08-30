<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }

    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 6px solid #F8F8F8;
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    </style>



    <title>Sistem Informasi Pasien</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center m-5">Sistem Informasi Pasien</h1>
        <div class="col-10">
            <form action="/pasien/{{ $patients->id }}/update" method="POST" enctype="multipart/form-data">
                <div class="col-10">

                    @csrf

                    <div class=" form-group m-3">
                        <label for="exampleInputEmail1">Rekam Medis</label>
                        <input name="rm" value="{{$patients->rm}}" type="text" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rekam Medis">
                    </div>
                    <div class="form-group m-3">
                        <label for="exampleInputEmail1">Nama Pasien </label>
                        <input name="nama" value="{{$patients->nama}}" type="text" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="date" value="{{$patients->tanggal}}" name="tanggal" id="date" class="form-control"
                            style="width: 100%; display: inline;" onchange="invoicedue(event);" required value="">
                    </div>

                    <div class="form-group col-md-12 mb-5">
                        <label for="">KTP Pasien</label>
                        <div class="avatar-upload">
                            <div>
                                <input type='file' id="imageUpload" name="ktp" accept=".png, .jpg, .jpeg"
                                    onchange="previewImage(this)" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="@if (isset($patients->id) && $patients->ktp != '') background-image:url('{{ url('/') }}/images/{{ $patients->ktp }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif">
                                </div>
                            </div>
                        </div>
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-5">
                        <label for="">KK Pasien</label>
                        <div class="avatar-upload">
                            <div>
                                <input type='file' id="imageUpload" name="kk" accept=".png, .jpg, .jpeg"
                                    onchange="previewImage(this)" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="@if (isset($patients->id) && $patients->kk != '') background-image:url('{{ url('/') }}/images/{{ $patients->kk }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif">
                                </div>
                            </div>
                        </div>
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-5">
                        <label for="">Dokumen Lainnya</label>
                        <div class="avatar-upload">
                            <div>
                                <input type='file' id="imageUpload" name="fotolain" accept=".png, .jpg, .jpeg"
                                    onchange="previewImage(this)" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="@if (isset($patients->id) && $patients->fotolain != '') background-image:url('{{ url('/') }}/images/{{ $patients->fotolain }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif">
                                </div>
                            </div>
                        </div>
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-5">
                        <label for="">KTP Penanggung Jawab</label>
                        <div class="avatar-upload">
                            <div>
                                <input type='file' id="imageUpload" name="ktppj" accept=".png, .jpg, .jpeg"
                                    onchange="previewImage(this)" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="@if (isset($patients->id) && $patients->ktppj != '') background-image:url('{{ url('/') }}/images/{{ $patients->ktppj }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif">
                                </div>
                            </div>
                        </div>
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-5">
                        <label for="">Foto Penanggung Jawab</label>
                        <div class="avatar-upload">
                            <div>
                                <input type='file' id="imageUpload" name="fotopj" accept=".png, .jpg, .jpeg"
                                    onchange="previewImage(this)" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="@if (isset($patients->id) && $patients->fotopj != '') background-image:url('{{ url('/') }}/images/{{ $patients->fotopj }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif">
                                </div>
                            </div>
                        </div>
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>







                    <button type="submit" class="btn btn-primary mt-5 float-end">Update</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        @push('js')
        <script type="text/javascript">
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        @endpush

    </div>
</body>

</html>