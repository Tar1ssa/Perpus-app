@extends('admin.app')
@section('pagetitle', 'Dashboard')
@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-sm-12">
            {{-- total buku --}}
        <div class="row">
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total <span>| Buku</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalbook ?? 0 }} Buku</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $totalstock ?? 0 }}</span> <span class="text-muted small pt-2 ps-1">Stock</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            {{-- total buku --}}

            {{-- sedang dipinjam --}}
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sedang Meminjam</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $dipinjam ?? 0 }} Orang</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            {{-- sedang dipinjam --}}

            {{-- dikembalikan --}}
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sudah dikembalikan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $dikembalikan ?? 0 }} Transaksi</h6>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- dikembalikan --}}

            {{-- belum dikembalikan --}}
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Belum dikembalikan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $tidakdikembalikan ?? 0 }} Transaksi</h6>

                    </div>
                  </div>
                </div>
                </div>
            </div>
            {{-- belum dikembalikan --}}

            <div class="mt-3">
                <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No.Transaksi</th>
                            <th>Nama Anggota</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fines as $keyfines)
                        <tr>
                            <td>{{ $keyfines->trans_number }}</td>
                            <td>{{ $keyfines->memberName->nama }}</td>
                            <td>{{ $keyfines->fine }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <th>Total Denda</th>
                            <th colspan="2" class="text-center">{{ $totalfines }}</th>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection


