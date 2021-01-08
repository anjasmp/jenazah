@extends('user.default')

@include('user.partials.header')
@include('user.laporan.qurban.intro')

@section('content')

<div class="container" id="popularContent">
    <div class="row" >
        <div class="col" style="text-align: center">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist" style="text-align: center; font-family: "Montserrat", sans-serif;">
                <li class="nav-item" role="presentation" style="float:none;
                display:inline-block;
                zoom:1;">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Penerimaan</a>
                </li>
                <li class="nav-item" role="presentation" style="float:none;
                display:inline-block;
                zoom:1;">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penyaluran</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                  @include('user.laporan.qurban.tab_penerimaan')
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="container" style="margin-top: 50px; margin-bottom: 50px;">

                    @include('user.laporan.qurban.tab_penyaluran')
                </div>

                </div>
              </div>

        </div>
    </div>
</div>


@include('user.partials.footer')
@endsection

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tablepost').dataTable()
})
</script>
@endpush