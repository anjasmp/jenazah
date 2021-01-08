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
    <title>INVOICE</title>
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
    color: #008084
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
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #008084;
    font-size: 1.2em
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

.invoice table .total {
    background: #008084;
    color: #fff
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

/* .currSign:before {
    content: 'Rp';
} */

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
                        <div class="col img" style="float: left">
                            <a target="_blank" href="#">
                                <img src="{{ public_path('src/assets/images/upj-1.png') }}" data-holder-rendered="true" />
                                </a>
                        </div>
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

                @foreach ($items as $item)
                    <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{ $item->user->name }}</h2>
                        <div class="address">{{ $item->user_detail->alamat }}</div>
                        <div class="email">{{ $item->user->email }}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE {{ $item->id }}</h1>
                        
                        <div class="date">Date of Invoice: {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
                        <div class="date">Due Date: {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
                        <div class="invoice-id">STATUS: {{ $item->transaction_status }} </div>
                    </div>
                </div>
                @endforeach
                
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">TITLE</th>
                            <th class="text-left">TYPE</th>
                            <th class="text-left">ACTIVE UNTIL</th>
                            <th class="text-left">REGISTER</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($items as $key => $item)
                        <tr>
                            <td class="no">{{ $item->product->id }}</td></td>
                            <td class="text-left">{{ $item->product->title }}</td>
                            <td class="text-left">{{ $item->product->type }}</td>
                            <td class="text-left">{{ Carbon\Carbon::parse($item->masa_aktif)->format('d-m-Y') }}</td>
                            <td class="unit"><span style="cellspacing="0" cellpadding="0"">Rp. </span>{{ $item->product->register }}</td>
                            <td class="unit"><span style="cellspacing="0" cellpadding="0"">Rp. </span>{{ $item->product->price }}</td>
                            <td class="total"><span style="cellspacing="0" cellpadding="0"">Rp. </span>{{ $item->transaction_total }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data kosong</td>

                        </tr>
                @endforelse
                    </tbody>
                    <tfoot>
                    @foreach ($items as $item)
                        
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="3">SUBTOTAL</td>
                            <td><span style="cellspacing="0" cellpadding="0"">Rp. </span>{{ $item->transaction_total }}</td>
                        </tr>
                        
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="3">GRAND TOTAL</td>
                            <td><span style="cellspacing="0" cellpadding="0"">Rp. </span>{{ $item->transaction_total }}</td>
                        </tr>
                         @endforeach
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Invoice ini dapat dipakai sebagai kartu anggota sementara <br>
                     bagi anggota baru yang belum mendapatkan kartu anggota</div>
                </div>
            </main>
            <footer>
               Faktur dibuat di komputer dan valid tanpa tanda tangan dan stempel.
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

    //     let x = document.querySelectorAll(".myDIV"); 
    // for (let i = 0, len = x.length; i < len; i++) { 
    //     let num = Number(x[i].innerHTML) 
    //               .toLocaleString('en'); 
    //     x[i].innerHTML = num; 
    //     x[i].classList.add("currSign"); 
    // } 


        
  </script>

</body>

</html>