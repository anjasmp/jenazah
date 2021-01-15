@extends('user.default')
@include('user.partials.header')
@include('user.pelayananjenazah.introcheckout')

@section('content')

<main>

  <section class="section-details-content">
    <div class="container">
      <div class="row row-eq-height justify-content-center">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details mb-3">
            <h1>Siap untuk bergabung?</h1>
            <p>
              Paket {{ $item->product->title }}
            </p>
            
              <div class="member mt-3">
                <h2>Data Penanggung Jawab</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                
              @if(Session::has('failed'))
              <div class="alert alert-danger" role="alert">
               {{ Session('failed')}}
              </div>
              @endif


                <p>Nama : <span style="font-weight: bold; color: #039ea3">{{ Auth::user()->name }}</span> </p>
                <p>Email : <span style="font-weight: bold; color: #039ea3">{{ Auth::user()->email }}</span> </p>

                <form action="{{ route('product.checkout-create', $item->id)}}" method="post" id="authForm" enctype="multipart/form-data">
                  @csrf

                  <p style="margin-bottom: -1px">Tempat Lahir</p>
                  <input
                  name="tempat_lahir"
                    type="text"
                    class="form-control mb-2 mr-sm-2"
                    id="inputTempatLahir"
                    value="{{ old('tempat_lahir') }}"
                  />

                  <p style="margin-bottom: -1px">Tanggal Lahir</p>
                  <input
                  name="tanggal_lahir"
                    type="date"
                    class="form-control mb-2 mr-sm-2"
                    id="inputTanggalLahir"
                    value="{{ old('tanggal_lahir') }}"
                  />

                  <p style="margin-bottom: -1px">Nomor Induk Kependudukan</p>
                  <input
                  name="nik"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputNik"
                    value="{{ old('nik') }}"
                  />

                  <p style="margin-bottom: -1px">Alamat</p>
                  <textarea
                  name="alamat"
                  class="form-control mb-2 mr-sm-2"
                  id="alamat"
                  cols="10"
                  rows="3">{{ old('alamat') }}</textarea>

                <p style="margin-bottom: -1px">Telepon</p>
                  <input
                  name="telepon"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputTelepon"
                    value="{{ old('telepon') }}"
                  />

                  <p style="margin-bottom: -1px">Pekerjaan</p>
                  <input
                  name="pekerjaan"
                    type="text"
                    class="form-control mb-2 mr-sm-2"
                    id="inputPekerjaan"
                    value="{{ old('pekerjaan') }}"
                  />
                  
                  <p style="margin-bottom: -1px">Nomor Kartu Keluarga</p>
                  <input
                  name="no_kk"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    id="inputNoKk"
                    value="{{ old('no_kk') }}"
                  />

                  <p style="margin-bottom: -1px">Scan kartu Tanda Penduduk</p>
                  <p style="margin-bottom: -1px; color: gray; font-size: 80%">Image, Size Max:1Mb</p>
                  <input
                  name="scan_ktp"
                    type="file"
                    class="form-control mb-2 mr-sm-2"
                    id="inputScanKTP"
                    value="{{ old('scan_ktp') }}"
                  />

                  <p style="margin-bottom: -1px">Scan Kartu Keluarga</p>
                  <p style="margin-bottom: -1px; color: gray; font-size: 80%">Image, Size Max:1Mb</p>
                  <input
                  name="scan_kk"
                    type="file"
                    class="form-control mb-2 mr-sm-2"
                    id="inputScanKk"
                    value="{{ old('scan_kk') }}"
                  />

                  <hr / style="margin-bottom: 30px; margin-top: 60px">

                </form>
                
          </div>
          {{-- <div class="text-left mt-3 mb-3">
            <a href="#" class="text-muted">Syarat & ketentuan berlaku</a>
          </div> --}}
          <div class="join-container">
            <button class="btn btn-block btn-join-now mt-3 py-2" type="submit" form="authForm">Daftar Sekarang</button>
          </div>
          <div class="text-center mt-3">
            <form action="{{ route('product.checkout-cancel', $item->id)}}" method="POST">
              @csrf @method('POST')
            <button class="btn btn-block btn-join-now mt-3 py-2" style="color: #b1b1b1 !important; background: none !important; border: none !important; "  type="submit">Batal Daftar</button>
            </form>
          </div>
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
            format: 'yyyy-mm-dd'
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