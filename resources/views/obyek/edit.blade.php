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
                            <h2 class="nftmax-inner__page-title">Edit Data Obyek </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit Nama,
                                    Alamat, No HP, Email, Website & Pimpinan Anda Sesuai Data Yang Valid</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('obyek/update', $obyekEdit['id']) }}">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            @if ($errors->any())
											<div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											    </div>
										    @endif
                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Kode </label>
                                                    <input class="nftmax__item-input rounded-0" type="text" name="kode"
                                                        id="kode" placeholder="Input Kode" required="required" value="{{ $obyekEdit['kode'] }}"> 
                                                </div>

                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Nama Lengkap </label>
                                                    <input class="nftmax__item-input" type="text" name="nama"
                                                        id="nama" placeholder="Input Nama Lengkap"
                                                        required="required" value="{{ $obyekEdit['nama'] }}">
                                                </div>

                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Alamat </label>
                                                    <input class="nftmax__item-input" type="text" name="alamat"
                                                        id="alamat" placeholder="https:yoursite.lo/imte/item_name123"
                                                        required="required" value="{{ $obyekEdit['alamat'] }}">
                                                </div>

                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">No Telphone </label>
                                                    <input class="nftmax__item-input" type="text" name="no_telp"
                                                        id="no_telp" placeholder="https:yoursite.lo/imte/item_name123"
                                                        required="required" value="{{ $obyekEdit['no_telp'] }}">
                                                </div>

                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Email </label>
                                                    <input class="nftmax__item-input" type="email" name="email"
                                                        id="email" placeholder="https:yoursite.lo/imte/item_name123"
                                                        required="required" value="{{ $obyekEdit['email'] }}">
                                                </div>

                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Website </label>
                                                    <input class="nftmax__item-input" type="text" name="website"
                                                        id="website" placeholder="https:yoursite.lo/imte/item_name123"
                                                        required="required" value="{{ $obyekEdit['website'] }}">
                                                </div>

                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Pimpinan </label>
                                                    <input class="nftmax__item-input" type="text" name="pimpinan"
                                                        id="pimpinan" placeholder="https:yoursite.lo/imte/item_name123"
                                                        required="required" value="{{ $obyekEdit['pimpinan'] }}">
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel" href="{{ url('/obyek') }}" type="submit">Cancel</a>
                                    <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn" type="submit">Update Data</button>
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
