@include('Layout.Header')

<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body jenjang-jabatan-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Edit Data Jenjang Jabatan </h2>
                        </div>
                        <!-- End All Notification Heading -->
                        <div class="nftmax__item jenjang-jabatan-box">
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
<!-- Select2 -->
<script>
    $(document).ready(function() {
        var selectedValue = "{{ $jenjangJabatanEdit['ref_jabatan_id'] }}";
        var selectedText = ""; // Placeholder for the selected text
        
        // Fetch the selected option text if needed
        $.ajax({
            url: "{{ route('selectIDJabatan') }}",
            type: 'GET',
            success: function(response) {
                response.data.forEach(function(item) {
                    if (item.id == selectedValue) {
                        selectedText = item.kode + ' - ' + item.nama;
                    }
                });

                // Create the option and set it as selected if the value exists
                if (selectedText !== "") {
                    var option = new Option(selectedText, selectedValue, true, true);
                    $("#selectIDJabatan").append(option).trigger('change');
                }
            }
        });

        $("#selectIDJabatan").select2({
            placeholder: 'Pilih Jabatan',
            width: 'resolve',
            ajax: {
                url: "{{ route('selectIDJabatan') }}",
                processResults: function({ data }) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id,
                                text: item.kode + ' - ' + item.nama,
                            }
                        })
                    }
                }
            }
        });
        // Additional styling
        $('#selectIDJabatan').next('.select2-container').css('width', '100%');
    });
</script>