@extends('layouts.content')

@section('content')
    <div class="container-dashboard py-5 p-5">
        <div class="row">
            <div class="col-8 text-start ms-5">
                <h3 class="fw-bold"><i class="bi bi-people-fill"></i> Pencatatan Perwalian</h3>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <hr>

        <!-- Formulir Catatan Perwalian -->
        <div class="row">
            @if ($historiPerwalian->isNotEmpty())
                @foreach ($historiPerwalian as $perwalian)
                    <div class="card w-100 bg-body mb-3 p-3">
                        <h5>Dosen: {{ $perwalian->dosen->nama }} (NIDN: {{ $perwalian->dosen->nidn }})</h5>
                        <p>Tanggal Perwalian: {{ $perwalian->tanggal_perwalian }}</p>

                        <ul class="list-group mt-3">
                            @foreach ($perwalian->catatanPerwalian as $catatan)
                                <li class="list-group-item mb-3" style="background-color: #fff;">
                                    <p><strong>Catatan:</strong> {!! $catatan->catatan !!}</p>
                                    <p><small class="text-muted">Waktu Catatan:
                                            {{ $catatan->created_at->format('d M Y, H:i') }}</small></p>
                                    <hr>
                                    <p><strong>Balasan Dosen:</strong> </p>
                                    <p>{!! $catatan->balasan_dosen ?? 'Belum ada balasan' !!}</p>
                                    @if ($catatan->balasan_dosen)
                                        <p><small class="text-muted">Waktu Balasan:
                                                {{ $catatan->updated_at->format('d M Y, H:i') }}</small></p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @else
                <p>Data perwalian tidak ditemukan.</p>
            @endif
            <div class="card w-100 bg-body">
                <h5 class="fw-bold ms-1">Catatan Perwalian</h5>
                <div class="card-body">
                    <form action="{{ route('mhs.catatan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" id="editor" name="catatan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
