@include('Layout.header')
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
										<h2 class="nftmax-inner__page-title">EDIT DATA PKPT</h2>
									</div>
									<!-- End All Notification Heading -->
								
									<div class="nftmax-personals">
										<div class="button-form-back">
												<button id="btnCancel" class="btnCancel" data-toggle="modal" data-target="#confirmationModal">
														<i class="fas fa-chevron-left"></i> Kembali
												</button>
										</div>

										<!-- Modal Confirmation -->
										<div id="confirmationModal" class="modal fade">
											<div class="modal-dialog modal-confirm modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header flex-column">
														<div class="icon-box">
															<i class="material-icons">&#xE5CD;</i>
														</div>						
														<h4 class="modal-title w-100">Apakah Anda Yakin?</h4>	
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														<p>Yakin ingin kembali ke halaman?. Progress Anda Tidak Akan Tersimpan.</p>
													</div>
													<div class="modal-footer justify-content-center">
														<button type="button" data-dismiss="modal" aria-label="btn-cancel" class="btn btn-secondary btn-cancel">Tidak</button>
														<button onclick="window.location.href = '<?php echo url('/PKPT'); ?>'" class="btn btn-danger" type="submit">Ya</button>
													</div>
												</div>
											</div>
										</div>    

										<h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan EDIT Data PKPT Sesuai Dengan Kriteria!</h2>
										<p class="nftmax__item-text nftmax__item-text--single mb-4">Mohon Input Data Yang Valid!</p>
										<hr>
										<div class="row">
												<div class="col-lg-3 col-md-2 col-12 nftmax-personals__list">
														<div class="nftmax-psidebar">
																<!-- Features Tab List -->
																<div class="list-group nftmax-psidebar__list" id="list-tab" role="tablist">
																		<a class="list-group-item active" data-bs-toggle="list" href="#id1" role="tab">
																				<span class="nftmax-psidebar__icon">
																						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
																							<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
																						</svg>
																				</span>
																				<span class="nftmax-psidebar__title">PKPT</span>
																		</a>
																		<a class="list-group-item" data-bs-toggle="list" href="#id2" role="tab">
																				<span class="nftmax-psidebar__icon">
																						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-microsoft-teams" viewBox="0 0 16 16">
																							<path d="M9.186 4.797a2.42 2.42 0 1 0-2.86-2.448h1.178c.929 0 1.682.753 1.682 1.682zm-4.295 7.738h2.613c.929 0 1.682-.753 1.682-1.682V5.58h2.783a.7.7 0 0 1 .682.716v4.294a4.197 4.197 0 0 1-4.093 4.293c-1.618-.04-3-.99-3.667-2.35Zm10.737-9.372a1.674 1.674 0 1 1-3.349 0 1.674 1.674 0 0 1 3.349 0m-2.238 9.488-.12-.002a5.2 5.2 0 0 0 .381-2.07V6.306a1.7 1.7 0 0 0-.15-.725h1.792c.39 0 .707.317.707.707v3.765a2.6 2.6 0 0 1-2.598 2.598z"/>
																							<path d="M.682 3.349h6.822c.377 0 .682.305.682.682v6.822a.68.68 0 0 1-.682.682H.682A.68.68 0 0 1 0 10.853V4.03c0-.377.305-.682.682-.682Zm5.206 2.596v-.72h-3.59v.72h1.357V9.66h.87V5.945z"/>
																						</svg>
																				</span>
																				<span class="nftmax-psidebar__title">Susunan Tim </span>
																		</a>

																		<a class="list-group-item" data-bs-toggle="list" href="#id3" role="tab">
																				<span class="nftmax-psidebar__icon">
																						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
																							<path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
																							<path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
																							<path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
																							<path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
																						</svg>
																				</span>
																				<span class="nftmax-psidebar__title">Anggaran Waktu & Biaya </span>
																		</a>

																		<a class="list-group-item" data-bs-toggle="list" href="#id4" role="tab">
																				<span class="nftmax-psidebar__icon">
																						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
																							<path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
																						</svg>
																				</span>
																				<span class="nftmax-psidebar__title">Lanjutan </span>
																		</a>
																</div>
														</div>
												</div>
												
												<div class="col-lg-9 col-md-10 col-12 nftmax-personals__content">
														<div class="nftmax-ptabs">
																<form class="form" method="POST" action="{{ url('PKPT/update', $PKPTEdit['id']) }}">
																		@csrf
                                		@method('PATCH')
																		<div class="nftmax-ptabs__inner">
																				<div class="tab-content" id="nav-tabContent">
																						<!--  Features Single Tab -->
																						<div class="tab-pane fade show active" id="id1" role="tabpanel">
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
																										<script>
																										document.addEventListener("DOMContentLoaded", function() {
																												var select = document.getElementById("jenis");
																												var selectedOption = select.options[select.selectedIndex];
																												if (selectedOption) {
																														var text = selectedOption.text;
																														selectedOption.textContent = text + " (selected)";
																														selectedOption.style.color = "rgba(0, 0, 0, 0.5)"; // Set color to be semi-transparent
																												}
																										});
																									</script>
																							</div>

																							<div class="nftmax__item-form--group">
																									<label class="nftmax__item-label">Unit Kerja/SKPD/Satker</label>
																									<select class="nftmax__item-input" name="unit" id="unit" required="required">
																											<option value="" disabled>Pilih Unit Kerja/SKPD/Satker...</option>
																											@foreach($units as $unit)
																													<option value="{{ $unit->id }}" @if($unit->id == $PKPTEdit->unit_id) selected @endif>{{ $unit->nama_unit }}</option>
																											@endforeach
																									</select>
																									<script>
																										document.addEventListener("DOMContentLoaded", function() {
																												var select = document.getElementById("unit");
																												var selectedOption = select.options[select.selectedIndex];
																												if (selectedOption) {
																														var text = selectedOption.text;
																														selectedOption.textContent = text + " (selected)";
																														selectedOption.style.color = "rgba(0, 0, 0, 0.5)"; // Set color to be semi-transparent
																												}
																										});
																									</script>
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
																								<script>
																										document.addEventListener("DOMContentLoaded", function() {
																												var select = document.getElementById("tujuan_audit");
																												var selectedOption = select.options[select.selectedIndex];
																												if (selectedOption) {
																														var text = selectedOption.text;
																														selectedOption.textContent = text + " (selected)";
																														selectedOption.style.color = "rgba(0, 0, 0, 0.5)"; // Set color to be semi-transparent
																												}
																										});
																									</script>
                                            	</div>

                                            	<div class="nftmax__item-form--group">
																									<label class="nftmax__item-label">Ruang Lingkup</label>
																									<select class="nftmax__item-input" name="ruang_lingkup" id="ruang_lingkup" required="required">
																											<option value="" disabled>Pilih Tahun...</option>
																											@php
																													$currentYear = date('Y');
																													$startYear = 2000;
																											@endphp
																											@for($year = $currentYear; $year >= $startYear; $year--)
																													<option value="{{ $year }}" {{ $year == $PKPTEdit->ruang_lingkup ? 'selected' : '' }}>{{ $year }}</option>
																											@endfor
																									</select>
																									<script>
																										document.addEventListener("DOMContentLoaded", function() {
																												var select = document.getElementById("ruang_lingkup");
																												var selectedOption = select.options[select.selectedIndex];
																												if (selectedOption) {
																														var text = selectedOption.text;
																														selectedOption.textContent = text + " (selected)";
																														selectedOption.style.color = "rgba(0, 0, 0, 0.5)"; // Set color to be semi-transparent
																												}
																										});
																									</script>
																							</div>

																						</div>	
																						<div class="tab-pane fade" id="id2" role="tabpanel">
																								<div class="nftmax__item-form--group">
																										<label class="nftmax__item-label">PJ (Penanggung Jawab)</label>
                                                  <input style="width: 40%" class="nftmax__item-input rounded-0" type="number"
                                                      name="pj" id="pj" placeholder="Input Jumlah PJ"
                                                      value="{{ $PKPTEdit['pj'] }}">
																								</div>

																								<div class="nftmax__item-form--group">
                                                  <label class="nftmax__item-label">PT/WPJ (Pengawas Tim/Wakil Penanggung Jawab)</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="pt_wpj"
                                                      id="pt_wpj" placeholder="Input Jumlah PT/WPJ" value="{{ $PKPTEdit['pt_wpj'] }}">
                                              </div>

																								<div class="nftmax__item-form--group">
																										<label class="nftmax__item-label">KT (Ketua Tim)</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="kt"
                                                      id="kt" placeholder="Input Jumlah KT" value="{{ $PKPTEdit['kt'] }}">
																								</div>

																								<div class="nftmax__item-form--group">
																										<label class="nftmax__item-label">AT (Anggota Tim)</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="at"
                                                      id="at" placeholder="Input Jumlah AT" value="{{ $PKPTEdit['at'] }}">
																								</div>
																						</div>

																						<div class="tab-pane fade" id="id3" role="tabpanel">
																							<label class="nftmax__item-label">Anggaran Waktu </label>
                                              <hr style="width: 100px;">
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

																							<label class="nftmax__item-label">Anggaran Biaya </label>
                                              <hr style="width: 100px;">
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

																						</div>

																						<div class="tab-pane fade" id="id4" role="tabpanel">
																							<div class="nftmax__item-form--group">
																									<label class="nftmax__item-label">RMP (Rencana Mulai Penugasan)</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="rmp" id="rmp" 
                                                  placeholder="Edit RMP" step="0.01" value="{{ $PKPTEdit['rmp'] }}">
																							</div>

																							<div class="nftmax__item-form--group">
																									<label class="nftmax__item-label">RPL (Rencana Penyusunan Laporan)</label>
                                                  <input style="width: 40%" class="nftmax__item-input" type="number" name="rpl" id="rpl" 
                                                  placeholder="Edit RPL" step="0.01" value="{{ $PKPTEdit['rpl'] }}">
																							</div>


																							<div class="nftmax__item-form--group">
																										<label class="nftmax__item-label">LHA (Laporan Hasil Audit)</label>
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

																							<div class="nftmax__item-button--group">
																									<button
																										 class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn"
																											type="submit">Perbarui</button>
																							</div>
																						</div>
																				</div>
																		</div>
																</form>
														</div>
												</div>
										</div>
								</div>


								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>

{{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')
