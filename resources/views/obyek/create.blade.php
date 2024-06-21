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
										<h2 class="nftmax-inner__page-title">Tambah Obyek Baru</h2>
									</div>
									<!-- End All Notification Heading -->
									
									<div class="nftmax__item">
										
										<div class="nftmax__item-heading">
											<h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Inputkan Informasi Terkait Obyek Pengawasan</h2>
											<p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
										</div>
										<form class="form" method="POST" action="{{ url('obyek/store') }}">
                      @csrf
											<div class="row">
												<div class="col-12">
													<div class="nftmax__item-box">
																
                                  <div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Kode </label>
																		<input class="nftmax__item-input" type="text" name="kode" id="kode" placeholder="Input Kode" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Nama Obyek </label>
																		<input class="nftmax__item-input" type="text" name="nama" id="nama" placeholder="Input Nama Obyek" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Alamat </label>
																		<input class="nftmax__item-input" type="text" name="alamat" id="alamat" placeholder="Input Alamat" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">No Telphone </label>
																		<input class="nftmax__item-input" type="text" name="no_telp" id="no_telp" placeholder="Input No. Telphone" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Email </label>
																		<input class="nftmax__item-input" type="email" name="email" id="email" placeholder="Input Email Obyek" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Website </label>
																		<input class="nftmax__item-input" type="text" name="website"  id="website" placeholder="Input Website Obyek" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Pimpinan</label>
																		<input class="nftmax__item-input" type="text" name="pimpinan" id="pimpinan" placeholder="Input Pimpinan" required="required">
																	</div>
																	<div>
																		<input class="nftmax__item-input mt-10" type="number" name="nip_pimpinan" id="nip_pimpinan" placeholder="Input NIP Pimpinan" required="required" minlength="18" maxlength="18">
																	</div>
														</div>
													</div>
													<div class="nftmax__item-button--group">
                            <a class="nftmax__item-button--single nftmax__item-button--cancel" href="{{ url('/obyek') }}" type="submit">Batal</a>
														<button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn" type="submit">Simpan</button>
														
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