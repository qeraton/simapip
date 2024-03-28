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
                            <h2 class="nftmax-inner__page-title">Edit Data Strata Pendidikan </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit Nama Pendidikan</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Edit Nama Yang Valid!</p>
                            </div>
                            <form action="{{ url('/strata-pendidikan/update', $pendidikan['id']) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="nftmax__item-form--group">
                                    <label class="nftmax__item-label">Nama</label>
                                    <input class="nftmax__item-input" type="text" placeholder="" required="required"
                                        name="nama" value="{{ $pendidikan['nama'] }}">
                                </div>

                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/strata-pendidikan') }}">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                        type="submit">Perbaharui
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
            @include('Layout.Template.Footer')
