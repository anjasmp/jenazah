@extends('user.default')

@section('content')

<section id="lazhaq" class="section-bg-lazhaq">
  <div class="container" data-aos="fade-up">

    <div class="row justify-content-center">

      <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
        <div class="box2">
          <div class="col text-center">
            <img src="{{ url('user/assets/img/ic_mail.png') }}" alt="" style="width: 100%; margin-bottom: 50px"/>
            <h1>Yay! Berhasil</h1>
            <p>
              Kami telah mengirimi Anda email untuk tanda bukti donasi ...
              <br />
              Jangan lupa untuk konfirmasi yaa
            </p>
            <div class="container">
              <div class="row">
                <div class="col">
                  
            <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-5">
              Home Page
            </a>
            <a href="https://wa.me/message/EMV4ZHEQ3PB7M1" target="_blank" class="btn btn-home-page mt-3 px-5" style="background-color: #038e81 !important">
              Konfirmasi Pembayaran
            </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


  @endsection
