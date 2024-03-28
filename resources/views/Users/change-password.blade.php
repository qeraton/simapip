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
                            <h2 class="nftmax-inner__page-title">Ubah Password</h2>
                        </div>
                        <!-- End All Notification Heading -->

                        <div class="nftmax__item">
                            @if ($errors->any())
                                <div id="error-alert" class="alert alert-danger alert-dismissible fade show"
                                    role="alert">
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
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan ubah password & pastikan mengingat password lama dan password baru</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Password Yang Valid!</p>
                            </div>


                            <form action="{{ url('/user/mengubah-password') }}" method="post">
								@csrf
                                @method('PATCH')
								<div class="nftmax__item-form--group">
									<label class="nftmax__item-label">Password Lama</label>
									<input class="nftmax__item-input" type="password" placeholder="Password Lama" required="required" name="current_password">
								</div>
							
								<div class="nftmax__item-form--group">
									<label class="nftmax__item-label">Password Baru</label>
									<input class="nftmax__item-input" type="password" placeholder="Password Baru" required="required" name="new_password">
								</div>
							
								<div class="nftmax__item-form--group">
									<label class="nftmax__item-label">Konfirmasi Password Baru</label>
									<input class="nftmax__item-input" type="password" placeholder="Konfirmasi Password Baru" required="required" name="new_password_confirmation">
								</div>
								
								<div class="nftmax__item-button--group">
									<a class="nftmax__item-button--single nftmax__item-button--cancel" href="{{ url('/dashboard') }}">Batal</a>
									<button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius" type="submit">Perbaharui Password</button>
								</div>
							</form>
							

                        </div>

                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
            @include('Layout.Template.Footer')
