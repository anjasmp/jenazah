@extends('user.default')

@include('user.partials.header')
@include('user.pelayananjenazah.introdetail')
@section('content')

<main>

    <section class="section-details-content" id="popularContent">
      <div class="container" style="margin-top: 30px; margin-bottom: 30px">
        <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details mb-3">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <h1>Donation Packages</h1>
              <p>
                {{ $item->donation_package->title }}
              </p>
              {{-- @auth --}}
              <div class="attendee">
                <table class="table table-responsive-sm text-center">
                  <thead>
                    <tr>
                      <td scope="col">Name</td>
                      <td scope="col">Email</td>
                      @guest
                      <td scope="col">No WhatsApp</td>
                      @endguest
                      <td scope="col">Nominal</td>
                      <td scope="col"></td>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td class="align-middle">{{ $item->userable->name }}</td>
                      <td class="align-middle">{{ $item->userable->email }}</td>
                      @guest
                      <td class="align-middle">{{ $item->userable->no_handphone}}</td>
                      @endguest
                      <td class="align-middle"><div class="myDIV">{{ $item->transaction_total }}</div></td>

                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>Payment Instructions</h2>
              <hr />
              <p class="payment-instructions">
                Silahkan selesaikan pembayaran anda
                
                {{-- lalu konfirmasi ke WhatsApp Center <br> <a href="https://wa.me/message/EMV4ZHEQ3PB7M1" target="_blank" style="font-weight: bold; font-size: 150%"> 0852 1327 4473</a> --}}
              </p>
              <div class="bank">
                @if ($item->donation_package->target_dana == true)
                <div class="bank-item pb-3">
                  <img
                    src="{{ asset('user/assets/img/ic_bsm.png')}}"
                    alt=""
                    class="bank-image"
                  />
                  <div class="description">
                    <h3>71.201.701.09</h3>
                    <p>
                      MASJID BAITUL HAQ PURIGADING
                      {{-- <br>
                      <span style="color: gray; size: 50%">*Rekening Operasional Masjid & Pembangunan Masjid</span> --}}
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                @else
                <div class="bank-item pb-3">
                  <img
                    src="{{ asset('user/assets/img/ic_bsm.png')}}"
                    alt=""
                    class="bank-image"
                  />
                  <div class="description">
                    <h3>71.201.701.17</h3>
                    <p>
                      MASJID BAITUL HAQ PURIGADING
                      <br>
                      <span style="color: gray; size: 50%">*Khusus untuk Operasional Masjid & Pembangunan Masjid</span>
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>

                

                <div class="bank-item pb-3">
                  <img
                    src="{{ asset('user/assets/img/qr1.png')}}"
                    style="width: 100%"
                    alt=""
                    class="bank-image"
                  />
                  <div class="description">
                    <p>
                      Scan QR Code bisa digunakan diberbagai aplikasi pembayaran sejenis
                      <br>
                      <span style="color: gray; size: 50%">*Khusus untuk Operasional Masjid & Pembangunan Masjid</span>
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                @endif
                

              </div>
            </div>
            <div class="join-container">
            <a href="{{ route('donation.checkout-success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">Saya sudah Transfer</a>
            </div>
            <div class="text-center mt-3">
              <a href="{{ route('donation.detail', $item->donation_package->slug)}}" class="text-muted">Cancel Donation</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

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

<script src="{{ asset('user/assets/vendor/retina/retina.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/xzoom/dist/xzoom.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/gijgo/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function() {
          $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
          });
  
          $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons: {
              rightIcon: '<img src="{{ asset('user/assets/img/ic_doe.png')}}" alt="" />'
            }
          });
        });
      </script>

<script>
  let x = document.querySelectorAll(".myDIV"); 
  for (let i = 0, len = x.length; i < len; i++) { 
      let num = Number(x[i].innerHTML) 
                .toLocaleString('en'); 
      x[i].innerHTML = num; 
      x[i].classList.add("currSign"); 
  } 
</script>




@endpush