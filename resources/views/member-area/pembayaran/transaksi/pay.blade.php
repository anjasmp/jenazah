@extends('member-area.templates.default')

@section('judul','Pembayaran anda')
@section('content')


<main>

    <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details mb-3">
                <h2>Data Kartu Keluarga</h2>
                <div class="attendee">
                  <table class="table table-responsive-sm text-center">
                    <thead>
                      <tr>
                        <td scope="col">Name</td>
                        <td scope="col">NIK</td>
                        <td scope="col">Tempat Lahir</td>
                        <td scope="col">Tanggal Lahir</td>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($items as $key => $detail)
                      <tr>
                        <td class="align-middle">{{ $detail->name }}</td>
                        <td class="align-middle">{{ $detail->nik }}</td>
                        <td class="align-middle">{{ $detail->tempat_lahir }}</td>
                        <td class="align-middle">{{ Carbon\Carbon::parse($detail->tanggal_lahir)->format('d-m-Y') }}</td>
                      </tr>
                      @empty
                          <td colspan="6" class="text-center">
                            Tidak ada Anggota Keluarga
                          </td>
                      @endforelse
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Informasi Pembayaran</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Anggota</th>
                    <td width="50%" class="text-right">{{ $items->count() }} person</td>
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
                    <div class="description" >
                      <h3 >71.201.701.41</h3>
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
              <div class="join-container">
                <a
                  href="https://wa.me/message/EMV4ZHEQ3PB7M1"
                  class="btn btn-block btn-join-now mt-3 py-2"
                  >Konfirmasi Transfer</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
  </main>


@endsection

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tablepost').dataTable()
})
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