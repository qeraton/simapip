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
                            <h2 class="nftmax-inner__page-title">Tambah Data PERMISSIONS</h2>
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
                                            <p>Yakin ingin kembali ke halaman?, Progress Anda Tidak Akan Tersimpan.</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" data-dismiss="modal" aria-label="btn-cancel" class="btn btn-secondary btn-cancel">Tidak</button>
                                            <button onclick="window.location.href = '<?php echo url('/permissions'); ?>'" class="btn btn-danger" type="submit">Ya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Input Data Permission Sesuai Dengan Kriteria!</h2>
                            <p class="nftmax__item-text nftmax__item-text--single mb-4">Mohon Input Data Yang Valid!</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-12 nftmax-personals__list">
                                    <div class="nftmax-psidebar">
                                            <!-- Features Tab List -->
                                            <div class="list-group nftmax-psidebar__list" id="list-tab" role="tablist">
                                                <a class="list-group-item active" data-bs-toggle="list" href="#id1" role="tab">
                                                    <span class="nftmax-psidebar__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                                                        </svg>
                                                    </span>
                                                    <span class="nftmax-psidebar__title">Create Permissions </span>
                                                </a>
                                                {{-- <a class="list-group-item" data-bs-toggle="list" href="#id2" role="tab">
                                                    <span class="nftmax-psidebar__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                                                        </svg>
                                                    </span>
                                                    <span class="nftmax-psidebar__title">Create, Read(View), Update, Delete </span>
                                                </a> --}}
                                            </div>
                                    </div>
                                </div>
                                    
                                <div class="col-lg-9 col-md-10 col-12 nftmax-personals__content">
                                <div class="nftmax-ptabs">
                                    <form class="form" method="POST" action="{{ url('permissions') }}">
                                        @csrf
                                            <div class="nftmax-ptabs__inner">
                                                <div class="tab-content" id="nav-tabContent">
                                                <!--  Features Single Tab -->
                                                <div class="tab-pane fade show active" id="id1" role="tabpanel">
                                                    <div class="nftmax__item-box">
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Nama Permission </label>
                                                            <input class="nftmax__item-input" type="text" name="name" placeholder="Input Nama Permission" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="tab-pane fade show" id="id2" role="tabpanel">
                                                    <div class="nftmax__item-box">
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">View </label>
                                                            <input class="nftmax__item-input" type="text" name="name" placeholder="Input Nama View Permission" required>
                                                            
                                                        </div>
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Create </label>
                                                            <input class="nftmax__item-input" type="text" name="name" placeholder="Input Nama Create Permission" required>
                                                            
                                                        </div>
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Delete </label>
                                                            <input class="nftmax__item-input" type="text" name="name" placeholder="Input Nama Delete Permission" required>
                                                            
                                                        </div>
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Edit </label>
                                                            <input class="nftmax__item-input" type="text" name="name" placeholder="Input Nama Edit Permission" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                </div>
                            </div>
                        </div>
                                        <div class="nftmax__item-button--group">
                                            <button
                                                class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn"
                                                type="submit">Tambah</button>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dashboard Inner -->
    </div>
</div>

{{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')