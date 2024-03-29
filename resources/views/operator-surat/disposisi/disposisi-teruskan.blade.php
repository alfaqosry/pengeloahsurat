@extends('layouts.main')
@section('title', 'Surat Masuk - Disposisi')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Teruskan Disposisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('disposisi-surat-masuk.index') }}">Disposisi Surat
                        Masuk</a></div>
                <div class="breadcrumb-item">Teruskan Disposisi Surat</div>
            </div>
        </div>
        @if (session('warning'))
            <div class="alert shadow alert-danger alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        @if (session('wagagal'))
            <div class="alert shadow alert-danger alert-dismissible fade show" role="alert">
                {{ session('wagagal') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('waberhasil'))
            <div class="alert shadow alert-success alert-dismissible fade show" role="alert">
                {{ session('waberhasil') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="section-body ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow ">
                        <div class="card-header">
                            <h4>Teruskan Disposisi Surat masuk</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('disposisi-surat-masuk.store-forward') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="npm" class="form-label">Tujuan disposisi</label>
                                    <select class="form-control search-tujuan @error('id') is-invalid @enderror"
                                        data-width="100%" id="id" name="id">
                                        <option selected disabled> </option>
                                    </select>
                                    @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" name="id_disposisi_surat_masuk" id="id_disposisi_surat_masuk"
                                        value="{{ $id }}">
                                </div>

                                <div class="form-group">
                                    <label for="instruksi">Instruksi / Informasi</label>
                                    <textarea class="form-control @error('instruksi') is-invalid @enderror" id="instruksi" name="instruksi" rows="3">{{ old('instruksi') }}</textarea>
                                    @error('instruksi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <a href="{{ route('disposisi-surat-masuk.index') }}" class="btn btn-warning">
                                    <i class="fas fa-chevron-left"></i> <span>Kembali</span>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> <span>Teruskan</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    <script>
        $(document).ready(function() {

            $('.search-tujuan').select2({
                minimumInputLength: 3,
                language: {
                    inputTooShort: function() {
                        return 'Minimal 3 Karakter';
                    },
                    noResults: function() {
                        return "Data tidak ditemukan!";
                    },
                    searching: function() {
                        return "Mencari..";
                    },
                },
                placeholder: 'Masukan Nama / Jabatan / Unit Kerja',
                ajax: {
                    url: '{{ route('operator-surat.search') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        console.log(data);
                        return {
                            results: $.map(data, function(item) {
                                if (item.id_jabatan < 3) {
                                    return {
                                        text: item.nama_pegawai + ' - ' + item.nama_jabatan,
                                        id: item.email
                                    }
                                } else if (item.id_jabatan == 3) {
                                    return {
                                        text: item.nama_pegawai + ' - ' + item.nama_jabatan +
                                            ' - ' + item.nama_staf_ahli,
                                        id: item.email
                                    }
                                } else if (item.id_jabatan == 4) {
                                    return {
                                        text: item.nama_pegawai + ' - ' + item.nama_jabatan +
                                            ' - ' + item.nama_asisten,
                                        id: item.email
                                    }
                                } else if (item.id_jabatan == 5) {
                                    return {
                                        text: item.nama_pegawai + ' - ' + item.nama_jabatan +
                                            ' - ' + item.nama_bagian,
                                        id: item.email
                                    }
                                } else {
                                    return {
                                        text: item.nama_pegawai + ' - ' + item.nama_jabatan +
                                            ' - ' + item.nama_sub_bagian,
                                        id: item.email
                                    }
                                }

                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
