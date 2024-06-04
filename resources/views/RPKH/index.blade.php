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
                                <h2 class="welcome-cta__title">RPKH (Rencana Pelaksananaan Kegiatan Harian)</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah RPKH (Rencana Pelaksananaan Kegiatan Harian) di
                                    module ini.</p>
                            </div>
                            <div class="welcome-cta__button">
                                <a href="{{ url('/RPKH/create') }}"
                                    class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Data RPKH</a>
                            </div>
                        </div>
                        <!-- End Welcome CTA -->
                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">DATA RPKH
                                    {{-- <span class="nftmax-table__badge">{{ $total }}</span> --}}
                                </h3>
                                {{-- <div class="nftmax-marketplace__bar-right">
                                    <div class="nftmax-marketplace__bar-one">
                                        <div class="nftmax-marketplace__bar-search">
                                            <button id="btn-search" class="search-btn" type="button"><img
                                                    src="/assets/img/search.png" alt="#"></button>
                                            <input name="txt-search" id="txt-search" value="" type="text"
                                                placeholder="Search...">
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
                                                {{-- <th class="nftmax-table__column-3 nftmax-table__h2">ID</th> --}}
                                                <th class="nftmax-table__column-3 nftmax-table__h1">Nama Kegiatan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Kartu Penugasan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Hari</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Tanggal Pelaksanaan Kegiatan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Rencana Kegiatan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Tim</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Realisasi Kegiatan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Keterangan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($RPKH as $item)
                                                <tr>
                                                    {{-- <td class="nftmax-table__column-3 nftmax-table__data-2" id="kode">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['id'] }}
                                                        </p>
                                                    </td> --}}
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->nama_kegiatan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="jenis">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->kartu_penugasan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->hari, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->tanggal_pelaksanaan_kegiatan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->rencana_kegiatan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->tim, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->realisasi_kegiatan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->keterangan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-3">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataModal-{{ $item->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                            </svg>
                                                        </button>

                                                        <a href="{{ url('/RPKH/edit', $item['id']) }}" class="btn btn-warning me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
                                                        {{-- <form
                                                            action="{{ url('/RPKH/edit', $item['id']) }}"
                                                            method="post" class="d-inline">
                                                            <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></button>
                                                            @csrf
                                                            @method('GET')
                                                        </form> --}}
                                                        <form
                                                            action="{{ url('/RPKH/delete', $item['id']) }}"
                                                            method="post" class="d-inline">
                                                            <button class="btn btn-danger mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                        <!-- Modal Structure -->
                                                        <div class="modal fade custom-modal" id="dataModal-{{ $item->id }}" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="dataModalLabel">Detail Isi</h5>
                                                                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button> --}}
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered no-margin custom-table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Nama Kegiatan</th>
                                                                                        <td><span>{{ $item->nama_kegiatan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Kartu Penugasan</th>
                                                                                        <td><span>{{ $item->kartu_penugasan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Hari</th>
                                                                                        <td><span>{{ $item->hari }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Tanggal Pelaksanaan Kegiatan</th>
                                                                                        <td><span>{{ $item->tanggal_pelaksanaan_kegiatan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Rencana Kegiatan</th>
                                                                                        <td><span>{{ $item->rencana_kegiatan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Tim</th>
                                                                                        <td><span>{{ $item->tim }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Realisasi Kegiatan</th>
                                                                                        <td><span>{{ $item->realisasi_kegiatan }}</span></td>
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
                                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
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

                        {{-- <div class="trending-action">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row nftmax-gap-sq30">
                                        <div id="pegawai-container"></div>
                                        <div id="pegawai-pagination-container" class="pull-left">
                                            @if($RPKH->lastPage() > 1)
                                                {{ $RPKH->links() }}
                                            @else
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item disabled">
                                                            <span class="page-link text-secondary"><</span>
                                                        </li>
                                                        <li class="page-item active" aria-current="page">
                                                            <span class="page-link">1</span>
                                                        </li>
                                                        <li class="page-item disabled">
                                                            <span class="page-link text-secondary">></span>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
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