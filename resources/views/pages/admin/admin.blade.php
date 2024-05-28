@extends('layouts.content')
@section('title')
  Admin Dashboard
@endsection

@section('content')

<div class="container-dashboard p-5 py-5 ">
    <div class="row">
        <div class="col-8 col-md-4 text-start ms-5">
           <h3 class="fw-bold"><i class="lni lni-grid-alt"></i>
            Dashboard
             </h3> 
        </div>
        <div class="col-12 col-md-4  ms-auto">
            <form class="d-flex ms-auto" role="search">
                <input class="form-control me-2"  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" style="width: 3em;" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </form>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12 card hover-shadow text-warning  ms-3" style="width:15em;">
       
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
              <h5 class="card-title">Program Studi</h5>
              <div class="display-4">1.200</div>
              <p class="card-text">Lihat Detail <i class="fa-solid fa-angles-right"></i></p>
            </div>
          </div>
          <div class="card hover-shadow text-bg-dark    ms-3" style="width:15em;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
              <h5 class="card-title">Jumlah Dosen</h5>
              <div class="display-4">1.200</div>
              <p class="card-text">Lihat Detail <i class="fa-solid fa-angles-right"></i></p>
            </div>
          </div>
          <div class="card hover-shadow text-warning  ms-3" style="width:15em;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
              <h5 class="card-title">Jumlah Mahasiswa</h5>
              <div class="display-4">1.200</div>
              <p class="card-text">Lihat Detail <i class="fa-solid fa-angles-right"></i></p>
            </div>
          </div>
          <div class="card hover-shadow text-bg-dark  ms-3" style="width:15em;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="bi bi-calendar2-event"></i>
                </div>
              <h5 class="card-title">Tahun Ajaran Aktif</h5>
              <div class="display-4">1.200</div>
              <p class="card-text">Lihat Detail <i class="fa-solid fa-angles-right"></i></p>
            </div>
          </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="card card-rounded table-responsive" style="width: 80%;">
            <h4 class="card-title text-center card-title-dash">Tanggal-Tanggal Penting</h4>
            <div class="col-12">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                   
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Pengumuman Pendaftaran KRS</th>
                    <td>14 Agustus 2023</td>
                  </tr>
                  <tr>
                    <th scope="row">Pengisian KRS Online</th>
                    <td>21-25 Agustus 2023</td>
                  </tr>
                  <tr>
                    <th scope="row">Batas Akhir Perbaikan KRS</th>
                    <td>28 Agustus 2023</td>
                </tbody>
              </table>
            </div>
        </div>
      </div>      
</div>

 
  @endsection

  