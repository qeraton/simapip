@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body role-body">
                    <section class="breadcrumbs">
                        @include('Layout._includes.breadcrumbs')
                    </section>
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Tambah Role</h2>
                        </div>
                        <!-- End All Notification Heading -->

                        <div class="nftmax__item role-box">
                            
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Inputkan Jenis Role</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <hr>
                            <form class="form" method="POST" action="{{ url('roles') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama Role </label>
                                                <input class="nftmax__item-input" type="text" name="name" placeholder="Input Nama Role, Contoh : 'Super Admin Role'" required="required">
                                                
                                            </div>
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Description </label>
                                                <input class="nftmax__item-input" type="text" name="description" placeholder="Input Deskripsi Role" required="required">
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('roles') }}" type="submit">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn"
                                        type="submit">Simpan</button>

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
