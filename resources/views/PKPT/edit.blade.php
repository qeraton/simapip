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
                            <h2 class="nftmax-inner__page-title">Edit Data PKPT </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit Data PKPT Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('PKPT/update', $PKPTEdit['id']) }}">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            
                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">PKPT </label>
                                              <hr style="width: 30%; border-top: 3px solid; color: red">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Kode </label>
                                                  <input class="nftmax__item-input rounded-0" type="number"
                                                      name="kode" id="kode" placeholder="Edit Kode"
                                                      value="{{ $PKPTEdit['kode'] }}">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Nama </label>
                                                  <input class="nftmax__item-input" type="text" name="nama"
                                                      id="nama" placeholder="Edit Nama"
                                                      value="{{ $PKPTEdit['nama'] }}">
                                              </div>
                                              
                                              {{-- <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Jenis </label>
                                                  <input class="nftmax__item-input" type="text" name="jenis"
                                                      id="jenis" placeholder="Edit jenis"
                                                      value="{{ $PKPTEdit['jenis'] }}">
                                              </div> --}}
                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label" for="jenis">Jenis PKPT</label>
                                                    <select class="nftmax__item-input" name="jenis" id="jenis">
                                                        @php
                                                            $jenisOptions = [
                                                                'Reviu' => 'Reviu',
                                                                'Evaluasi' => 'Evaluasi',
                                                                'Monitoring' => 'Monitoring',
                                                                'Evaluasi dan Monitoring' => 'Evaluasi dan Monitoring',
                                                                'Pemeriksaan Khusus' => 'Pemeriksaan Khusus',
                                                                'Audit' => 'Audit',
                                                                'Audit Operasional' => 'Audit Operasional',
                                                                // Add more options as needed
                                                            ];
                                                        @endphp
                                                        @foreach ($jenisOptions as $value => $label)
                                                            <option value="{{ $value }}" {{ $PKPTEdit['jenis'] == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">
                                            
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Unit </label>
                                                <input class="nftmax__item-input" type="text" name="unit"
                                                    id="unit" placeholder="Edit unit"
                                                    value="{{ $PKPTEdit['unit'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label" for="tujuan_audit">Tujuan Audit</label>
                                                <select class="nftmax__item-input" name="tujuan_audit" id="tujuan_audit">
                                                    @php
                                                        $tujuanAuditOptions = [
                                                            'Evaluasi Lakip' => 'Evaluasi LAKIP/SAKIP',
                                                            'Reviu LKPD' => 'Reviu LKPD',
                                                            'Pengelolaan Dana Desa' => 'Pengelolaan Dana Desa',
                                                            'Reviu RKA' => 'Reviu RKA',
                                                            'Pemutakhiran Data Pengawasan Tk Provinsi' => 'Pemutakhiran Data Pengawasan Tk Provinsi',
                                                            'Pengawasan Otsus' => 'Pengawasan Otsus',
                                                            'Monitoring Tindak Lanjut LHP BPK/Inspektorat' => 'Monitoring Tindak Lanjut LHP BPK/Inspektorat',
                                                            'Penanganan Pengaduan Masyarakat' => 'Penanganan Pengaduan Masyarakat',
                                                            'Opname Kas dan Persediaan' => 'Opname Kas dan Persediaan',
                                                            'Audit Kinerja' => 'Audit Kinerja',
                                                            'Pemeriksaan Reguler' => 'Pemeriksaan Reguler',
                                                            // Add more options as needed
                                                        ];
                                                    @endphp
                                                    @foreach ($tujuanAuditOptions as $value => $label)
                                                        <option value="{{ $value }}" {{ $PKPTEdit['tujuan_audit'] == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Ruang Lingkup </label>
                                                {{-- <input class="nftmax__item-input" type="number" name="ruang_lingkup"
                                                    id="ruang_lingkup" placeholder="Tahun..." required="required"> --}}
                                                <input class="nftmax__item-input" type="number" placeholder="YYYY" min="1999" max="2040" name="ruang_lingkup"
                                                id="ruang_lingkup" placeholder="Tahun..." value="{{ $PKPTEdit['ruang_lingkup'] }}">
                                                <script>
                                                    document.querySelector("input[type=number]")
                                                    .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                                </script>
                                            </div>

                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label mb-0">Susunan Tim </label>
                                                <hr style="width: 100px; border-top: 3px solid red;">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">PJ</label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number"
                                                      name="pj" id="pj" placeholder="Input Jumlah PJ"
                                                      value="{{ $PKPTEdit['pj'] }}">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">PT/WPJ</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="pt_wpj"
                                                      id="pt_wpj" placeholder="Input Jumlah PT/WPJ" value="{{ $PKPTEdit['pt_wpj'] }}">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">KT</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="kt"
                                                      id="kt" placeholder="Input Jumlah KT" value="{{ $PKPTEdit['kt'] }}">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">AT</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="at"
                                                      id="at" placeholder="Input Jumlah AT" value="{{ $PKPTEdit['at'] }}">
                                              </div>

                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">
                                          
                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Anggaran Waktu </label>
                                              <hr style="width: 30%; border-top: 3px solid; color: red">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">DK </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="text" name="waktu_dk" id="waktu_dk" 
                                                  placeholder="Edit Waktu DK"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$" value="{{ $PKPTEdit['waktu_dk'] }}">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LK </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="text" name="waktu_lk" id="waktu_lk" 
                                                  placeholder="Edit Waktu LK"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$" value="{{ $PKPTEdit['waktu_lk'] }}">
                                              </div>
                                              
                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">HP </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="text" name="waktu_hp" id="waktu_hp" 
                                                  placeholder="Edit Waktu HP"
                                                  pattern="^([0-1]?[0-9]|2[0-3])$" value="{{ $PKPTEdit['waktu_hp'] }}">
                                              </div>
                                            </div>
                                           <hr style="width: 100%; border-top: 3px solid; color: red">

                                            <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">Anggaran Biaya </label>
                                              <hr style="width: 30%; border-top: 3px solid; color: red">
                                                <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">DK </label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number"
                                                      name="biaya_dk" id="biaya_dk" placeholder="Edit Biaya DK"
                                                      value="{{ $PKPTEdit['biaya_dk'] }}">
                                              </div>

                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LK </label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="biaya_lk"
                                                      id="biaya_lk" placeholder="Edit Biaya LK"
                                                      value="{{ $PKPTEdit['biaya_lk'] }}">
                                              </div>
                                              
                                              <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Total </label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="total"
                                                      id="total" placeholder="Edit Total"
                                                      value="{{ $PKPTEdit['total'] }}">
                                              </div>
                                            </div>
                                            <hr style="width: 100%; border-top: 3px solid; color: red">

                                           <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">RMP</label>
                                              <input style="width: 40%" class="nftmax__item-input" type="number" name="rmp" id="rmp" 
                                              placeholder="Edit RMP" step="0.01" value="{{ $PKPTEdit['rmp'] }}">
                                          </div>

                                          <div class="nftmax__item-form--group">
                                              <label class="nftmax__item-label">RPL</label>
                                              <input style="width: 40%" class="nftmax__item-input" type="number" name="rpl" id="rpl" 
                                              placeholder="Edit RPL" step="0.01" value="{{ $PKPTEdit['rpl'] }}">
                                          </div>


                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">LHA </label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="lha"
                                                  id="lha" placeholder="Edit LHA"
                                                  value="{{ $PKPTEdit['lha'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Peralatan </label>
                                                  <input class="nftmax__item-input" type="text" name="peralatan"
                                                  id="peralatan" placeholder="Edit Peralatan"
                                                  value="{{ $PKPTEdit['peralatan'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">Keterangan </label>
                                                  <input class="nftmax__item-input" type="text" name="keterangan"
                                                  id="keterangan" placeholder="Edit Keterangan"
                                                  value="{{ $PKPTEdit['keterangan'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/PKPT') }}" type="submit">Batal</a>
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
 {{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')
