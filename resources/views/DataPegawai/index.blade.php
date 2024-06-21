@include('Layout.Header')
    <!-- NFTmax Dashboard -->
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
                                    <h2 class="welcome-cta__title">Seluruh Daftar Pegawai</h2>
                                    <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah profile pegawai anda di module ini.</p>
                                </div>
                                <div class="welcome-cta__button">
                                    <a href="{{url('/template/upload-product')}}" class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Pegawai</a>
                                    <a href="{{url('/template/market-place')}}" class="nftmax-btn trs-white bl-color">Manajemen Unit</a>
                                </div>
                            </div>
                            <!-- End Welcome CTA -->
                            
                            <!-- Marketplace Bar -->
                            <div class="nftmax-marketplace__bar mg-top-50 mg-btm-40">
                                <div class="nftmax-marketplace__bar-inner">
                                    <!-- Marketplace Tab List -->
                                    <div class="list-group nftmax-marketplace__bar-list" id="list-tab" role="tablist">
                                        <a class="list-group-item active" q-data-filter="all" onclick="return setFilterTab(this)" data-bs-toggle="list" href="#id1" role="tab">Semua</a>
                                        <a class="list-group-item" q-data-filter="AA" onclick="return setFilterTab(this)" data-bs-toggle="list" href="#id2" role="tab">Auditor Ahli</a>
                                        <a class="list-group-item" q-data-filter="AT" onclick="return setFilterTab(this)" data-bs-toggle="list" href="#id3" role="tab">Auditor Terampil</a>
                                        <a class="list-group-item" q-data-filter="NOA" onclick="return setFilterTab(this)" data-bs-toggle="list" href="#id3" role="tab">Non Auditor</a>
                                    </div>
                                    <!-- End Marketplace Tab List -->
                                    
                                    <div class="nftmax-marketplace__bar-right">
                                        <div class="nftmax-marketplace__bar-one">
                                            <div class="nftmax-marketplace__bar-search">
                                                <button id="btn-search" class="search-btn" type="button"><img src="/assets/img/search.png" alt="#"></button>
                                                <input name="txt-search" id="txt-search" value="" type="text" placeholder="Ketikan nama atau nip...">
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
                                            <div id="pegawai-container"></div>
                                            <div id="pegawai-pagination-container" class="pull-left"></div>
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
<script>
    let ja = 'all'
    $(function(){
        loadPegawai();

        $("#txt-search, #btn-search").on('keypress',function(e) {
            if(e.which == 13) {
                loadPegawai();
            }
        });
    })

    function setFilterTab(obj){
        var filter = $(obj).attr('q-data-filter');
        ja = filter;
        loadPegawai();
    }

    function loadPegawai(){
        (function(containerId) {
            var container = $(containerId);
            container.pagination({
            dataSource: '/pegawai/list?search='+encodeURIComponent($("#txt-search").val())+'&ja='+ja,
            locator: 'items',
            totalNumberLocator: function(response) {
                return response.data.total;
            },
            pageSize: 8,
            locator: 'data.data',
            ajax: {
                beforeSend: function() {
                    $("#pegawai-container").html('<div class="inline-no-data">Loading data...</div>');
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
                $("#pegawai-container").html("<div id='content' class='row' style='margin-top: 20px; min-height: 10%'></div>");

                response.forEach(objData => {
                    dataHtml += `<div class="col-lg-4 col-md-6 col-12">
                                    <!-- Marketplace Single Item -->
                                    <div class="trending-action__single trending-action__single--v2">
                                        <div class="nftmax-trendmeta">
                                            <div class="nftmax-trendmeta__main">
                                                <div class="nftmax-trendmeta__author">
                                                    <div class="nftmax-trendmeta__content">
                                                        <span class="nftmax-trendmeta__small">Jabatan</span> <span class="badge bg-primary">${objData.jabatan_tmt ?? "Not set"}</span>
                                                        <h4 class="nftmax-trendmeta__title">${objData.jabatan_nama ?? "Not set"}</h4> 
                                                    </div>
                                                </div>
                                                <div class="nftmax-trendmeta__author">
                                                    <div class="nftmax-trendmeta__content">
                                                        <span class="nftmax-trendmeta__small">Pangkat</span> <span class="badge bg-primary">${objData.pangkat_nama ?? "Not set"}</span>
                                                        <h4 class="nftmax-trendmeta__title">${objData.pangkat_tmt ?? "Not set"}</h4> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Trending Head -->
                                        <div class="trending-action__head">
                                            <div class="trending-action__badge ${(objData.is_auditor == 1)? 'bg-success' : 'bg-secondary'}"><span>Auditor</span></div>
                                            <div class="trending-action__button v2">
                                                <a class="trending-action__btn"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                            </div>
                                            <img src="assets/img/marketplace-1.png" alt="#">
                                        </div>
                                        <!-- Trending Body -->
                                        <div class="trending-action__body trending-marketplace__body">
                                            <h2 class="trending-action__title"><a href="{{url('/pegawai/${objData.id}/profile')}}">${objData.nama_lengkap}</a></h2>
                                            <div class="nftmax-currency">
                                                <div class="nftmax-currency__main">
                                                    <div class="nftmax-currency__content">
                                                        <h4 class="nftmax-currency__content-title">${objData.nip}</h4>
                                                        <p class="nftmax-currency__content-sub">${objData.email}</p>
                                                    </div>
                                                </div>
                                                <a href="#" class="nftmax-btn nftmax-btn__secondary radius">Dalam Penugasan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Marketplace Item -->
                                </div>`;
                });

                dataHtml += `<div class="col-lg-4 col-md-6 col-12">
                                <!-- Marketplace Single Item -->
                                <div class="trending-action__single trending-action__single--v2" style="border: 2px dashed; height: 100%">
                                    <div class="nftmax-trendmeta">
                                        
                                    </div>
                                    <!-- Trending Head -->
                                    <div class="trending-action__head">
                                        <div class="text-center" style="margin-top: 10rem">
                                            Tambahkan Pegawai Baru
                                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                        </div>
                                    </div>
                                    <!-- Trending Body -->
                                    <div class="trending-action__body trending-marketplace__body">
                                        
                                    </div>
                                </div>
                                <!-- End Marketplace Item -->
                            </div>`;

                // dataHtml += '<div class="col-md-4 d-flex flex-column">'+
                //                 '<a href="#">'+
                //                 '<div class="trending-action__single trending-action__single--v2" style="border: 2px dashed; height: 100%">'+
                //                     '<div class="block-content block-content-full d-flex justify-content-between align-items-center flex-grow-1">'+
                //                     '<div class="item rounded-circle bg-body" style="margin: 0 auto;">'+
                //                         '<i class="fa fa-plus fa-lg text-primary"></i>'+
                //                     '</div>'+
                //                     '</div>'+
                //                     '<div class="block-content block-content-full block-content-sm bg-body-light fs-sm text-center">'+
                //                     '<a class="fw-medium" href="#">'+
                //                         'Tambahkan Pegawai Baru'+
                //                         '<i class="fa fa-arrow-right ms-1 opacity-25"></i>'+
                //                     '</a>'+
                //                     '</div>'+
                //                 '</div>'+
                //                 '</a>'+
                //             '</div>';

                $("#pegawai-container #content").html(dataHtml);
            }
            })
        })('#pegawai-pagination-container');
    }
</script>                     