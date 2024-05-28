@if (auth()->check()) <!-- Mengecek apakah ada pengguna yang masuk -->
    @if (auth()->user()->role == 'admin')
        <!-- Mengecek apakah pengguna adalah admin -->
        <div class="wrapper">
            <aside id="sidebar">
                <!-- Sidebar untuk admin -->
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <i class="lni lni-grid-alt" style="font-size: 2em"></i>
                        <a href="/admin"><span class="sidebar-label"></span></a>
                    </button>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('admin.admin') }}" class="sidebar-link">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="bi bi-clipboard-data-fill"></i>
                            <span>Manajemen Data</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.program-studi') }}" class="sidebar-link"><i
                                        class="bi bi-journal-bookmark-fill"></i>Program Studi</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.dosen') }}" class="sidebar-link"><i
                                        class="fas fa-chalkboard-teacher"></i>Dosen</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.mahasiswa') }}" class="sidebar-link"> <i
                                        class="fas fa-user-graduate"></i>Mahasiswa</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.matakuliah') }}" class="sidebar-link"> <i
                                        class="bi bi-journals"></i>Matakuliah</a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('admin.thn-akademik') }}" class="sidebar-link"><i
                                        class="bi bi-calendar2-event"></i>Tahun Akademik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.perwalian') }}" class="sidebar-link ">
                            <i class="fa-solid fa-rectangle-list"></i>
                            <span>Rekap Data Perwalian</span>
                        </a>
                    </li>
                    <li class="sidebar-item mb-5 pt-5">
                        <a href="{{ route('logout') }}" class="sidebar-link">
                            <i class="fa-solid fa-power-off"></i>
                            <span style=" font-size: 1em;" class="mb-5">Logout</span>
                        </a>
                    </li>
                </ul>

            </aside>
        </div>
    @elseif(auth()->user()->role == 'mahasiswa')
        <!-- Mengecek apakah pengguna adalah mahasiswa -->
        <div class="wrapper">
            <aside id="sidebar">
                <!-- Sidebar untuk mahasiswa -->
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <i class="lni lni-grid-alt" style="font-size: 2em"></i>
                        <a href="/mahasiswa"><span class="sidebar-label"> </span></a>
                    </button>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('mhs.mahasiswa') }}" class="sidebar-link">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a href="{{ route('mhs.catat-perwalian') }}" class="sidebar-link ">
                            <i class="bi bi-people-fill"></i>
                            <span>Perwalian</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mhs.krs') }}" class="sidebar-link ">
                            <i class="fa-solid fa-rectangle-list"></i>
                            <span>KRS</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a href="{{ route('mhs.catatan') }}" class="sidebar-link ">
                            <i class="fa-solid fa-rectangle-list"></i>
                            <span>Catatan</span>
                        </a>
                    </li>
                    <li class="sidebar-item mb-5 pt-5">
                        <a href="{{ route('logout') }}" class="sidebar-link">
                            <i class="fa-solid fa-power-off"></i>
                            <span style=" font-size: 1em;" class="mb-5">Logout</span>
                        </a>
                    </li>
                </ul>

            </aside>
        </div>
    @elseif(auth()->user()->role == 'dosen')
        <!-- Mengecek apakah pengguna adalah dosen -->
        <!-- Sidebar untuk dosen -->
        <div class="wrapper">
            <aside id="sidebar">
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <i class="lni lni-grid-alt" style="font-size: 2em"></i>
                        <a href="/dosen"><span class="sidebar-label"></span></a>
                    </button>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.dosen') }}" class="sidebar-link">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.histori-perwalian') }}" class="sidebar-link">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Histori Perwalian</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.data-perwalian') }}" class="sidebar-link">
                            <i class="fa-solid fa-rectangle-list"></i>
                            <span>Data Perwalian</span>
                        </a>
                    </li>
                    <li class="sidebar-item mb-5 pt-5">
                        <a href="{{ route('logout') }}" class="sidebar-link">
                            <i class="fa-solid fa-power-off"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
    @endif
@endif
