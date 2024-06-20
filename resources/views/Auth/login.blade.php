@extends('Layout.LoginRegisterLayout')

@section('base')
<div class="col-xxl-6 col-lg-6 col-12">
    <!-- Welcome Form -->
    <div class="nftmax-wc__form">
        <div class="nftmax-wc__form-inner">
            <div class="nftmax-wc__heading">
                <h3 class="nftmax-wc__form-title nftmax-wc__form-title__one" style="background-image:url('img/heading-vector.png')">Log in</h3>
            </div>
            @if(\Session::has('message'))
            <span style="color: red">{{\Session::get('message')}}</span>
            @endif
            <!-- Sign in Form -->
            <form class="nftmax-wc__form-main" action="{{ route('login.call') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="nftmax-wc__form-label">Email Address</label>
                    <div class="form-group__input">
                        <span class="nftmax-wc__icon">
                            <!-- SVG icon here -->
                        </span>
                        <input class="nftmax-wc__form-input" type="email" name="email" placeholder="demo232@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="nftmax-wc__form-label">Password</label>
                    <div class="form-group__input">
                        <span class="nftmax-wc__icon">
                            <!-- SVG icon here -->
                        </span>
                        <input class="nftmax-wc__form-input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="password-field" type="password" name="password" placeholder="" maxlength="8">
                    </div>
                </div>
                <div class="form-group">
                    <div class="nftmax-wc__check-inline">
                        <div class="nftmax-wc__checkbox">
                            <input class="nftmax-wc__form-check" id="checkbox" name="checkbox" type="checkbox">
                            <label for="checkbox">Remember Me</label>
                        </div>
                        <div class="nftmax-wc__forgot">
                            <a href="{{url('/template/forgot-password')}}" class="forgot-pass">Forgot Password?</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="nftmax-wc__button">
                        <input class="ntfmax-wc__btn" type="submit">
                    </div>
                </div>
            </form>
            <!-- End Sign in Form -->
        </div>
    </div>
    <!-- End Welcome Form -->
</div>
@endsection

@include('Layout.Footer')