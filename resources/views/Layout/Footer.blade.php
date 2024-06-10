<!-- Jquery JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/iziToast.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-migrate.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/slickslider.min.js')}}"></script>
<script src="{{asset('assets/js/charts.js')}}"></script>
<script src="{{asset('assets/js/countdown.min.js')}}"></script>
<script src="{{asset('assets/js/final-countdown.min.js')}}"></script>
<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Data Tables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>

<script>
	$(document).ready(function () {
    $("#myTable").DataTable({
			responsive: true,
		 	scrollY: 400,
    	deferRender: true,
    	scroller: true,
			// serverSide: true,
			// ajax: 'RPKH/json'
			// paging: true, 
			// pageLength: 3, 
		});
  });

</script>


<script>
jQuery(document).ready(function($) {
		$('[data-countdown]').each(function() {
			var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
			$this.html(event.strftime(' %H : %M : %S'));
			});
		});
});
</script>

<!-- Izi Toast Notification -->

	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<script>
			iziToast.error({
				title: 'error',
				position: 'topRight',
				message: '{{$error}}'
			});
		</script>
		@endforeach
	@endif

	@if (session()->get('success'))
		<script>
			iziToast.success({
				title: 'success',
				position: 'topRight',
				animateInside: true,
				pauseOnHover: true,
				progressBar: true,
				progressBarEasing: 'linear',
				theme: 'light',
				message: '{{session()->get('success')}}'
			});
		</script>
	@endif

<!-- End Izi Toast-->

<!-- Add Permissions Filter -->
	<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modules = document.querySelectorAll('.module-section');

        modules.forEach(module => {
            const firstCheckbox = module.querySelector('.permission-first');
            const restCheckboxes = module.querySelectorAll('.permission-rest');

            firstCheckbox.addEventListener('change', function () {
                restCheckboxes.forEach(checkbox => {
                    checkbox.disabled = !this.checked;
                });
            });

            // Initial state check
            restCheckboxes.forEach(checkbox => {
                checkbox.disabled = !firstCheckbox.checked;
            });
        });
    });
</script>
<!-- End Of Add Permissions Filter -->


<!-- Search Filters -->

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        var searchInput = document.getElementById('txt-search');
        var tableRows = document.querySelectorAll('.nftmax-table__body tr');
        var noDataMessage = document.getElementById('no-data-message');

        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();
            var found = false; // Reset found status for each input event

            tableRows.forEach(function(row) {
                var nama = row.querySelector('#name').textContent.toLowerCase();
                var kode = row.querySelector('#kode').textContent.toLowerCase();
								var search1 = row.querySelector('#search1').textContent.toLowerCase();
                var search2 = row.querySelector('#search2').textContent.toLowerCase();
							

                if (kode.includes(searchTerm) || nama.includes(searchTerm) || search1.includes(searchTerm) || search2.includes(searchTerm)) {
                  row.style.display = '';
                  found = true; // Set found to true if data is found
                } else {
                  row.style.display = 'none';
                }
            });

            // Show or hide noDataMessage based on found status after all iterations
            if (!found) {
                noDataMessage.style.display = 'block';
            } else {
                noDataMessage.style.display = 'none';
            }
        });
    });
</script> --}}

<!-- End OF Search Filters -->

<!-- Select2 -->
<script>
    $(document).ready(function() {
        $("#selectIDJabatan").select2({
            placeholder: 'Pilih Jabatan',
						width: 'resolve',
            ajax: {
                url: "{{route('selectIDJabatan')}}",
								processResults: function({data}){
									return {
										results: $.map(data, function(item){
											return {
												id: item.id,
												text: item.kode + ' - ' + item.nama,
												
											}
										})
									}
								}
            }
        });
    });
</script>