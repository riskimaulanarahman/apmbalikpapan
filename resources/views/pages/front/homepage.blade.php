@extends('pages.front.template')

@section('main')

@if (session('pesan'))
    <script type='text/javascript'>alert('Pilih Kategori');</script>
@endif

    <div class="container">
        <section id="dispar-header" class="mt-5 mb-5">
            <figure id="wrap-header">
                <img src="assets/img/login-bg/login-bg-13.jpg" alt="">
                <figcaption>
                    <div class="columns is-centered item-header ">
                        <div class="column is-narrow">
                            <div class="has-text-centered judul">
                                <p class="title is-size-1 has-text-light is-mobile jdl">APM</p>
                                <p class="subtitle is-size-4 has-text-light is-mobile subjdl">Laporan Masyarakat Terkini di Kota Balikpapan</p>
                            </div>
                            <br>
                            {{-- <form action="{{ url('cari') }}" method="GET">
                                <div class="field has-addons has-addons-centered is-mobile">
                                    <p class="control inpt">
                                        <input name="search" class="finput is-mobile input is-medium is-rounded" type="text"
                                            placeholder="Apa yang sedang kamu cari ?">
                                    </p>
                                    <p class="control">
                                        <span class="select is-medium is-mobile">
                                            <select name="pilihan">
                                                <option selected disabled>Kategori</option>
                                                <option>Event</option>
                                                <option>Kuliner</option>
                                                <option>Wisata</option>
                                                <option>Penginapan</option>
                                            </select>
                                        </span>
                                    </p>
                                    <p class="control">
                                        <input type="submit" class="button btnn is-warning is-medium is-rounded" value="GO">
                                    </p>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </figcaption>
            </figure>
            <div class="columns is-centered widget-header is-mobile">
                <a href="#" class="column is-one-fifth has-background-light has-text-centered">
                    <span class="icon is-medium has-text-link">
                        <i class="fas fa-history fa-lg"></i>
                    </span>
                    <p class="is-size-7 has-text-grey-dark has-text-weight-semibold">Terkini</p>
                </a>
                <a href="#" class="column is-one-fifth has-background-light has-text-centered">
                    <span class="icon is-medium has-text-info">
                        <i class="fas fa-cogs fa-lg"></i>
                    </span>
                    <p class="is-size-7 has-text-grey-dark has-text-weight-semibold">Proses </p>
                </a>
                <a href="#" class="column is-one-fifth has-background-light has-text-centered">
                    <span class="icon is-medium has-text-primary">
                        <i class="fas fa-check fa-lg"></i>
                    </span>
                    <p class="is-size-7 has-text-grey-dark has-text-weight-semibold">Selesai</p>
                </a>
                {{-- <a href="/event" class="column is-one-fifth has-background-light has-text-centered">
                    <span class="icon is-medium has-text-success">
                        <i class="fas fa-calendar fa-lg"></i>
                    </span>
                    <p class="is-size-7 has-text-grey-dark has-text-weight-semibold">Event</p>
                </a> --}}
            </div>
        </section>
    </div>
    <div class="container container-event">
        <section id="dispar-event" class="my-6 py-0">
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4">Laporan Terkini</p>
                    {{-- <p class="subtitle is-size-5 has-text-grey">Bermacam Kegiatan yang di adakan kota
                        balikpapan</p> --}}
                </div>
                <div class="column is-narrow" style="align-self: flex-end;">
                    {{-- <a href="/event" class="button is-link is-light">Lihat lebih banyak</a> --}}
                </div>
            </div>
            <div class="columns mt-4 mb-5" style="width: 100%; overflow:auto;">
                @foreach ($terkini as $p)
                    {{-- <a href="{{ route('events.show', $p->slug) }}" class="column is-3 item-event"> --}}
                        <figure class="m-2">
                            <img src="{{ asset('upload/'.$p->gambar) }}" alt="" style="width: 200px; height: 140px">
                            <figcaption>
                                <span class="tag is-link mb-3 is-size-6">{{ $p->judul }}</span>
                                <div style="height: 100%; overflow:scroll; margin-bottom:5px;">
                                    <p class="mb-2 is-size-10" style="max-width:200px; height:50px;">{{ $p->laporan }}</p>
                                </div>
                                <p class="has-text-light is-size-6">
                                    <a href="https://maps.google.com/?q={{$p->lat}},{{$p->long}}" target="_blank">
                                        <button type="button" class="tag is-warning mb-3"> <em class="fas fa-map-marker-alt mr-1"></em> Lokasi</button>
                                    </a>
                                </p>
                            </figcaption>
                        </figure>
                    {{-- </a> --}}
                @endforeach
            </div>
        </section>

        <section id="dispar-kuliner" class="my-6 py-0">
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4">Laporan Yang Sedang Di Proses</p>
                    {{-- <p class="subtitle is-size-5 has-text-grey">Nikmati jajanan kuliner kota balikpapan</p> --}}
                </div>
                <div class="column is-narrow" style="align-self: flex-end;">
                    {{-- <a href="/kuliner" class="button is-link is-light">Lihat lebih banyak</a> --}}
                </div>
            </div>
            <div class="columns mt-4 mb-5" style="width: 100%; overflow:auto;">
                @foreach ($proses as $p)
                    {{-- <a href="{{ route('events.show', $p->slug) }}" class="column is-3 item-event"> --}}
                        <figure class="m-2">
                            <img src="{{ asset('upload/'.$p->gambar) }}" alt="" style="width: 200px; height: 140px">
                            <figcaption>
                                <span class="tag is-link mb-3 is-size-6">{{ $p->judul }}</span>
                                <div style="height: 100%; overflow:scroll; margin-bottom:5px;">
                                    <p class="mb-2 is-size-10" style="max-width:200px; height:50px;">{{ $p->laporan }}</p>
                                </div>
                                <p class="has-text-light is-size-6">
                                    <a href="https://maps.google.com/?q={{$p->lat}},{{$p->long}}" target="_blank">
                                        <button type="button" class="tag is-warning mb-3"> <em class="fas fa-map-marker-alt mr-1"></em> Lokasi</button>
                                    </a>
                                    <button type="button" class="tag is-info mb-3" id="btn-detail"> <em class="fas fa-arrow-down mr-1"></em> Detail</button>
                                    <div class="details">
                                        <ol>
                                            @foreach ($p->proses as $s)
                                            <li>{{$s->keterangan}} ({{$s->created_at}})</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </p>
                            </figcaption>
                        </figure>
                    {{-- </a> --}}
                @endforeach
            </div>
            
        </section>

        <section id="dispar-wisata" class="my-6 py-6">
            <div class="columns">
                <div class="column">
                    <p class="title is-size-4">Laporan Selesai</p>
                    {{-- <p class="subtitle is-size-5 has-text-grey">Jelajahi tempat wisata kota balikpapan</p> --}}
                </div>
                <div class="column is-narrow" style="align-self: flex-end;">
                    {{-- <a href="/wisata" class="button is-link is-light">Lihat lebih banyak</a> --}}
                </div>
            </div>
            <div class="columns mt-4 mb-5" style="width: 100%; overflow:auto;">
                @foreach ($selesai as $p)
                    {{-- <a href="{{ route('events.show', $p->slug) }}" class="column is-3 item-event"> --}}
                        <figure class="m-2">
                            <img src="{{ asset('upload/'.$p->gambar) }}" alt="" style="width: 200px; height: 140px">
                            <figcaption>
                                <span class="tag is-link mb-3 is-size-6">{{ $p->judul }}</span>
                                <div style="height: 100%; overflow:scroll; margin-bottom:5px;">
                                    <p class="mb-2 is-size-10" style="max-width:200px; height:50px;">{{ $p->laporan }}</p>
                                </div>
                                <p class="has-text-light is-size-6">
                                    <a href="https://maps.google.com/?q={{$p->lat}},{{$p->long}}" target="_blank">
                                        <button type="button" class="tag is-warning mb-3"> <em class="fas fa-map-marker-alt mr-1"></em> Lokasi</button>
                                    </a>
                                    <button type="button" class="tag is-info mb-3" id="btn-detail"> <em class="fas fa-arrow-down mr-1"></em> Detail</button>
                                    <div class="details">
                                        <ol>
                                            @foreach ($p->proses as $s)
                                            <li>{{$s->keterangan}} ({{$s->created_at}})</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </p>
                            </figcaption>
                        </figure>
                    {{-- </a> --}}
                @endforeach
            </div>
        </section>

        <!-- #modal-dialog -->
        <div class="modal fade" id="modal-cek-detail">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Progress Laporan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <ul id="detaildata">

                            </ul>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                        </div>
                    </div>
            </div>
        </div>

    </div>

@endsection
