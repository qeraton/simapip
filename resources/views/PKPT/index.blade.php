@include('Layout.Header')

<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">

                        <!-- Welcome CTA -->
                        <div class="welcome-cta mg-top-40">
                            <div class="welcome-cta__heading">
                                <h2 class="welcome-cta__title">Seluruh Daftar PKPT</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah PKPT di
                                    module ini.</p>
                            </div>
                            @can('Create PKPT')
                                <div class="welcome-cta__button">
                                    <a href="{{ url('/PKPT/create') }}"
                                        class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Data PKPT</a>
                                </div>
                            @endcan
                        </div>
                        <!-- End Welcome CTA -->
                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">Data PKPT
                                    {{-- <span class="nftmax-table__badge"></span> --}}
                                </h3>
                                {{-- <div class="nftmax-marketplace__bar-right">
                                    <div class="nftmax-marketplace__bar-one">
                                        <div class="nftmax-marketplace__bar-search">
                                            <button id="btn-search" class="search-btn" type="button"><img
                                                    src="/assets/img/search.png" alt="#"></button>
                                            <input name="txt-search" id="txt-search" value="" type="text"
                                                placeholder="Ketikan Kode, Nama atau Jenis...">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="table_1" role="tabpanel"
                                    aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="myTable" class="nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Kode</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Nama</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Jenis</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Unit Kerja/SKPD/Satker</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Tujuan Audit</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Ruang Lingkup</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Susunan Tim</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Anggaran <br> Waktu</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Anggaran <br> Biaya</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Rencana Mulai Penugasan (RMP)</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Rencana Penyusunan Laporan (RPL)</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Laporan Hasil Audit (LHA)</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Peralatan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Keterangan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($PKPT as $item)
                                                <tr>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="kode">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['kode'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->nama, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="jenis">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->jenis, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->unit, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->tujuan_audit, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            Tahun {{ Str::limit($item->ruang_lingkup, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->susunan_tim, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            DK: {{ isset($item['waktu_dk']) ? $item['waktu_dk'] : 0 }}
                                                        </p>
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            LK: {{ isset($item['waktu_lk']) ? $item['waktu_lk'] : 0 }}
                                                        </p>
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            HP: {{ isset($item['waktu_hp']) ? $item['waktu_hp'] : 0 }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            DK: {{ isset($item['biaya_dk']) ? number_format($item['biaya_dk'], 0, ',', '.') : 0 }}
                                                        </p>
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            LK: {{ isset($item['biaya_lk']) ? number_format($item['biaya_lk'], 0, ',', '.') : 0 }}
                                                        </p>
                                                        @php
                                                            $total_biaya = is_numeric($item['biaya_dk']) && is_numeric($item['biaya_lk']) ? ($item['biaya_dk'] + $item['biaya_lk']) : 0;
                                                        @endphp
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            Total: {{ number_format($total_biaya, 0, ',', '.') }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['rmp'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['rpl'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['lha'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->peralatan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ isset($item['keterangan']) ? $item['keterangan'] : '' }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-3">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataModal-{{ $item->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                            </svg>
                                                        </button>
                                                        @can('Edit PKPT')
                                                            <a href="{{ url('/PKPT/edit', $item['id']) }}" class="btn btn-warning me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>
                                                            </a>
                                                        @endcan
                                                        @can('Delete PKPT')
                                                            <form
                                                                action="{{ url('/PKPT/delete', $item['id']) }}"
                                                                method="post" class="d-inline">
                                                                <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan

                                                        <!-- Modal Structure -->
                                                        <div class="modal fade custom-modal" id="dataModal-{{ $item->id }}" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="dataModalLabel">Detail Isi</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered no-margin custom-table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Kode </th>
                                                                                        <td><span>{{ $item->kode }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Nama PKPT</th>
                                                                                        <td><span>{{ $item->nama }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Jenis PKPT</th>
                                                                                        <td><span>{{ $item->jenis }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Unit Kerja/SKPD/Satker</th>
                                                                                        <td><span>{{ $item->unit }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Tujuan Audit</th>
                                                                                        <td><span>{{ $item->tujuan_audit }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Ruang Lingkup</th>
                                                                                        <td><span>{{ $item->ruang_lingkup }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Susunan Tim</th>
                                                                                        <td><span>{{ $item->susunan_tim }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Anggaran Waktu</th>
                                                                                        <td>DK:<span>{{ isset($item['waktu_dk']) ? $item['waktu_dk'] : 0 }}</span><br>
                                                                                            LK:<span>{{ isset($item['waktu_lk']) ? $item['waktu_lk'] : 0 }}</span><br>
                                                                                            HP:<span>{{ isset($item['waktu_hp']) ? $item['waktu_hp'] : 0 }}</span>
                                                                                        </td>
                                                                                        
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Anggaran Biaya</th>
                                                                                        <td>DK: <span>{{ isset($item['biaya_dk']) ? number_format($item['biaya_dk'], 0, ',', '.') : 0 }}</span><br>
                                                                                            LK: <span>DK: {{ isset($item['biaya_lk']) ? number_format($item['biaya_lk'], 0, ',', '.') : 0 }}</span><br>
                                                                                            @php
                                                                                                $total_biaya = is_numeric($item['biaya_dk']) && is_numeric($item['biaya_lk']) ? ($item['biaya_dk'] + $item['biaya_lk']) : 0;
                                                                                            @endphp
                                                                                            Total: <span>{{ number_format($total_biaya, 0, ',', '.') }}</span>
                                                                                        </td>     
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Rencana Mulai Penugasan</th>
                                                                                        <td><span>{{ $item->rmp }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Rencana Penyusunan Laporan</th>
                                                                                        <td><span>{{ $item->rpl }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Laporan Hasil Audit (LHA)</th>
                                                                                        <td><span>{{ $item->lha }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Peralatan</th>
                                                                                        <td><span>{{ $item->peralatan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Keterangan</th>
                                                                                        <td><span>{{ $item->keterangan }}</span></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Of Modal Structure -->
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- End NFTMax Table Body -->
                                    </table>
                                    {{-- <div id="no-data-message" style="display: none; background-color: #f44336; color: white; padding: 10px; margin-top: 10px; border-radius: 5px; font-size: 16px;">
                                        Data tidak ditemukan
                                    </div> --}}
                                    <!-- End NFTMax Table -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- End Welcome CTA -->
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

{{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')