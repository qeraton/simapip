@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Edit Data Pangkat </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit Data Pangkat Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('pangkat/update', $pangkatEdit['id']) }}">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            @if ($errors->any())
                                              <div id="error-alert"
                                                class="alert alert-danger alert-dismissible fade show"
                                                role="alert">
                                                  <ul>
                                                      @foreach ($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                      @endforeach
                                                  </ul>
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                            @endif

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Kode Pangkat</label>
                                                <input class="nftmax__item-input rounded-0" type="number"
                                                    name="kode" id="kode" placeholder="Edit Kode"
                                                    required="required" value="{{ $pangkatEdit['kode'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama Pangkat </label>
                                                <input class="nftmax__item-input" type="text" name="nama"
                                                    id="nama" placeholder="Edit Nama Pangkat" required="required"
                                                    value="{{ $pangkatEdit['nama'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Kode Golongan </label>
                                                <div class="kode-before">
                                                    <label for="golongan_kode">Kode Golongan Sebelumnya : </label>
                                                    <input type="text" id="golongan_kode" disabled value="{{ $pangkatEdit['golongan_kode'] }}">
                                                </div>
                                              <div class="input-group input-group-sm m-4 w-50">
                                                <input class="form-control" type="text" name="golongan_kode_kiri" id="golongan_kode_kiri" placeholder="Input Golongan Ke - I, II, III, IV">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text">/</div>
                                                </div>
                                                <input class="form-control" type="text" name="golongan_kode_kanan" id="golongan_kode_kanan" placeholder="Input Golongan - a, b, c, d"></input>
                                              </div>
                                            </div>
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Golongan </label>
                                                <input class="nftmax__item-input" type="number" name="golongan"
                                                    id="golongan" placeholder="Edit Golongan" required="required"
                                                    value="{{ $pangkatEdit['golongan'] }}">
                                            </div>
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Urutan </label>
                                                <input class="nftmax__item-input" type="number" name="urutan"
                                                    id="urutan" placeholder="Edit Urutan" required="required"
                                                    value="{{ $pangkatEdit['urutan'] }}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/pangkat') }}" type="submit">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn"
                                        type="submit">Perbarui</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <!-- End Dashboard Inner -->
        </div>
    </div>
    @include('Layout.Template.Footer')
