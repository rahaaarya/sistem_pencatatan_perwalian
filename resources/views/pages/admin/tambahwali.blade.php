 @extends('layouts.content')

@section('title', 'Tambah Data Wali Mahasiswa')

@section('content')
<div class="container-dashboard p-5 py-5">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
           <h3 class="fw-bold"><i class="bi bi-person-fill-add"></i> Tambah Data Wali Mahasiswa</h3>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded" style="width: 80%;">
            <div class="card-body">
                <form action="{{ route('admin.perwalian') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM Mahasiswa</label>
                        <select class="form-control" id="nim" name="nim">
                            <option disabled selected>Pilih NIM</option>
                            @foreach ($mahasiswa as $mhs)
                                <option value="{{ $mhs->nim }}">{{ $mhs->nim }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                        <select class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
                            <option disabled selected>Pilih Nama Mahasiswa</option>
                            @foreach ($mahasiswa as $mhs)
                                <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="mb-3">
                        <label for="program_studi" class="form-label">Program Studi</label>
                        <select class="form-control" id="program_studi" name="program_studi">
                            <option disabled selected>Pilih Program Studi</option>
                            @foreach ($programStudis as $programStudi)
                                <option value="{{ $programStudi->id }}">{{ $programStudi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>                  
                    <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen Wali</label>
                        <select class="form-control" id="dosen_id" name="dosen_id">
                            <option disabled selected>Pilih Dosen Wali</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                        <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id">
                            <option disabled selected>Pilih Tahun Akademik</option>
                            @foreach($tahunAkademiks as $tahun)
                                <option value="{{ $tahun->id }}">{{ $tahun->tahun_akademik }}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="mb-3">
                        <label for="tanggal_perwalian" class="form-label">Tanggal Perwalian (MM/DD/YYYY)</label>
                        <input type="date" class="form-control" id="tanggal_perwalian" name="tanggal_perwalian" pattern="(0[1-9]|1[0-2])/(0[1-9]|[12][0-9]|3[01])/\d{4}">
                        <small id="dateHelp" class="form-text text-muted">Format tanggal: MM/DD/YYYY.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 
