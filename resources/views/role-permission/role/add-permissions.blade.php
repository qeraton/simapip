@include('Layout.Header')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 nftmax-main__column">
                <div class="nftmax-body strata-body">
                    <!-- Dashboard Inner -->
                    <div class="nftmax-dsinner">
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Create, Read(view), Update, Delete</h2>
                        </div>
                        <!-- End All Notification Heading -->

                        <div class="nftmax__item">
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">
                                    Beri Permission Untuk Role : <b class="badge bg-primary"><i>{{ $role->name }}</i></b>
                                </h2>
                                <p class="nftmax__item-text nftmax__item-text--single">
                                    Mohon Beri Check Pada Permission Yang Akan Anda Berikan Pada Role : <i>{{ $role->name }}</i>
                                </p>
                                <hr>
                            </div>
                            <form class="form" method="POST" action="{{ url('roles/' . $role->id . '/give-permissions') }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-4" id="permissionTabs" role="tablist">
                                            @php
                                                $groupedPermissions = $permissions->groupBy(function ($item) {
                                                    $parts = explode(' ', $item->name);
                                                    $moduleName = implode(' ', array_slice($parts, 1)); // Mengambil semua kata kecuali yang pertama
                                                    return $moduleName;
                                                });
                                            @endphp
                                            @php
                                                $firstTab = true;
                                                $regularTabs = [];
                                                $advancedTabs = [];
                                            @endphp
                                            @foreach ($groupedPermissions as $module => $permissions)
                                                @if (in_array(strtolower($module), ['role', 'permission', 'user', 'permission to users']))
                                                    @php
                                                        $advancedTabs[$module] = $permissions;
                                                    @endphp
                                                @else
                                                    @php
                                                        $regularTabs[$module] = $permissions;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @foreach ($regularTabs as $module => $permissions)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $firstTab ? 'active' : '' }}"
                                                       id="tab-{{ Str::slug($module) }}-tab"
                                                       data-toggle="tab"
                                                       href="#tab-{{ Str::slug($module) }}"
                                                       role="tab"
                                                       aria-controls="tab-{{ Str::slug($module) }}"
                                                       aria-selected="{{ $firstTab ? 'true' : 'false' }}">{{ $module }}</a>
                                                </li>
                                                @php $firstTab = false; @endphp
                                            @endforeach

                                            <li class="nav-item">
                                                <a class="nav-link"
                                                   id="tab-advanced-tab"
                                                   data-toggle="tab"
                                                   href="#tab-advanced"
                                                   role="tab"
                                                   aria-controls="tab-advanced"
                                                   aria-selected="false">Advanced</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="permissionTabsContent">
                                            @php $firstPane = true; @endphp
                                            @foreach ($regularTabs as $module => $permissions)
                                                <div class="tab-pane fade {{ $firstPane ? 'show active' : '' }}"
                                                     id="tab-{{ Str::slug($module) }}"
                                                     role="tabpanel"
                                                     aria-labelledby="tab-{{ Str::slug($module) }}-tab">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-unique">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 70%;">Permission</th>
                                                                    <th style="width: 30%;" class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($permissions as $item)
                                                                    <tr>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td class="text-center">
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       name="permission[]"
                                                                                       value="{{ $item->name }}"
                                                                                       {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}
                                                                                       class="form-check-input permission-checkbox">
                                                                                    <label class="form-check-label"
                                                                                        for="permission{{ $item->id }}">{{$item->name}}
                                                                                    </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @php $firstPane = false; @endphp
                                            @endforeach

                                            <div class="tab-pane fade"
                                                 id="tab-advanced"
                                                 role="tabpanel"
                                                 aria-labelledby="tab-advanced-tab">
                                                <div class="advanced-scroll">
                                                    @foreach ($advancedTabs as $module => $permissions)
                                                        <h4>{{ $module }}</h4>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-unique">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 70%;">Permission</th>
                                                                        <th style="width: 30%;" class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($permissions as $index => $item)
                                                                        <tr>
                                                                            <td>{{ $item->name }}</td>
                                                                            <td class="text-center">
                                                                                <div class="form-check">
                                                                                    <input type="checkbox"
                                                                                           name="permission[]"
                                                                                           value="{{ $item->name }}"
                                                                                           {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}
                                                                                           class="form-check-input permission-checkbox"
                                                                                           data-module="{{ Str::slug($module) }}"
                                                                                           data-index="{{ $index }}">
                                                                                        <label class="form-check-label"
                                                                                            for="permission{{ $item->id }}">{{$item->name}}
                                                                                        </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="form-check">
                                        <input type="checkbox"
                                               id="select-all"
                                               class="form-check-input">
                                        <label class="form-check-label" for="select-all">Select All</label>
                                    </div>
                                </div>

                                <div class="nftmax__item-button--group mt-4">
                                    <a class="btn btn-secondary" href="{{ url('roles') }}">Kembali</a>
                                    <button class="btn btn-primary ml-2" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
    {{-- @include('Layout.RightSidebar') --}}
    @include('Layout.Footer')
</section>

<script>
    $(document).ready(function() {
        $('#permissionTabs a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });

        // Function to check if all checkboxes are checked
        function checkAllChecked() {
            var allChecked = true;
            $('.tab-pane.active').find(':checkbox').each(function() {
                if (!$(this).is(':checked')) {
                    allChecked = false;
                    return false; // Exit loop early
                }
            });
            return allChecked;
        }

        // Select All checkbox for all tabs
        $('#select-all').change(function() {
            var checkboxes = $('.tab-pane.active').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
            updateSelectAllCheckbox();
        });

        // Function to update state of select-all checkbox
        function updateSelectAllCheckbox() {
            var activeTabCheckboxes = $('.tab-pane.active').find(':checkbox');
            var allChecked = true;
            activeTabCheckboxes.each(function() {
                if (!$(this).is(':checked')) {
                    allChecked = false;
                    return false; // Exit loop early
                }
            });
            $('#select-all').prop('checked', allChecked);
            $('#select-all').prop('disabled', allChecked);
        }

        // Disable select all if all checkboxes are checked
        $('.tab-pane :checkbox').change(function() {
            updateSelectAllCheckbox();
        });

        // Initial state setup
        updateSelectAllCheckbox();

        // Enable/disable checkboxes within a module in the Advanced tab
        $('.advanced-scroll :checkbox').change(function() {
            var moduleSlug = $(this).data('module');
            var index = $(this).data('index');
            if (index === 0) { // This is the "view" checkbox
                var moduleCheckboxes = $('.advanced-scroll').find(':checkbox[data-module="' + moduleSlug + '"]').not(this);
                moduleCheckboxes.prop('disabled', !$(this).is(':checked'));
            }
        });

        // Initial state setup for advanced scroll checkboxes
        $('.advanced-scroll :checkbox').each(function() {
            var moduleSlug = $(this).data('module');
            var index = $(this).data('index');
            if (index === 0 && !$(this).is(':checked')) { // If the "view" checkbox is not checked initially
                var moduleCheckboxes = $('.advanced-scroll').find(':checkbox[data-module="' + moduleSlug + '"]').not(this);
                moduleCheckboxes.prop('disabled', true);
            }
        });
    });
</script>
