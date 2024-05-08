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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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