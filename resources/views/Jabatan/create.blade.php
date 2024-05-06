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
										<h2 class="nftmax-inner__page-title">Tambah Jabatan Baru</h2>
									</div>
									<!-- End All Notification Heading -->
									
									<div class="nftmax__item">
										@if ($errors->any())
											<div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
													<ul>
															@foreach ($errors->all() as $error)
																	<li>{{ $error }}</li>
															@endforeach
													</ul>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            								<span aria-hidden="true">&times;</span>
        									</button>
											</div>
										@endif
										<div class="nftmax__item-heading">
											<h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Inputkan Informasi Terkait Jabatan</h2>
											<p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
										</div>
										<form class="form" method="POST" action="{{ url('jabatan/store') }}">
                      @csrf
											<div class="row">
												<div class="col-12">
													<div class="nftmax__item-box">
                                  <div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Kode </label>
																		<input class="nftmax__item-input" type="text" name="kode" id="kode" placeholder="Input Kode" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Nama Jabatan </label>
																		<input class="nftmax__item-input" type="text" name="nama" id="nama" placeholder="Input Jenjang Jabatan" required="required">
																	</div>
																	
																	<div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Deskripsi </label>
																		<input class="nftmax__item-input" type="text" name="deskripsi" id="deskripsi" placeholder="Input deskripsi" required="required">
																	</div>
																	
                                  <div class="nftmax__item-form--group">
																		<label class="nftmax__item-label">Kelompok Jabatan </label>
																		<input class="nftmax__item-input" type="text" name="kelompok_jabatan" id="kelompok_jabatan" placeholder="Input Kelompok Jabatan" required="required">
																	</div>
															</div>
														</div>
													</div>
													<div class="nftmax__item-button--group">
                            <a class="nftmax__item-button--single nftmax__item-button--cancel" href="{{ url('/jenjangJabatan') }}" type="submit">Batal</a>
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
@include('Layout.Template.Footer')