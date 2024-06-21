@include('Layout.Header')

<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <section class="breadcrumbs">
                        @include('Layout._includes.breadcrumbs')
                    </section>
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- Welcome CTA -->
                        <div class="welcome-cta mg-top-40">
                            <div class="welcome-cta__heading">
                                <h2 class="welcome-cta__title">Seluruh Daftar Reviu</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah Reviu di
                                    module ini.</p>
                            </div>
                            {{-- @can('Create Reviu')
                                <div class="welcome-cta__button">
                                    <a href="{{ url('/Reviu/create') }}"
                                        class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Data Reviu</a>
                                </div>
                            @endcan --}}
                        </div>
                        <!-- End Welcome CTA -->
                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">Data Reviu
                                    {{-- <span class="nftmax-table__badge"></span> --}}
                                </h3>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="table_1" role="tabpanel"
                                    aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="myTable" class="nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Nama Penugasan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Surat Perintah Tugas</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Halaman</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Uraian</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Keterangan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Status</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($Reviu as $item)
                                                <tr>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->nama_penugasan, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->surat_perintah_tugas, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->halaman, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ Str::limit($item->uraian, 20) }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ isset($item['keterangan']) ? Str::limit($item['keterangan'], 20) : 'Tidak Ada Keterangan' }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2" id="status">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                          @if($item->status == 'selesai')
                                                            <b class="badge bg-success">Selesai</b>
                                                          @else
                                                            <b class="badge bg-danger">Belum Selesai</b>
                                                          @endif
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-3">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataModal-{{ $item->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                            </svg>
                                                        </button>
                                                        @can('Edit Reviu')
                                                            <a href="{{ url('/Reviu/edit', $item['id']) }}" class="btn btn-warning me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>
                                                            </a>
                                                        @endcan
                                                        @can('Delete Reviu')
                                                            <form
                                                                action="{{ url('/Reviu/delete', $item['id']) }}"
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
                                                                                        <th>Nama Penugasan </th>
                                                                                        <td><span>{{ $item->nama_penugasan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Surat Perintah Tugas</th>
                                                                                        <td><span>{{ $item->surat_perintah_tugas }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Uraian</th>
                                                                                        <td><span>{{ $item->uraian }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Keterangan</th>
                                                                                        <td><span>{{ $item->keterangan }}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <td>
                                                                                          <span>
                                                                                            <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                                                              @if($item->status == 'selesai')
                                                                                                <b class="badge bg-success">Selesai</b>
                                                                                              @else
                                                                                                <b class="badge bg-danger">Belum Selesai</b>
                                                                                              @endif
                                                                                            </p>
                                                                                          </span>
                                                                                        </td>
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