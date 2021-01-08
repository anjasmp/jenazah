<section id="pricing" class="pricing">
  <div class="container">

    <header class="section-header">
      <h3>Pilihan Paket</h3>
      <p>Pelayanan terpadu yang sesuai syariah</p>
    </header>

    <div class="row row-eq-height justify-content-center">

      @foreach ($items as $item)
      <div class="col-lg-4 col-md-6">
        <div class="box aos-init aos-animate" data-aos="zoom-in-right" data-aos-delay="200">
          <h3>{{ $item->title }}</h3>
          <h4><sup>Rp.</sup><div class="myDIV">{{ $item->price}}</div><span> / {{ $item->type }}</span></h4>
          <ul>
            <li>{!! $item->features !!}</li>
          </ul>
          <div class="btn-wrap">
            <a href="{{ route('product.detail', $item->slug)}}" class="btn-buy">Cek Detail</a>
          </div>
        </div>
      </div>
      @endforeach

    
    </div>

  </div>
</section>