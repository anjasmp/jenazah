@extends('user.default')

@include('user.partials.header')
@include('user.laporan.lazhaq.intro')

@section('content')

<header class="section-header" id="popularContent">
    <h3>Penerimaan & Penyaluran</h3>
    <p>Zakat Fitrah, Zakat Mal (Harta), Infaq & Shodaqoh 1439 H / 2018</p>
  </header>
<div class="container" >
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
            
                    @include('user.laporan.lazhaq.tab_penerimaan')
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <section id="lazhaq" class="section-bg-lazhaq">
                        <div class="container" data-aos="fade-up">
                    
                          @include('user.laporan.lazhaq.tab_penyaluran')
                        </div>
                      </section>
                </div>
              </div>

              

        </div>
    </div>
</div>


@include('user.partials.footer')
@endsection