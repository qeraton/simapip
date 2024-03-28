@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="col-lg-9 col-12 nftmax-main__column">
            <div class="nftmax-body">
                <!-- Dashboard Inner -->
                <div class="nftmax-dsinner">
                    <!-- All Notification Heading -->
                    <div class="nftmax-inner__heading">
                        <h2 class="nftmax-inner__page-title">Edit/Input Unit Kerja</h2>
                    </div>
                    <!-- End All Notification Heading -->

                    <div class="nftmax__item">
                        <div class="nftmax__item-heading">
                            <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Ubah/input Data yang
                                Sesuai dengan Unit Kerja</h2>
                            <p class="nftmax__item-text nftmax__item-text--single">Mohon Ubah/Input Data Yang Valid!</p>
                        </div>


                        <form action="{{ url('/unit-kerja/update', $unitKerja['id']) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Kode <span class="text-danger">*</span></label>
                                        <input class="nftmax__item-input form-control" type="number" placeholder="Inputkan kode yang sesuai!" required="required" name="kode" value="{{ $unitKerja['kode_unit_kerja'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Nama Unit <span class="text-danger">*</span></label>
                                        <input class="nftmax__item-input form-control" type="text" placeholder="Inputkan nama unit yang sesuai!" required="required" name="nama_unit" value="{{ $unitKerja['nama_unit'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Alamat</label>
                                        <input class="nftmax__item-input form-control" type="text" placeholder="Inputkan alamat yang sesuai!" name="alamat" value="{{ $unitKerja['alamat'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Pimpinan</label>
                                        <input class="nftmax__item-input form-control" type="text" placeholder="Inputkan pimpinan yang sesuai!" name="pimpinan" value="{{ $unitKerja['pimpinan'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">No. Telepon</label>
                                        <input class="nftmax__item-input form-control" type="number" placeholder="Inputkan no telepon yang sesuai!" name="no_telp" value="{{ $unitKerja['nomor_telepon'] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Unit Kerja Kode <span class="text-danger">*</span></label>
                                        <input class="nftmax__item-input form-control" type="number" placeholder="Inputkan unit kerja kode yang sesuai!" required="required" name="unitKerja_Kode" value="{{ $unitKerja['UnitKerja_Kode'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Nama Singkatan</label>
                                        <input class="nftmax__item-input form-control" type="text" placeholder="Inputkan nama singkatan yang sesuai!" name="nama_singkatan" value="{{ $unitKerja['nama_singkatan'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Email</label>
                                        <input class="nftmax__item-input form-control" type="email" placeholder="Inputkan email yang sesuai!" name="email" value="{{ $unitKerja['email'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">Website</label>
                                        <input class="nftmax__item-input form-control" type="text" placeholder="Inputkan website yang sesuai!" name="website" value="{{ $unitKerja['website'] }}">
                                    </div>
                                    <div class="nftmax__item-form--group">
                                        <label class="nftmax__item-label">No. Urut <span class="text-danger">*</span></label>
                                        <input id="nomor_urut_input" class="nftmax__item-input form-control" type="number" placeholder="Inputkan no urut yang sesuai!" required="required" name="nomor_urut" value="{{ $unitKerja['nomor_urut'] }}">
                                    </div>                                  
                                </div>
                            </div>
                            
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/unit-kerja') }}">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                        type="submit">Perbaharui
                                    </button>
                                </div>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Kesalahan');
            timeOut: 10000;
        @endforeach
    </script>
@endif

<script>
    document.getElementById('nomor_urut_input').addEventListener('change', function() {
        var value = this.value;
        if (value.length === 1) {
            this.value = '00' + value;
        }else if (value.length === 2) {
            this.value = '0' + value;
        }
    });
</script>

