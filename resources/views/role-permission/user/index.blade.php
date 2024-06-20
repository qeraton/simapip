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
                                <h2 class="welcome-cta__title">Users</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah User di
                                    module ini.</p>
                            </div>
                            <div class="welcome-cta__button">
                                <a href="{{ url('users/create') }}"
                                    class="nftmax-btn nftmax-btn__bordered bg radius">Tambah User</a>
                            </div>
                        </div>
                        <!-- End Welcome CTA -->
                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">Data User
                                    {{-- <span class="nftmax-table__badge"></span> --}}
                                </h3>
                                {{-- <div class="nftmax-marketplace__bar-right">
                                    <div class="nftmax-marketplace__bar-one">
                                        <div class="nftmax-marketplace__bar-search">
                                            <button id="btn-search" class="search-btn" type="button"><img
                                                    src="/assets/img/search.png" alt="#"></button>
                                            <input name="txt-search" id="txt-search" value="" type="text"
                                                placeholder="Search ...">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="table_1" role="tabpanel"
                                    aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="myTable" class="table-striped nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                <th class="nftmax-table__column-4 nftmax-table__h2">Username</th>
                                                <th class="nftmax-table__column-4 nftmax-table__h2">Email</th>
                                                <th class="nftmax-table__column-4 nftmax-table__h2">Roles</th>
                                                <th class="nftmax-table__column-2 nftmax-table__h2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td class="nftmax-table__column-2 nftmax-table__data-2"
                                                        id="nama">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['username'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2"
                                                        id="email">
                                                        <p
                                                            class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['email'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-2"
                                                        id="roleName">
                                                        <p>
                                                            @if (!empty($item->getRoleNames()))
                                                                @foreach ($item->getRoleNames() as $roleName)
                                                                    <p class="badge bg-primary mx-1">{{$roleName}}</p>
                                                                @endforeach
                                                            @endif
                                                            
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-10 nftmax-table__data-10">
                                                        @can('Edit User')
                                                            <a href="{{ url('users/'.$item->id.'/edit') }}"
                                                                class="btn btn-primary ml-0"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                                </svg> Edit
                                                            </a>
                                                        @endcan
                                                        @can('Delete User')
                                                            <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#dataModalDelete-{{ $item->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                                </svg>
                                                            </button>      
                                                        @endcan

                                                        <!-- Modal Delete -->
                                                        <div id="dataModalDelete-{{ $item->id }}" class="modal fade">
                                                            <div class="modal-dialog modal-confirm modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header flex-column">
                                                                        <div class="icon-box">
                                                                            <i class="material-icons">&#xE5CD;</i>
                                                                        </div>						
                                                                        <h4 class="modal-title w-100">Apakah Anda Yakin?</h4>	
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?. Data Yang Akan Dihapus : <b style="color: #f44336">{{$item->username}}</b></p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <button type="button" data-dismiss="modal" aria-label="btn-cancel" class="btn btn-secondary btn-cancel">Tidak</button>
                                                                        <form
                                                                            action="{{ url('users/'.$item->id.'/delete') }}"
                                                                            method="post" class="d-inline">
                                                                            <button class="btn btn-danger"><span>Hapus</span></button>
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- End NFTMax Table Body -->
                                    </table>
                                    {{-- <div id="no-data-message"
                                        style="display: none; background-color: #f44336; color: white; padding: 10px; margin-top: 10px; border-radius: 5px; font-size: 16px;">
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