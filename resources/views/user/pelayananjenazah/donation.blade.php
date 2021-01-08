@extends('user.default')

@include('user.pelayananjenazah.intro')

@section('content')

<div class="container">
    <form action="#" id="donation_form">
        <legend>Donation</legend>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="donor_name" class="form-control" id="donor_name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">E-Mail</label>
                    <input type="email" name="donor_email" class="form-control" id="donor_email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Jenis Donasi</label>
                    <select name="donation_type" class="form-control" id="donation_type">
                        <option value="medis_kesehatan">Medis & Kesehatan</option>
                        <option value="kemanusiaan">Kemanusiaan</option>
                        <option value="bencana_alam">Bencana Alam</option>
                        <option value="rumah_ibadah">Rumah Ibadah</option>
                        <option value="beasiswa_pendidikan">Beasiswa & Pendidikan</option>
                        <option value="sarana_infrastruktur">Sarana & Infrastruktur</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" name="amount" class="form-control" id="amount">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Catatan (Opsional)</label>
                    <textarea name="note" cols="30" rows="3" class="form-control" id="note"></textarea>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Kirim</button>
    </form>
</div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.4.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey')}}">
</script>

<script>
    $("#donation_form").submit(function (event) {
        event.preventDefault();

        $.post("/api/donation", {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            donor_name: $('input#donor_name').val(),
            donor_email: $('input#donor_email').val(),
            donation_type: $('select#donation_type').val(),
            amount: $('input#amount').val(),
            note: $('textarea#note').val(),
        },
        function (data, status) {
            snap.pay(data.snap_token, {
                    //optional
                    onSuccess: function(result) {
                        location.reload();
                    },

                    //optional
                    onPending: function (result) {
                        location.reload();
                    },

                    //optional
                    onError: function (result) {
                        location.reload();
                    }
            });
            return false;
        });
    });
</script>



@endpush