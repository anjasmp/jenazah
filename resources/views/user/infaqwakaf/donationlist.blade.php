@extends('user.default')

@include('user.partials.header')
@include('user.pelayananjenazah.intro')

@section('content')
  <section class="section-popular-content" id="popularContent">
    <div class="container" data-aos="fade-up">
      <div class="section-popular-travel row justify-content-center">
        @foreach ($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          
          <div
          class="card-travel text-center d-flex flex-column"
        style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}');">
          <div class="travel-country " style="text-shadow: 1px 1px #444544;"><span class="badge badge-pill badge-dark" style="background: #002b65">{{ $item->type }}</span></div>
          <div class="travel-location" style="text-shadow: 1px 1px #444544;"">{{ $item->title }}</div>
          <div class="travel-button mt-auto">
          <a href="{{ route('donation.detail', $item->slug)}}" class="btn btn-travel-details px-4">
              View Details
            </a>
          </div>
        </div>
          
        </div>
        @endforeach
        <footer class="section-footer" style="margin-top: 30px; margin-bottom: 50px;">
            {{ $items->links() }}
    </footer>
        
      </div>
      
    </div>
  </section>

@include('user.partials.footer')
@endsection



@push('scripts')

<script src="https://code.jquery.com/jquery-3.4.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey')}}">
</script>




@endpush