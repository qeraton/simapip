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
                            <h2 class="nftmax-inner__page-title">Edit Daftar Penugasan</h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Input/Edit Daftar Penugasan Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input/Edit Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('/daftar-penugasan/update', $daftar['id']) }}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box daftar-penugasan-box">

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama Penugasan</label>
                                                <input class="nftmax__item-input" type="text" placeholder="Input Nama Penugasan" required="required"
                                                    name="nama_penugasan" value="{{ $daftar['nama_penugasan'] }}">
                                            </div>
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Deskripsi Penugasan</label>
                                                <input class="nftmax__item-input" type="text" placeholder="Input Deskripsi Penugasan" required="required"
                                                    name="deskripsi_penugasan" value="{{ $daftar['deskripsi_penugasan'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Prioritas</label>
                                                <select class="nftmax__item-input" name="prioritas" required="required">
                                                    <option value="" disabled hidden>Pilih Prioritas</option>
                                                    <option value="Mudah" {{ $daftar['prioritas'] == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                                                    <option value="Sedang" {{ $daftar['prioritas'] == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                    <option value="Sulit" {{ $daftar['prioritas'] == 'Sulit' ? 'selected' : '' }}>Sulit</option>
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
                                        type="submit">Perbaharui
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
