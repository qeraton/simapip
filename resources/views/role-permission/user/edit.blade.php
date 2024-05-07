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
                            <h2 class="nftmax-inner__page-title">Edit User</h2>
                        </div>
                        <!-- End All Notification Heading -->

                        <div class="nftmax__item">
                            @if ($errors->any())
                                <div id="error-alert" class="alert alert-danger alert-dismissible fade show"
                                    role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="nftmax__item-heading">
                                <h2 class="nftmax__item-title nftmax__item-title--psingle">Silahkan Edit User </h2>
                                <p class="nftmax__item-text nftmax__item-text--single">Mohon Input Data Yang Valid!</p>
                            </div>
                            <form class="form" method="POST" action="{{ url('users/'.$user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Username </label>
                                                <input class="nftmax__item-input" type="text" name="username" placeholder="Ganti username" value="{{ $user->username }}">     
                                            </div>
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Email </label>
                                                <input class="nftmax__item-input" type="text" name="email" placeholder="Ganti email" value="{{ $user->email }}">     
                                            </div>
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Password </label>
                                                <input class="nftmax__item-input" type="text" name="password" placeholder="Ganti password">     
                                            </div>
                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Role </label>
                                                <select name="roles[]" class="form-control" multiple>
                                                  <option value="">Select Role</option>
                                                  @foreach ($roles as $item)
                                                    <option value="{{ $item }}" {{ in_array($item, $userRoles) ? 'selected':'' }}> {{ $item }} </option>
                                                  @endforeach
                                                </select>   
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="nftmax__item-button--group">
                                    <a class="nftmax__item-button--single nftmax__item-button--cancel"
                                        href="{{ url('users') }}" type="submit">Batal</a>
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
    @include('Layout.Template.Footer')