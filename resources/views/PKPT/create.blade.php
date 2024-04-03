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
                            <h2 class="nftmax-inner__page-title">Tambah Data PKPT </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Input Data PKPT Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('PKPT/store') }}">
                                @csrf
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
                                              <label class="nftmax__item-label">PKPT </label>
                                              <hr style="width: 100px;">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Kode </label>
                                                  <input class="nftmax__item-input rounded-0" type="number"
                                                      name="kode" id="kode" placeholder="Input Kode"
                                                      required="required">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Nama </label>
                                                  <input class="nftmax__item-input" type="text" name="nama"
                                                      id="nama" placeholder="Input Nama" required="required">
                                              </div>
                                              
                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Jenis </label>
                                                  <input class="nftmax__item-input" type="text" name="jenis"
                                                      id="jenis" placeholder="Input jenis" required="required">
                                              </div>
                                            </div>
                                            <hr>
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Unit </label>
                                                <input class="nftmax__item-input" type="text" name="unit"
                                                    id="unit" placeholder="Input unit" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Tujuan Audit </label>
                                                <input class="nftmax__item-input" type="text" name="tujuan_audit"
                                                    id="tujuan_audit" placeholder="Input tujuan audit" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Ruang Lingkup </label>
                                                <input class="nftmax__item-input" type="number" name="ruang_lingkup"
                                                    id="ruang_lingkup" placeholder="Input ruang lingkup" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Susunan Tim </label>
                                                <input class="nftmax__item-input" type="text" name="susunan_tim"
                                                    id="susunan_tim" placeholder="Input Susunan Tim" required="required">
                                            </div>
                                          
                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Anggaran Waktu </label>
                                              <hr style="width: 100px;">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">DK </label>
                                                  <input class="nftmax__item-input rounded-0" type="text" name="waktu_dk" id="waktu_dk" 
                                                  placeholder="Input Waktu DK, (jika data tidak ada / 0 tidak perlu di isi)"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LK </label>
                                                  <input class="nftmax__item-input rounded-0" type="text" name="waktu_lk" id="waktu_lk" 
                                                  placeholder="Input Waktu LK, (jika data tidak ada / 0 tidak perlu di isi)" 
                                                  pattern="^([0-1]?[0-9]|2[0-3])$">
                                              </div>
                                              
                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">HP </label>
                                                  <input class="nftmax__item-input rounded-0" type="text" name="waktu_hp" id="waktu_hp" 
                                                  placeholder="Input Waktu HP, (jika data tidak ada / 0 tidak perlu di isi)"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$">
                                              </div>
                                            </div>
                                            <hr>

                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Anggaran Biaya </label>
                                              <hr style="width: 100px;">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">DK </label>
                                                  <input class="nftmax__item-input rounded-0" type="number"
                                                      name="biaya_dk" id="biaya_dk" placeholder="Input Biaya DK, (jika data tidak ada / 0 tidak perlu di isi)">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LK </label>
                                                  <input class="nftmax__item-input" type="number" name="biaya_lk"
                                                      id="biaya_lk" placeholder="Input Biaya LK, (jika data tidak ada / 0 tidak perlu di isi)">
                                              </div>
                                              
                                            </div>
                                            <hr>

                                           <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">RMP</label>
                                              <input class="nftmax__item-input" type="number" name="rmp" id="rmp" 
                                              placeholder="Input RMP" required="required" step="0.01">
                                          </div>

                                          <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">RPL</label>
                                              <input class="nftmax__item-input" type="number" name="rpl" id="rpl" 
                                              placeholder="Input RPL" required="required" step="0.01">
                                          </div>


                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LHA </label>
                                                  <input class="nftmax__item-input" type="number" name="lha"
                                                  id="lha" placeholder="Input LHA" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Peralatan </label>
                                                  <input class="nftmax__item-input" type="text" name="peralatan" required="required"
                                                  id="peralatan" placeholder="Input Peralatan" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Keterangan </label>
                                                  <input class="nftmax__item-input" type="text" name="keterangan"
                                                  id="keterangan" placeholder="Input Keterangan, (Abaikan jika tidak ada keterangan)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/PKPT') }}" type="submit">Batal</a>
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
    @include('Layout.Template.Footer')
