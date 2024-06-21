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
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Tambah Data RPKH (Rencana Pelaksananaan Kegiatan Harian) </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Input Data RPKH Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('RPKH/store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama Kegiatan </label>
                                                <input class="nftmax__item-input" type="text" name="nama_kegiatan"
                                                    id="nama_kegiatan" placeholder="input nama kegiatan" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Kartu Penugasan</label>
                                                <input class="nftmax__item-input" type="text" name="kartu_penugasan"
                                                    id="kartu_penugasan" placeholder="Input Kartu Penugasan" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Hari </label>
                                                <input class="nftmax__item-input" type="text" name="hari"
                                                    id="hari" placeholder="Input Hari" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Tanggal Pelaksanaan Kegiatan </label>
                                                  <input class="nftmax__item-input" type="text" name="tanggal_pelaksanaan_kegiatan"
                                                  id="tanggal_pelaksanaan_kegiatan" placeholder="Input Tanggal Pelaksanaan Kegiatan">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Rencana Kegiatan </label>
                                                  <input class="nftmax__item-input" type="text" name="rencana_kegiatan"
                                                  id="rencana_kegiatan" placeholder="Input Rencana Kegiatan">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Tim </label>
                                                  <input class="nftmax__item-input" type="text" name="tim"
                                                  id="tim" placeholder="Input Tim">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Realisasi Kegiatan </label>
                                                  <input class="nftmax__item-input" type="text" name="realisasi_kegiatan"
                                                  id="realisasi_kegiatan" placeholder="Input Realisasi Kegiatan">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Keterangan </label>
                                                  <input class="nftmax__item-input" type="text" name="keterangan"
                                                  id="keterangan" placeholder="Input Keterangan">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/RPKH') }}" type="submit">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn"
                                        type="submit">Tambah</button>
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
