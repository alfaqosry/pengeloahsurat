@extends('layouts.main')
@section('title', 'Notifikasi')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Notifikasi</h1>
        </div>
        @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert shadow alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="section-body ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow ">
                        <div class="card-header">
                            Notifikasi
                        </div>
                        <div class="card-body">

                            <form action="{{ route('allownotifpost') }}" method="POST">
                                @method('POST')
                                @csrf


                                <div class="form-group row">
                                    <label for="wanotif" class="col-sm-6 col-6 col-form-label">Notif Whatsapp</label>
                                    <div class="col-sm-6 col-6 ">
                                        <div class="form-check">
                                            <input class="form-check-input @error('wanotif') is-invalid @enderror"
                                                type="checkbox" id="wanotif" name="wanotif"
                                                @if ($notif->wanotif) checked @endif value="1">
                                            @error('wanotif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="emailnotif" class="col-sm-6 col-6 col-form-label">Notif Email</label>
                                    <div class="col-sm-6 col-6 ">
                                        <div class="form-check">
                                            <input class="form-check-input @error('emailnotif') is-invalid @enderror"
                                                type="checkbox" id="emailnotif"
                                                @if ($notif->emailnotif) checked @endif name="emailnotif"
                                                value="1">
                                            @error('emailnotif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nowa" class="col-sm-2 col-form-label">No Whatsapp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('emailnotif') is-invalid @enderror"
                                            id="nowa" name="nowa" value="{{ auth()->user()->nowa }}">

                                        @error('nowa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
