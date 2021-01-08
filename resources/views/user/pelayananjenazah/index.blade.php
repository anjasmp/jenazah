@extends('user.default')

@include('user.pelayananjenazah.intro')

@section('content')

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <table class="table table-striped" id="tableDonation">
        <thead>
            <tr>
                <th>ID</th>
                <th>Donatur Name</th>
                <th>Amount</th>
                <th>Donation Type</th>
                <th>Status</th>
                <th style="text-align: center;"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donations as $key => $donation)
            <tr>
                <th><code>{{ $key + 1 }}</code></th>
                <th>{{ $donation->donor_name }}</th>
                <th>Rp.{{ number_format($donation->amount) }},</th>
                <th>{{ ucwords(str_replace('_', ' ', $donation->donation_type)) }}</th>
                <th>{{ ucfirst($donation->status) }}</th>
                <th style="text-align: center;">
                    @if ($donation->status == 'pending')
                    <button class="btn btn-success btn-sm" onclick="snap.pay('{{ $donation->snap_token }}')">Complete
                        Payment</button>

                    @endif

                </th>
            </tr>

            @endforeach
        </tbody>
    </table>
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
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#tableDonation').dataTable()
    })
</script>




@endpush