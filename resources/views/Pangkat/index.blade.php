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
                                <h2 class="welcome-cta__title">Seluruh Daftar Pangkat</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah Pangkat di
                                    module ini.</p>
                            </div>
                            @can('Create Pangkat')
                                <div class="welcome-cta__button">
                                <a href="{{ url('/pangkat/create') }}"
                                    class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Data Pangkat</a>
                            </div>
                            @endcan
                            
                        </div>
                        <!-- End Welcome CTA -->
                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">Data Pangkat
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
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Kode</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Nama</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Golongan Kode</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Golongan</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h2">Urutan</th>
                                                <th class="nftmax-table__column-4 nftmax-table__h3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($pangkat as $item)
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
                                                            {{ $item['nama'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['golongan_kode'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['golongan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['urutan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-3">
                                                        @can('Edit Pangkat')
                                                            <a href="{{ url('/pangkat/edit', $item['id']) }}" class="btn btn-primary me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
                                                        @endcan
                                                        @can('Delete Pangkat')
                                                            <form
                                                                action="{{ url('/pangkat/delete', $item['id']) }}"
                                                                method="post" class="d-inline">
                                                                <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                        
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
                                            @if($pangkat->lastPage() > 1)
                                                {{ $pangkat->links() }}
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