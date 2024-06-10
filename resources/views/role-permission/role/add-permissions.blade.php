@include('Layout.Header')
<!-- NFTmax Dashboard -->
@if (session()->has('success'))
    
    <span class="text-primary">SUCCESS</span>
@endif
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Create, Read(view), Update, Delete</h2>
                        </div>
                        <!-- End All Notification Heading -->

                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Beri Permission Untuk Role :
                                    <b class="nftmax__item-button--single nftmax__item-button--cancel"><i>{{ $role->name }}</i></b></h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                                <hr>
                            </div>
                            <form class="form" method="POST"
                                action="{{ url('roles/' . $role->id . '/give-permissions') }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            <div class="nftmax__item-form--group">
                                                @error('permission')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                @php
                                                    $groupedPermissions = $permissions->groupBy(function ($item) {
                                                        $parts = explode(' ', $item->name);
                                                        $moduleName = implode(' ', array_slice($parts, 1)); // Mengambil semua kata kecuali yang pertama
                                                        return $moduleName;
                                                    });
                                                @endphp
                                                @foreach ($groupedPermissions as $module => $permissions)
                                                    <div class="module-section mb-4">
                                                        <h5>Modul {{ $module }}:</h5>
                                                        <div class="permission-list">
                                                            @foreach ($permissions as $index => $item)
                                                                <div class="permission-item">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                            name="permission[]"
                                                                            value="{{ $item->name }}"
                                                                            {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}
                                                                            class="{{ $loop->first ? 'permission-first' : 'permission-rest' }}"
                                                                            {{ $loop->first ? '' : 'disabled' }}>
                                                                        {{ $item->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <hr style="width: 100px; border-top: 1px solid black;">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('roles') }}" type="submit">Kembali</a>
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
