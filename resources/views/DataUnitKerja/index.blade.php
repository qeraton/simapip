@include('Layout.Header')

<style>
    .nftmax-table__text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100px;
}

</style>

<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">

                        <!-- Welcome CTA -->
                        <div class="welcome-cta mg-top-40">
                            <div class="welcome-cta__heading">
                                <h2 class="welcome-cta__title">Seluruh Daftar Unit Kerja</h2>
                                <p class="welcome-cta__text">Anda dapat menambahkan dan mengubah unit kerja di
                                    module ini.</p>
                            </div>
                            <div class="welcome-cta__button">
                                <a href="{{ url('/unit-kerja/create') }}"
                                    class="nftmax-btn nftmax-btn__bordered bg radius">Tambah Unit Kerja</a>
                            </div>
                        </div>
                        <!-- End Welcome CTA -->
                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">Data Unit Kerja
                                    {{-- <span class="nftmax-table__badge"></span> --}}
                                </h3>
                                @if(session()->has('success'))
                                    <script>
                                        toastr.success("{{ session('success') }}");
                                    </script>
                                @endif
                                <div class="nftmax-marketplace__bar-right">
                                    <div class="nftmax-marketplace__bar-one">
                                        <div class="nftmax-marketplace__bar-search">
                                            <button id="btn-search" class="search-btn" type="button"><img
                                                    src="/assets/img/search.png" alt="#"></button>
                                            <input name="txt-search" id="txt-search" value="" type="text"
                                                placeholder="Ketikan Nama Unit, Nama...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="table_1" role="tabpanel"
                                    aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                {{-- <th class="nftmax-table__column-1 nftmax-table__h1">Kode</th> --}}
                                                <th class="nftmax-table__column-2 nftmax-table__h2">Nama Unit</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h3">Nama Singkatan</th>
                                                <th class="nftmax-table__column-4 nftmax-table__h4">Alamat</th>
                                                <th class="nftmax-table__column-5 nftmax-table__h5">Pimpinan</th>
                                                <th class="nftmax-table__column-6 nftmax-table__h6">No. Telp</th>
                                                <th class="nftmax-table__column-7 nftmax-table__h7">Email</th>
                                                <th class="nftmax-table__column-8 nftmax-table__h8">Website</th>
                                                {{-- <th class="nftmax-table__column-9 nftmax-table__h9">No. Urut</th> --}}
                                                <th class="nftmax-table__column-10 nftmax-table__h10">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($unitKerja as $item)
                                                <tr>
                                                    {{-- <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['kode_unit_kerja'] }}
                                                        </p>
                                                    </td> --}}
                                                    <td class="nftmax-table__column-2 nftmax-table__data-2">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nama_unit'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nama_singkatan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-4">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['alamat'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-5 nftmax-table__data-5">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['pimpinan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nomor_telepon'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-7 nftmax-table__data-7">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['email'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-8 nftmax-table__data-8">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            <a href="{{ $item['website'] }}" target="_blank">{{ $item['website'] }}</a>
                                                        </p>
                                                    </td>   
                                                    <td class="nftmax-table__column-10 nftmax-table__data-10">
                                                        <a href="{{ url('/unit-kerja/edit', $item['id']) }}" class="btn btn-primary me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
                                                        <form
                                                            action="{{ url('/unit-kerja/delete', $item['id']) }}"
                                                            method="post" class="d-inline">
                                                            <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- End NFTMax Table Body -->
                                    </table>
                                    <!-- End NFTMax Table -->
                                </div>
                                <div class="tab-pane fade" id="table_2" role="tabpanel"
                                    aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                {{-- <th class="nftmax-table__column-1 nftmax-table__h1">Kode</th> --}}
                                                <th class="nftmax-table__column-2 nftmax-table__h2">Nama Unit</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h3">Nama Singkatan</th>
                                                <th class="nftmax-table__column-4 nftmax-table__h4">Alamat</th>
                                                <th class="nftmax-table__column-5 nftmax-table__h5">Pimpinan</th>
                                                <th class="nftmax-table__column-6 nftmax-table__h6">No. Telp</th>
                                                <th class="nftmax-table__column-7 nftmax-table__h7">Email</th>
                                                <th class="nftmax-table__column-8 nftmax-table__h8">Website</th>
                                                {{-- <th class="nftmax-table__column-9 nftmax-table__h9">No. Urut</th> --}}
                                                <th class="nftmax-table__column-10 nftmax-table__h10">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($unitKerja as $item)
                                                <tr>
                                                    {{-- <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['kode_unit_kerja'] }}
                                                        </p>
                                                    </td> --}}
                                                    <td class="nftmax-table__column-2 nftmax-table__data-2">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nama_unit'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nama_singkatan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-4">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['alamat'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-5 nftmax-table__data-5">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['pimpinan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nomor_telepon'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-7 nftmax-table__data-7">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['email'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-8 nftmax-table__data-8">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            <a href="{{ $item['website'] }}" target="_blank">{{ $item['website'] }}</a>
                                                        </p>
                                                    </td>   
                                                    <td class="nftmax-table__column-10 nftmax-table__data-10">
                                                        <a href="{{ url('/unit-kerja/edit', $item['id']) }}" class="btn btn-primary me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
                                                        <form
                                                            action="{{ url('/unit-kerja/delete', $item['id']) }}"
                                                            method="post" class="d-inline">
                                                            <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- End NFTMax Table Body -->
                                    </table>
                                    <!-- End NFTMax Table -->
                                </div>
                                <div class="tab-pane fade" id="table_3" role="tabpanel"
                                    aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                {{-- <th class="nftmax-table__column-1 nftmax-table__h1">Kode</th> --}}
                                                <th class="nftmax-table__column-2 nftmax-table__h2">Nama Unit</th>
                                                <th class="nftmax-table__column-3 nftmax-table__h3">Nama Singkatan</th>
                                                <th class="nftmax-table__column-4 nftmax-table__h4">Alamat</th>
                                                <th class="nftmax-table__column-5 nftmax-table__h5">Pimpinan</th>
                                                <th class="nftmax-table__column-6 nftmax-table__h6">No. Telp</th>
                                                <th class="nftmax-table__column-7 nftmax-table__h7">Email</th>
                                                <th class="nftmax-table__column-8 nftmax-table__h8">Website</th>
                                                {{-- <th class="nftmax-table__column-9 nftmax-table__h9">No. Urut</th> --}}
                                                <th class="nftmax-table__column-10 nftmax-table__h10">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($unitKerja as $item)
                                                <tr>
                                                    {{-- <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['kode_unit_kerja'] }}
                                                        </p>
                                                    </td> --}}
                                                    <td class="nftmax-table__column-2 nftmax-table__data-2">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nama_unit'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nama_singkatan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-4 nftmax-table__data-4">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['alamat'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-5 nftmax-table__data-5">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['pimpinan'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['nomor_telepon'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-7 nftmax-table__data-7">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            {{ $item['email'] }}
                                                        </p>
                                                    </td>
                                                    <td class="nftmax-table__column-8 nftmax-table__data-8">
                                                        <p class="nftmax-table__text nftmax-table__up-down nftmax-bcolor">
                                                            <a href="{{ $item['website'] }}" target="_blank">{{ $item['website'] }}</a>
                                                        </p>
                                                    </td>   
                                                    <td class="nftmax-table__column-10 nftmax-table__data-10">
                                                        <a href="{{ url('/unit-kerja/edit', $item['id']) }}" class="btn btn-primary me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg></a>
                                                        <form
                                                            action="{{ url('/unit-kerja/delete', $item['id']) }}"
                                                            method="post" class="d-inline">
                                                            <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- End NFTMax Table Body -->
                                    </table>
                                    <!-- End NFTMax Table -->
                                </div>
                            </div>
                        </div>

                        <div class="trending-action">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row nftmax-gap-sq30">
                                        <div id="pegawai-container"></div>
                                        <div id="pegawai-pagination-container" class="pull-left">
                                            @if($unitKerja->lastPage() > 1)
                                                {{ $unitKerja->links() }}
                                            @else
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item disabled">
                                                            <span class="page-link text-secondary"><</span>
                                                        </li>
                                                        <li class="page-item active" aria-current="page">
                                                            <span class="page-link">1</span>
                                                        </li>
                                                        <li class="page-item disabled">
                                                            <span class="page-link text-secondary">></span>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- End Welcome CTA -->
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var searchInput = document.getElementById('txt-search');
        var tableRows = document.querySelectorAll('.nftmax-table__body tr');

        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(function(row) {
                var namaUnit = row.querySelector('.nftmax-table__data-2').textContent.toLowerCase();
                var namaSingkatan = row.querySelector('.nftmax-table__data-3').textContent.toLowerCase();
                var alamat = row.querySelector('.nftmax-table__data-4').textContent.toLowerCase();
                var pimpinan = row.querySelector('.nftmax-table__data-5').textContent.toLowerCase();
                var noTelp = row.querySelector('.nftmax-table__data-6').textContent.toLowerCase();
                var email = row.querySelector('.nftmax-table__data-7').textContent.toLowerCase();
                var web = row.querySelector('.nftmax-table__data-8').textContent.toLowerCase();

                if (namaSingkatan.includes(searchTerm) || namaUnit.includes(searchTerm) || alamat.includes(searchTerm) || pimpinan.includes(searchTerm) || noTelp.includes(searchTerm) || email.includes(searchTerm) || web.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
{{-- @include('Layout.RightSidebar') --}}
@include('Layout.Footer')