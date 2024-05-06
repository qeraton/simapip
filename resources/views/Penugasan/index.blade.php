@extends('Layout.header')
@section('content')
<div class="nftmax-inner__heading">
    <h2 class="nftmax-inner__page-title">Penugasan</h2>
</div>

<penugasan-page
    :csrf-token="'{{ csrf_token() }}'"
>

</penugasan-page>
@endsection
