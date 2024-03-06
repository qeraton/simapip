@include('Layout.Header')
<!-- NFTmax Dashboard -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- @if (Session::get('success'))
    <div class="alert alert-success"> {{ Session::get('success') }} </div>
@endif

@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}

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
                                <h2 class="welcome-cta__title">Obyek</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah profile obyek di
                                    module ini.</p>
                            </div>
                            <div class="welcome-cta__button">
                                <a href="{{ url('/obyek/create') }}"
                                    class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Obyek</a>
                                {{-- <a href="{{ url('/template/market-place') }}"
                                    class="nftmax-btn trs-white bl-color">Manajemen Unit</a> --}}
                            </div>
                        </div>
                        <!-- End Welcome CTA -->

                        <!-- Marketplace Bar -->
                        <div class="nftmax-marketplace__bar mg-top-50 mg-btm-40">
                            <div class="nftmax-marketplace__bar-inner">
                                <!-- Marketplace Tab List -->
                                <div class="list-group nftmax-marketplace__bar-list" id="list-tab" role="tablist">
                                    <a class="list-group-item active" q-data-filter="all"
                                        onclick="return setFilterTab(this)" data-bs-toggle="list" href="#id1"
                                        role="tab">Semua</a>
                                    {{-- <a class="list-group-item" q-data-filter="AA" onclick="return setFilterTab(this)"
                                        data-bs-toggle="list" href="#id2" role="tab">Auditor Ahli</a>
                                    <a class="list-group-item" q-data-filter="AT" onclick="return setFilterTab(this)"
                                        data-bs-toggle="list" href="#id3" role="tab">Auditor Terampil</a>
                                    <a class="list-group-item" q-data-filter="NOA" onclick="return setFilterTab(this)"
                                        data-bs-toggle="list" href="#id3" role="tab">Non Auditor</a> --}}
                                </div>
                                <!-- End Marketplace Tab List -->
                                <div class="nftmax-marketplace__bar-right">
                                    <div class="nftmax-marketplace__bar-one">
                                        <div class="nftmax-marketplace__bar-search">
                                            <button id="btn-search" class="search-btn" type="button"><img
                                                    src="/assets/img/search.png" alt="#"></button>
                                            <input name="txt-search" id="txt-search" value="" type="text"
                                                placeholder="Ketikan nama...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Welcome CTA -->
                        <div class="trending-action">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row nftmax-gap-sq30">
                                        <div id="obyek-container"></div>
                                        <div id="obyek-pagination-container" class="pull-left"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Welcome CTA -->
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
            @include('Layout.Footer')
            <script src="{{ asset('plugins/qat-pagination/pagination.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                @if(Session::has('success'))
                    toastr.success('{{ Session::get('success') }}', 'Success');
                @endif

                @if(Session::has('error'))
                    toastr.error('{{ Session::get('error') }}', 'Error');
                @endif

                @if(Session::has('deleted'))
                    toastr.success('{{ Session::get('deleted') }}', 'Deleted');
                @endif
            </script>
            <script>
                let ja = 'all'
                $(function() {
                    loadObyek();

                    $("#txt-search, #btn-search").on('keypress', function(e) {
                        if (e.which == 13) {
                            loadObyek();
                        }
                    });
                })

                function setFilterTab(obj) {
                    var filter = $(obj).attr('q-data-filter');
                    ja = filter;
                    loadObyek();
                }

                function loadObyek() {
                    (function(containerId) {
                        var container = $(containerId);
                        container.pagination({
                            dataSource: '/obyek/list?search=' + encodeURIComponent($("#txt-search").val()) + '&ja=' +
                                ja,
                            locator: 'items',
                            totalNumberLocator: function(response) {
                                return response.data.total;
                            },
                            pageSize: 8,
                            locator: 'data.data',
                            ajax: {
                                beforeSend: function() {
                                    $("#obyek-container").html(
                                        '<div class="inline-no-data">Loading data...</div>');
                                }
                            },
                            callback: function(response, pagination) {
                                // console.log('itu');
                                var dataHtml = '';
                                // if(response.length <= 0){
                                //     // dataHtml += '<div class="inline-no-data">You don\'t have any insured-party yet</div>';
                                // }else{
                                //     $("#pegawai-container").html("<div id='content' class='row' style='margin-top: 20px; min-height: 10%'></div>");
                                // }
                                $("#obyek-container").html(
                                    "<div id='content' class='row' style='margin-top: 20px; min-height: 10%'; min-width: 10%; ></div>"
                                );
                                
                              dataHtml += '<div class="nftmax-table mg-top-40">';
                              dataHtml += '<div class="nftmax-table__heading">';
                              dataHtml += '<h3 class="nftmax-table__title mb-0">DATA OBYEK <span class="nftmax-table__badge">435</span></h3> </div>';
                              dataHtml += '<div class="tab-content" id="myTabContent">';
                              dataHtml += '<div class="tab-panel fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">';
                              dataHtml += '<table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v2">';
                              dataHtml += '<thead class="nftmax-table__head">';
                              dataHtml += '<tr>';
                              dataHtml += '<th class="nftmax-table__column-1 nftmax-table__h1">Kode</th>';
                              dataHtml += '<th class="nftmax-table__column-1 nftmax-table__h1">Nama</th>';
                              dataHtml += '<th class="nftmax-table__column-2 nftmax-table__h2">Alamat</th>';
                              dataHtml += '<th class="nftmax-table__column-5 nftmax-table__h5">No Telephone</th>';
                              dataHtml += '<th class="nftmax-table__column-5 nftmax-table__h5">Email</th>';
                              dataHtml += '<th class="nftmax-table__column-4 nftmax-table__h4">Website</th>';
                              dataHtml += '<th class="nftmax-table__column-10 nftmax-table__h10">Pimpinan</th>';
                              dataHtml += '<th class="nftmax-table__column-10 nftmax-table__h10">Aksi </th>';
                              // Tambahkan header kolom lain sesuai kebutuhan
                              dataHtml += '</tr>';
                              dataHtml += '</thead>';
                              dataHtml += '<tbody class="nftmax-table__body">';

                                response.forEach(objData => {
                                    dataHtml += `
                                <tr>
                                    <td class="nftmax-table__column-1 nftmax-table__data-1">
                                      <div class="nftmax-table__product">
                                        <div class="nftmax-table__amount nftmax-table__text-one">
                                            <span class="nftmax-table__text">${objData.kode ?? "Not set"}</span>
                                        </div>
                                        <div class="nftmax-table__product-content">
																		      <h4 class="nftmax-table__product-title">Statis</h4>
																		      <p class="nftmax-table__product-desc">Owned by  <a href="#">${objData.nama ?? "Not set"}</a></p>
																	      </div>
                                      </div>
                                    </td>

                                    <td class="nftmax-table__column-1 nftmax-table__data-1">
																      <div class="nftmax-table__amount nftmax-table__text-one">
																	      <span class="nftmax-table__text">${objData.nama ?? "Not set"}</span>
																      </div>
															      </td>

                                    <td class="nftmax-table__column-2 nftmax-table__data-2">
																      <div class="nftmax-table__amount nftmax-table__text-two">
																	      <span class="nftmax-table__text">${objData.alamat ?? "Not set"}</span>
																      </div>
															      </td>

                                    <td class="nftmax-table__column-5 nftmax-table__data-5">
																      <p class="nftmax-table__text nftmax-table__up-down nftmax-rcolor">${objData.no_telp ?? "Not set"}</p>
															      </td>

                                    <td class="nftmax-table__column-5 nftmax-table__data-5">
																      <p class="nftmax-table__text nftmax-table__bid-text">${objData.email ?? "Not set"}</p>
															      </td>

                                    <td class="nftmax-table__column-4 nftmax-table__data-4">
																      <p class="nftmax-table__text nftmax-table__time">${objData.website ?? "Not set"}</p>
															      </td>

                                    <td class="nftmax-table__column-10 nftmax-table__data-10">
																      <p class="nftmax-table__text nftmax-table__time">${objData.pimpinan ?? "Not set"}</p>
															      </td>

                                    <td class="nftmax-table__column-10 nftmax-table__data-10">
                                        <div class="nftmax-table__amount nftmax-table__text-two">
                                          <a href="/obyek/edit/${objData.id}" class="btn btn-primary me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
                                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-${objData.id}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-${objData.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Yakin Ingin Menghapus Data?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ url('obyek/delete/${objData.id}') }}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger me-3">Hapus</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                </tr>`;

                                });
                                dataHtml += '</tbody>';
                                dataHtml += '</table>';
                                dataHtml += '</div>';
                                dataHtml += '</div>';
                                $("#obyek-container #content").html(dataHtml);
                            }
                        })
                    })('#obyek-pagination-container');
                }
            </script>
