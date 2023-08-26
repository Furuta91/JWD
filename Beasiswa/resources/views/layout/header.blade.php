<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"></head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{route('beasiswas.index')}}">Beasiswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('beasiswas.index')}}">Pilihan Beasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('beasiswas.create')}}">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('beasiswas.detail')}}">Hasil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>