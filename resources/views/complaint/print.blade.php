<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="/css/app.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="container text-center">
        <h2>Pengaduan Masyarakat</h2>
        <h4>Data Laporan Pengaduan Masyarakat</h4>
        <hr>
        <div class="mx-auto text-center">
            <img class="object-cover w-64 mt-5 rounded-t-lg mx-auto md:rounded-none md:rounded-l-lg" src="{{ asset('storage/'.$complaint['photo'])}}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$complaint['title']}}</h5>
                <p class="mb-1 font-normal text-xs text-gray-500 dark:text-gray-400">
                    Ticket ID: {{$complaint['id']}} | {{$complaint['created_at']}} | {{$complaint['status']}}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-start">{{$complaint['content']}}</p>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
