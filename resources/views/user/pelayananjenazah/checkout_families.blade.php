@extends('user.default')

@include('user.partials.header')
@include('user.pelayananjenazah.introfamilies')
@section('content')

<main>

    <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details mb-3">
                

                  @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                   {{ Session('success')}}
                  </div>
                  @endif
                <h2>Data Kartu Keluarga</h2>
                <p>
                  Isi sesuai yang ada di kartu keluarga (termasuk pendaftar)
                </p>
                <div class="attendee">
                  <table class="table table-responsive-sm text-center">
                    <thead>
                      <tr>
                        <td scope="col">Name</td>
                        <td scope="col">NIK</td>
                        <td scope="col">Tempat Lahir</td>
                        <td scope="col">Tanggal Lahir</td>
                        <td scope="col"></td>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($item->user_detail->user_families as $key => $detail)
                      <tr>
                        <td class="align-middle">{{ $detail->name }}</td>
                        <td class="align-middle">{{ $detail->nik }}</td>
                        <td class="align-middle">{{ $detail->tempat_lahir }}</td>
                        <td class="align-middle">{{ Carbon\Carbon::parse($detail->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td class="align-middle">
                          <a href="{{ route('product.checkout-removefamilies', $detail->id)}}">
                            <img src="{{ asset('user/assets/img/ic_remove.png')}}" alt="" />
                          </a>
                        </td>
                      </tr>
                      @empty
                          <td colspan="6" class="text-center">
                            Tidak ada Anggota Keluarga
                          </td>
                      @endforelse
                      
                    </tbody>
                  </table>
                </div>
                <div class="member mt-3">
                  <h2>Tambah Anggota Keluarga</h2>
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <form class="form-inline" method="post" action="{{ route('product.checkout-createfamilies', $item->id )}}">
                    @csrf
                    <label class="sr-only" for="inputName">Name</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control mb-2 mr-sm-2"
                      id="name"
                      required
                      placeholder="Name"
                    />

                    <label class="sr-only" for="nik"
                      >Nomor Induk Kependudukan</label
                    >
                    <div class="input-group mb-2 mr-sm-2">
                      <input
                        type="number"
                        name="nik"
                        class="form-control"
                        id="nik"
                        required
                        placeholder="NIK"
                      />
                    </div>
                   

                    <label class="sr-only" for="tempatLahir"
                      >Tempat Lahir</label
                    >
                    <div class="input-group mb-2 mr-sm-2">
                      <input
                        type="text"
                        name="tempat_lahir"
                        class="form-control"
                        id="tempatLahir"
                        required
                        placeholder="Tempat Lahir"
                      />
                    </div>
                    <label class="sr-only" for="tanggalLahir"
                      >Tanggal</label
                    >
                    <div class="input-group mb-2 mr-sm-2">
                      <input
                        type="text"
                        name="tanggal_lahir"
                        class="form-control datepicker"
                        id="tanggalLahir"
                        required
                        placeholder="Tanggal Lahir"
                      />
                    </div>

                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                      Add Now
                    </button>
                  </form>
                  <h3 class="mt-2 mb-0">Note</h3>
                  <p class="disclaimer mb-0">
                    You are only able to invite member that has registered in
                    Nomads.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Informasi Pembayaran</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Anggota</th>
                    <td width="50%" class="text-right">{{ $item->user_detail->user_families-> count() }} person</td>
                  </tr>
                  <tr>
                    <th width="50%">Masa Aktif</th>
                    <td width="50%" class="text-right">{{ Carbon\Carbon::parse($item->masa_aktif)->format('d-m-Y') }}</td>
                  </tr>
                  <tr>
                    <th width="50%">Pendaftaran</th>
                    <td width="50%" class="text-right"><div class="myDIV">{{ $item->product->register }}</div></td>
                  </tr>
                  <tr>
                    <th width="50%">Biaya Langganan</th>
                    <td width="50%" class="text-right"><div class="myDIV">{{ $item->product->price }}</div></td>
                  </tr>
                  <tr>
                    <th width="50%">Total</th>
                    <td width="50%" class="text-right text-total">
                      <span class="text-blue"><div class="myDIV">{{ $item->transaction_total }}</div></span>
                    </td>
                  </tr>
                </table>

                <hr />
                <h2>Instruksi Pembayaran</h2>
                <p class="payment-instructions">
                  Harap selesaikan pembayaran Anda sebelum melanjutkan
                </p>
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img
                      src="{{ asset ('user/assets/img/ic_bsm.png')}}"
                      alt=""
                      class="bank-image"
                    />
                    <div class="description">
                      <h3>71.201.701.41</h3>
                      <p>
                        DKM Masjid Baitul Haq Puri Gading
                        <br />
                        Kode bank [451]
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @if ($item->user_detail->user_families === null)
              <div class="join-container">
                <a
                  href="{{ route('product.detail', $item->product->slug)}}"
                  class="btn btn-block btn-join-now mt-3 py-2"
                  >Batal daftar</a
                >
              </div>
              @else

              <div class="join-container">
                <a
                  href="{{ route ('product.checkout-success', $item->id)}}"
                  class="btn btn-block btn-join-now mt-3 py-2"
                  >Saya Telah Melakukan Pembayaran</a
                >
              </div>
              <div class="text-center mt-3 mb-5">
                <a href="{{ route('product.detail', $item->product->slug)}}" class="text-muted">Batal Daftar</a>
              </div>
              @endif
              
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
              format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                
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