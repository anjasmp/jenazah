<section id="lazhaq" class="section-bg-lazhaq">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center">
        @forelse ($item as $items)
        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
          <div class="box2">
            <h4 class="title">{{$items->jumlah}}</h4>
            <p class="description">Total {{$items->name}}</p>
          </div>
        </div>
        @empty

        <p class="title">Tidak ada data<p>
          
        @endforelse
      </div>
    </div>
  </section>