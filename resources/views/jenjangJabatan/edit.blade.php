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
                            <h2 class="nftmax-inner__page-title">Edit Data Jenjang Jabatan </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit Jenjang Jabatan Sesuai Dengan Kriteria!</h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('jenjangJabatan/update', $jenjangJabatanEdit['id']) }}">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                           

                                            {{-- <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">ID Jabatan </label>
                                                <input class="nftmax__item-input" type="number" name="ref_jabatan_id"
                                                    id="ref_jabatan_id" placeholder="Edit ID Jabatan" required="required"
                                                    value="{{ $jenjangJabatanEdit['ref_jabatan_id'] }}">
                                            </div> --}}

                                            <div class="nftmax__item-form--group">
												<label class="nftmax__item-label">Edit jabatan </label>
												<select id="selectIDJabatan" class="form-select" name="ref_jabatan_id"
                                                area-label="Default select example" value="{{ $jenjangJabatanEdit['ref_jabatan_id'] }}"></select>
										    </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Kode </label>
                                                <input class="nftmax__item-input rounded-0" type="text"
                                                    name="kode" id="kode" placeholder="Edit Kode"
                                                    required="required" value="{{ $jenjangJabatanEdit['kode'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Nama Jenjang Jabatan </label>
                                                <input class="nftmax__item-input" type="text" name="nama"
                                                    id="nama" placeholder="Edit Nama Jenjang Jabatan" required="required"
                                                    value="{{ $jenjangJabatanEdit['nama'] }}">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Level </label>
                                                <input class="nftmax__item-input" type="number" name="level"
                                                    id="level" placeholder="Edit Level"
                                                    required="required" value="{{ $jenjangJabatanEdit['level'] }}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('/jenjangJabatan') }}" type="submit">Batal</a>
                                    <button
                                        class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn"
                                        type="submit">Perbarui</button>
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
<script>
	function toUpperCaseInput() {
		var inputField = document.getElementById('kode');
		inputField.addEventListener('input', function() {
			this.value = this.value.toUpperCase();
			this.value = this.value.replace(/[^A-Z]/g, '');
		});
	}
	window.onload = toUpperCaseInput;
</script>
