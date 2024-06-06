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
                                            
                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label mb-0">PKPT </label>
                                                <hr style="width: 100px; border-top: 3px solid red;">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Kode PKPT</label>
                                                  <input class="nftmax__item-input rounded-0" type="number"
                                                      name="kode" id="kode" placeholder="Input Kode"
                                                      required="required">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Nama PKPT</label>
                                                  <input class="nftmax__item-input" type="text" name="nama"
                                                      id="nama" placeholder="Input Nama" required="required">
                                              </div>
                                              
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label" for="jenis">Jenis PKPT</label>
                                                <select class="nftmax__item-input" name="jenis" id="jenis" required="required">
                                                    <option value="" disabled selected>Pilih Jenis</option>
                                                    <option value="Reviu">Reviu</option>
                                                    <option value="Evaluasi">Evaluasi</option>
                                                    <option value="Monitoring">Monitoring</option>
                                                    <option value="Evaluasi dan Monitoring">Evaluasi dan Monitoring</option>
                                                    <option value="Pemeriksaan Khusus">Pemeriksaan Khusus</option>
                                                    <option value="Audit">Audit</option>
                                                    <option value="Audit Operasional">Audit Operasional</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>


                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Unit Kerja/SKPD/Satker</label>
                                                <input class="nftmax__item-input" type="text" name="unit"
                                                    id="unit" placeholder="Input unit" required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label" for="tujuan_audit">Tujuan Audit</label>
                                                <select class="nftmax__item-input" name="tujuan_audit" id="tujuan_audit" required="required">
                                                    <option value="" disabled selected>Pilih Tujuan Audit</option>
                                                    <option value="Evaluasi LAKIP/SAKIP">Evaluasi LAKIP/SAKIP</option>
                                                    <option value="Reviu LKPD">Reviu LKPD</option>
                                                    <option value="Pengelolaan Dana Desa">Pengelolaan Dana Desa</option>
                                                    <option value="Reviu RKA">Reviu RKA</option>
                                                    <option value="Pemutakhiran Data Pengawasan Tk Provinsi">Pemutakhiran Data Pengawasan Tk Provinsi</option>
                                                    <option value="Pengawasan Otsus">Pengawasan Otsus</option>
                                                    <option value="Monitoring Tindak Lanjut LHP BPK/Inspektorat">Monitoring Tindak Lanjut LHP BPK/Inspektorat</option>
                                                    <option value="Penanganan Pengaduan Masyarakat">Penanganan Pengaduan Masyarakat</option>
                                                    <option value="Opname Kas dan Persediaan">Opname Kas dan Persediaan</option>
                                                    <option value="Audit Kinerja">Audit Kinerja</option>
                                                    <option value="Pemeriksaan Reguler">Pemeriksaan Reguler</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>


                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Ruang Lingkup </label>
                                                {{-- <input class="nftmax__item-input" type="number" name="ruang_lingkup"
                                                    id="ruang_lingkup" placeholder="Tahun..." required="required"> --}}
                                                <input class="nftmax__item-input" type="number" placeholder="YYYY" min="1999" max="2040" name="ruang_lingkup"
                                                id="ruang_lingkup" placeholder="Tahun..." required="required">
                                                <script>
                                                    document.querySelector("input[type=number]")
                                                    .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                                </script>
                                            </div>

                                            {{-- <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Susunan Tim </label>
                                                <input class="nftmax__item-input" type="text" name="susunan_tim"
                                                    id="susunan_tim" placeholder="Input Susunan Tim" required="required">
                                            </div> --}}

                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label mb-0">Susunan Tim </label>
                                                <hr style="width: 100px; border-top: 3px solid red;">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">PJ</label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number"
                                                      name="pj" id="pj" placeholder="Input Jumlah PJ"
                                                      required="required">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">PT/WPJ</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="pt_wpj"
                                                      id="pt_wpj" placeholder="Input Jumlah PT/WPJ" required="required">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">KT</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="kt"
                                                      id="kt" placeholder="Input Jumlah KT" required="required">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">AT</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="at"
                                                      id="at" placeholder="Input Jumlah AT" required="required">
                                              </div>

                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">
                                          
                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Anggaran Waktu </label>
                                              <hr style="width: 100px; border-top: 3px solid; color: red">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">DK </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number" name="waktu_dk" id="waktu_dk" 
                                                  placeholder="Input Waktu DK, (jika data tidak ada / 0 tidak perlu di isi)"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LK </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number" name="waktu_lk" id="waktu_lk" 
                                                  placeholder="Input Waktu LK, (jika data tidak ada / 0 tidak perlu di isi)" 
                                                  pattern="^([0-1]?[0-9]|2[0-3])$">
                                              </div>
                                              
                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">HP </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number" name="waktu_hp" id="waktu_hp" 
                                                  placeholder="Input Waktu HP, (jika data tidak ada / 0 tidak perlu di isi)"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$">
                                              </div>
                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">

                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Anggaran Biaya </label>
                                              <hr style="width: 100px; border-top: 3px solid; color: red">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">DK </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number"
                                                      name="biaya_dk" id="biaya_dk" placeholder="Input Biaya DK, (jika data tidak ada / 0 tidak perlu di isi)">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LK </label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="biaya_lk"
                                                      id="biaya_lk" placeholder="Input Biaya LK, (jika data tidak ada / 0 tidak perlu di isi)">
                                              </div>
                                              
                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">

                                           <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">RMP</label>
                                              <input style="width: 40%" class="nftmax__item-input" type="number" name="rmp" id="rmp" 
                                              placeholder="Input RMP" required="required" step="0.01">
                                          </div>

                                          <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">RPL</label>
                                              <input style="width: 40%" class="nftmax__item-input" type="number" name="rpl" id="rpl" 
                                              placeholder="Input RPL" required="required" step="0.01">
                                          </div>


                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LHA </label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="lha"
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
    {{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')
