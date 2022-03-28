<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}

    <title>Laporan Pengaduan</title>
</head>
<body>
    <div class="container text-center">
        <h2>Pengaduan Masyarakat</h2>
        <h4>Data Laporan Pengaduan Masyarakat</h4>
        <hr>
        <div class="mx-auto text-center">
            <img style="width: 16rem" src="storage/{{$complaint['photo']}}" alt="">
            <div class="">
                <h3 class="">{{$complaint['title']}}</h5>
                <p class="">
                    Ticket ID: {{$complaint['id']}} | {{$complaint['created_at']}} | {{$complaint['status']}}
                </p>
                <p>Pelapor: <br> {{$complaint['name']}}</p>
                <p>NIK Pelapor: <br> {{$complaint['nik']}}</p>
                <p class="">Isi: <br> {{$complaint['content']}}</p>
            </div>
        </div>
    </div>
</body>
</html>
