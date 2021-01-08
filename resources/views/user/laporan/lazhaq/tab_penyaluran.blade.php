<div class="row justify-content-center">

  @forelse ($penyaluran as $item)
   <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
    <div class="box2" >
      <h3>{{ $item->penerimaan_lazhaq->name }}</h3>
      <h4 class="title">{{ $item->jumlah}}</h4>
      <p class="description"> <strong>{{ $item->name}}</strong> </p>
     <div style="text-align: left !important"><p class="description">{!! $item->description !!}</p></div>
    </div>
</div>
@empty
<p class="title">Tidak ada data<p>
@endforelse
</div>