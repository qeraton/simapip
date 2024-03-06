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
										<h2 class="nftmax-inner__page-title">Create new item</h2>
									</div>
									<!-- End All Notification Heading -->

                <form action="{{ url('/jenis-pengawasan/update', $jenis['id']) }}" method="post">
                    @csrf
                    @method('PATCH')
                        <div class="nftmax__item-form--group">
                            <label class="nftmax__item-label">Kode</label>
                            <input class="nftmax__item-input" type="number" placeholder=""
                                required="required" name="kode" value="{{ $jenis['kode'] }}">
                        </div>

                        <div class="nftmax__item-form--group">
                            <label class="nftmax__item-label">Nama</label>
                            <input class="nftmax__item-input" type="text"
                                placeholder="" required="required" name="nama" value="{{ $jenis['nama'] }}">
                        </div>

                        <div class="nftmax__item-button--group">
                            <a class="nftmax__item-button--single nftmax__item-button--cancel" href="{{ url('/jenis-pengawasan') }}">Batal</a>
                            <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius " type="submit">Buat
                            </button>
                        </div>
    </form>

                        <div class="trending-action">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row nftmax-gap-sq30">
                                        <div id="pegawai-container"></div>
                                        <div id="pegawai-pagination-container" class="pull-left"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Welcome CTA -->
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

