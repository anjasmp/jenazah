<section id="lazhaq" class="section-bg-lazhaq">
    <div class="container" data-aos="fade-up">

      @forelse ($penyaluran as $item)
      <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1);  margin-bottom: 40px; ">
        <div class="col" data-aos="zoom-in" data-aos-delay="100" style="text-align: left">
          <h4 class="title">Mukaddimah</h4>
        <p>{!! $item->mukaddimah !!}</p>
        </div>
      </div>

      <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
          <div class="box1">
            <div class="icon"><img src="{{ asset('user/assets/img/cow.svg')}}" style="width: 30%; margin-left: -150px" alt=""></div>
            <h4 class="title">{{ $item->total_sapi }}</h4>
            <p class="description">Total Sapi</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
          <div class="box1">
            <div class="icon"><img src="{{ asset('user/assets/img/goat.svg')}}" style="width: 20%; margin-left: -150px" alt=""></div>
            <h4 class="title">{{ $item->total_kambing }}</h4>
            <p class="description">Total Kambing</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
          <div class="box1">
            <div class="icon"><img src="{{ asset('user/assets/img/steak.svg')}}" style="width: 40%" alt=""></div>
            <h4 class="title">{{ $item->paket_daging }}</h4>
            <p class="description">Total Paket Daging</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
          <div class="box1">
            <div class="icon"><img src="{{ asset('user/assets/img/teamwork.svg')}}" style="width: 15%; margin-left: -200px" alt=""></div>
            <h4 class="title">{{ $item->penerima }}</h4>
            <p class="description">Total Penerima</p>
          </div>
        </div>

        @empty

        <p class="title">Tidak ada data<p>

        @endforelse

        

        <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1);  margin-bottom: 40px; margin-top: 40px ">
          <div class="col" data-aos="zoom-in" data-aos-delay="100">
            <h4 class="title">Gallery Kegiatan</h4>
            @forelse ($gallery as $item)
        <div class="responsive">
          <div class="gallery2">
            <a target="_blank" href="{{ Storage::url($item->image) }}">
              <img src="{{ Storage::url($item->image) }}" alt="Cinque Terre" width="600" height="400">
            </a>
          </div>
        </div>
        @empty
        <p class="title">Tidak ada data<p>
        @endforelse
        <div class="clearfix"></div>
          </div>
        </div>
      </div>

    </div>
  </section>