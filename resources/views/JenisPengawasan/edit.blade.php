@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body jenis-pengawasan-body">
                    <section class="breadcrumbs">
                        @include('Layout._includes.breadcrumbs')
                    </section>
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Edit Jenis Pengawasan Baru</h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit Data Jenis Pengawasan Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('/jenis-pengawasan/update', $jenis['id']) }}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box jenis-pengawasan-box">

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Kode</label>
                                                <input class="nftmax__item-input" type="number" placeholder="Input Kode Jenis Pengawasan" value="{{ $jenis['kode']}}"
                                                    name="kode">
                                            </div>
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama</label>
                                                <input class="nftmax__item-input" type="text" placeholder="Input Nama Jenis Pengawasan" value="{{ $jenis['nama']}}"
                                                    name="nama">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/jenis-pengawasan') }}">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                        type="submit">Perbarui
                                    </button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <!-- End Dashboard Inner -->
        </div>
    </div>
    {{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')
