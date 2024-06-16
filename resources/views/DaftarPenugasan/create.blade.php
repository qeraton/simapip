@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body daftar-penugasan-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Tambah Daftar Penugasan</h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Input Data Penugasan Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('/daftar-penugasan/store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box jenis-pengawasan-box">

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama Penugasan</label>
                                                <input class="nftmax__item-input" type="text" placeholder="Input Nama Penugasan" required="required"
                                                    name="nama_penugasan">
                                            </div>
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Deskripsi Penugasan</label>
                                                <input class="nftmax__item-input" type="text" placeholder="Input Deskripsi Penugasan" required="required"
                                                    name="deskripsi_penugasan">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Prioritas</label>
                                                <select class="nftmax__item-input" name="prioritas" required="required">
                                                    <option value="" disabled hidden selected>Pilih Prioritas</option>
                                                    <option value="Mudah">Mudah</option>
                                                    <option value="Sedang">Sedang</option>
                                                    <option value="Sulit">Sulit</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/daftar-penugasan') }}">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                        type="submit">Tambah
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
