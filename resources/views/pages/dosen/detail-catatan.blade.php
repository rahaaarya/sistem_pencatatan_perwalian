@extends('layouts.content')
@section('title', 'Histori Data Perwalian')

@section('content')
    <div class="container-dashboard py-5 p-5">
        <div class="row">
            <div class="col-8 text-start ms-5">
                <h3 class="fw-bold"><i class="fas fa-chalkboard-teacher"></i>Detail Catatan Perwalian</h3>
            </div>
        </div>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($perwalian->isNotEmpty())
            <div class="card w-100 bg-body mb-3 p-3">
                <h5>Mahasiswa: {{ $perwalian->first()->mahasiswa->nama }} (NIM:
                    {{ $perwalian->first()->mahasiswa->nim }})</h5>
                <p>Tanggal Perwalian: {{ $perwalian->first()->tanggal_perwalian }}</p>

                <ul class="list-group mt-3">
                    @foreach ($perwalian->flatMap->catatanPerwalian as $catatan)
                        <li class="list-group-item mb-3" style="background-color: #fff;">
                            <p><strong>Catatan:</strong> {!! $catatan->catatan !!}</p>
                            <p><small class="text-muted">Waktu Catatan:
                                    {{ $catatan->created_at->format('d M Y, H:i') }}</small>
                            </p>
                            <hr>
                            <p><strong>Balasan Dosen:</strong></p>
                            <p>{!! $catatan->balasan_dosen ?? 'Belum ada balasan' !!}</p>
                            <p><small class="text-muted">Waktu Balasan:
                                    {{ $catatan->updated_at->format('d M Y, H:i') }}</small>
                            </p>

                            @if ($catatan->balasan_dosen)
                                <!-- Tampilkan balasan dan tombol edit -->
                                <div id="balasan-{{ $catatan->id }}">
                                    <button class="btn btn-warning" onclick="toggleEdit({{ $catatan->id }})">Edit
                                        Balasan</button>
                                    <form action="{{ route('dosen.hapus-catatan', $catatan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">Hapus
                                            Balasan</button>
                                    </form>
                                </div>

                                <!-- Form untuk edit balasan -->
                                <div id="edit-{{ $catatan->id }}" style="display:none;">
                                    <form action="{{ route('dosen.balas-catatan', $catatan->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea class="form-control" id="editor-{{ $catatan->id }}" name="balasan_dosen" required>{{ $catatan->balasan_dosen }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        <button type="button" class="btn btn-secondary"
                                            onclick="toggleEdit({{ $catatan->id }})">Batal</button>
                                    </form>
                                </div>
                            @else
                                <!-- Form untuk menambah balasan -->
                                <form action="{{ route('dosen.balas-catatan', $catatan->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <textarea class="form-control editor" id="editor-{{ $catatan->id }}" name="balasan_dosen"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                                </form>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>Data perwalian tidak ditemukan.</p>
        @endif
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        var editors = {};

        function toggleEdit(id) {
            var balasanDiv = document.getElementById('balasan-' + id);
            var editDiv = document.getElementById('edit-' + id);

            if (editDiv.style.display === 'none') {
                editDiv.style.display = 'block';
                balasanDiv.style.display = 'none';

                if (!editors[id]) {
                    ClassicEditor.create(document.querySelector('#editor-' + id)).then(editor => {
                        editors[id] = editor;
                    }).catch(error => {
                        console.error(error);
                    });
                }
            } else {
                editDiv.style.display = 'none';
                balasanDiv.style.display = 'block';
            }
        }

        document.querySelectorAll('.editor').forEach(editor => {
            ClassicEditor.create(editor).catch(error => {
                console.error(error);
            });
        });
    </script>
@endsection
