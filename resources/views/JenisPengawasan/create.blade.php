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
                            <h2 class="nftmax-inner__page-title">Tambah Jenis Pengawasan Baru</h2>
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
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Inputkan Kode dan Nama tentang Jenis Pengawasan</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>


                            <form action="{{ url('/jenis-pengawasan/store') }}" method="post">
                                @csrf
                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">Kode</label>
                                    <input class="nftmax__item-input" type="number" placeholder="" required="required"
                                        name="kode">
                                </div>

                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">Nama</label>
                                    <input class="nftmax__item-input" type="text" placeholder="" required="required"
                                        name="nama">
                                </div>

                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/jenis-pengawasan') }}">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                        type="submit">Tambah
                                    </button>
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
