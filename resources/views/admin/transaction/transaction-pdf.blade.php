<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('src/assets/images/favicon.png')}}">
    <title>DAFTAR TRANSAKSI</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style type="text/css">
    #invoice{
padding: 30px;
}

.invoice {
position: relative;
background-color: #FFF;
min-height: 680px;
padding: 15px
}

.invoice header {
padding: 10px 0;
margin-bottom: 20px;
border-bottom: 1px solid #3989c6
}

.invoice .img{
margin-top: 0;
margin-bottom: 0;
text-align: left;
margin-left: 20px
}

.invoice .company-details{
margin-top: 0;
margin-bottom: 0;
margin-left: 20px
}


.invoice .company-details .name {
margin-top: -30px;
margin-bottom: 0;
}

.invoice .contacts {
margin-bottom: 20px
}

.invoice .invoice-to {
text-align: left
}

.invoice .invoice-to .to {
margin-top: 0;
margin-bottom: 0
}

.invoice .invoice-details {
text-align: right
}

.invoice .invoice-details .invoice-id {
margin-top: 0;
color: #008084;
text-align: center;

}

.invoice main {
padding-bottom: 50px
}

.invoice main .thanks {
margin-top: -100px;
font-size: 2em;
margin-bottom: 50px
}

.invoice main .notices {
padding-left: 6px;
border-left: 6px solid #008084;
}

.invoice main .notices .notice {
font-size: 1.2em
}

.invoice table {
table-layout:fixed;
width: 100%;
border-collapse: collapse;
border-spacing: 0;
margin-bottom: 20px
}



.invoice table td,.invoice table th {
padding: 8px;
background: #eee;
border-bottom: 1px solid #fff
}

.invoice table th {
font-size: 100%;
background: #008084;
color: #fff;
font-weight: bold;
text-align: left;
}

.invoice table td h3 {
margin: 0;
font-weight: 400;
color: #008084;
font-size: 1.2em;
text-align: center

}

.invoice table .qty,.invoice table .total,.invoice table .unit {
text-align: right;
font-size: 1.2em
}

.invoice table .no {
color: #fff;
font-size: 1.6em;
background: #008084
}

.invoice table .unit {
background: #ddd
}


.invoice table tbody tr:last-child td {
border: none
}

.invoice table tfoot td {
background: 0 0;
border-bottom: none;
white-space: nowrap;
text-align: right;
padding: 10px 20px;
font-size: 1.2em;
border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
border-top: none
}

.invoice table tfoot tr:last-child td {
color: #008084;
font-size: 1.4em;
border-top: 1px solid #008084;
}

.invoice table tfoot tr td:first-child {
border: none
}

.invoice footer {
width: 100%;
text-align: center;
color: #777;
border-top: 1px solid #aaa;
padding: 8px 0
}

.currSign:before {
content: 'Rp';
}

@media print {
.invoice {
    font-size: 11px!important;
    overflow: hidden!important
}

.invoice footer {
    position: absolute;
    bottom: 10px;
    page-break-after: always
}

.invoice>div:last-child {
    page-break-before: always
}
}
</style>

</head>

<body>


<div id="invoice">

    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    {{-- <div class="col img" style="float: left">
                        <a target="_blank" href="#">
                            <img src="{{ public_path('src/assets/images/upj-1.png') }}" data-holder-rendered="true" />
                            </a>
                    </div> --}}
                    <div class="col company-details">
                        <h2 class="name">
                            Unit Pelayanan Jenazah <br> Masjid Baitul Haq
                        </h2>
                        <div>Jl. Puri Gading Raya, Kel. Jatimelati, Kec. Pondok Melati, <br>
                         Kota Bks, Jawa Barat 17415 - Indonesia</div>
                        <div> +62 852 1327 4473</div>
                        <div>upj@upjmasjidbaitulhaq.com</div>
                    </div>
                </div>
            </header>
            <main>

                <div class="row contacts">
                    <div class="col invoice-details">
                        <h1 class="invoice-id">DAFTAR TRANSAKSI</h1
                    </div>
                </div>
                
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Paket Keanggotaan</th>
                            <th>Penanggung Jawab</th>
                            <th>Periode</th>
                            <th>Total (Rp)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->no_invoice }}</td>
                            <td>{{ ($item->product->title) }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }} s/d {{ Carbon\Carbon::parse($item->masa_aktif)->format('d-m-Y') }}</td>
                            <td><div class="myDIV">{{ $item->transaction_total }}</div></td>
                            @if ($item->transaction_status == 'SUCCESS')
                            <td><span class="badge badge-pill badge-primary" >{{ $item->transaction_status}}</span></td>
                            @else @if ($item->transaction_status == 'IN_CART')
                            <td><span class="badge badge-pill badge-danger" >{{ $item->transaction_status}}</span></td>
                            @else
                            <td><span class="badge badge-pill badge-warning" >{{ $item->transaction_status}}</span></td>
                            @endif
                            @endif
                            
        
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data kosong</td>
        
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
            <footer>
               Dicetak {{ date('Y-m-d H:i:s') }}
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

     <script>
       $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });

        let x = document.querySelectorAll(".myDIV"); 
    for (let i = 0, len = x.length; i < len; i++) { 
        let num = Number(x[i].innerHTML) 
                  .toLocaleString('en'); 
        x[i].innerHTML = num; 
        x[i].classList.add("currSign"); 
    } 


        
  </script>

</body>

</html>