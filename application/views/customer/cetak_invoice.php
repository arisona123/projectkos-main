<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INVOICE-<?php echo $transaksi[0]->id_booking; ?></title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        #invoice {
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
            margin-bottom: 15px;
            border-bottom: 1px solid #28a745
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 15px
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
            color: #28a745
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -120px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {
            padding: 10px;
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
            color: #28a745;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #28a745
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #28a745;
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
            color: #28a745;
            font-weight: bold;
            font-size: 1.4em;
            border-top: 1px solid #28a745
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #28a745;
            padding: 8px 0
        }

        .logo_kos {
            height: 80px;
        }

        .company-details h2,
        .to {
            color: #28a745 !important;
        }

        @media print {
            @page {
                size: landscape;
            }

            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                /* page-break-after: always */
            }

            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <!--Author      : @arboshiki-->
    <div id="invoice">
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <a target="_blank" href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>file/kos_image/sevenkos_green.png" data-holder-rendered="true" class="logo_kos" />
                            </a>
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                                <strong>SevenKos</strong>
                            </h2>
                            <div>Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198</div>
                            <div>(0274) 4534571</div>
                            <div>cs@sevenkos.com</div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE UNTUK:</div>
                            <h2 class="to"><?php echo strtoupper($transaksi[0]->fullname); ?></h2>
                            <div class="address"><?php echo $transaksi[0]->alamat; ?></div>
                            <div class="email"><?php echo $transaksi[0]->email; ?></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">INVOICE #<?php echo $transaksi[0]->id_booking; ?></h1>
                            <div class="date">Invoice dibuat pada : <?php echo $transaksi[0]->tgl_sewa; ?></div>
                            <!-- <div class="date">Due Date: 30/10/2018</div> -->
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left w-50">OBJEK</th>
                                <th class="text-left">DESKRIPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="no">01</td>
                                <td class="text-left">
                                    <h3>Kos Yang Disewa</h3>
                                </td>
                                <td class="total"><?php echo $transaksi[0]->nama; ?></td>
                            </tr>
                            <tr>
                                <td class="no">02</td>
                                <td class="text-left">
                                    <h3>Alamat Kos</h3>
                                </td>
                                <td class="total"><?php echo $transaksi[0]->alamat; ?></td>
                            </tr>
                            <tr>
                                <td class="no">03</td>
                                <td class="text-left">
                                    <h3>Tanggal Mulai Sewa</h3>
                                </td>
                                <td class="total"><?php echo tgl_indo($transaksi[0]->tgl_sewa); ?></td>
                            </tr>
                            <tr>
                                <td class="no">04</td>
                                <td class="text-left">
                                    <h3>Tanggal Selesai</h3>
                                </td>
                                <td class="total"><?php echo tgl_indo($transaksi[0]->tanggal_selesai); ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Harga Sewa</td>
                                <td>Rp. <?php echo number_format($transaksi[0]->harga, 0, ',', '.'); ?> /Bulan</td>
                            </tr>
                            <tr>
                                <td colspan="2">Harga Diskon</td>
                                <td>Rp. <?php foreach ($transaksi as $dt) {
                                    // code...
                                    $harga_awal = $dt->harga;
                                    $diskon = $dt->diskon;
                                    $mendiskon = ($diskon / 100) * $harga_awal;
                                    $harg_akhir = $harga_awal - $mendiskon;

                                    if ($harg_akhir == $transaksi[0]->harga) {
                                        echo '-';
                                    } else {
                                        echo $harg_akhir;
                                    }
                                } ?> /Bulan</td>
                            </tr>
                            <tr>
                                <td colspan="2">Durasi Sewa</td>
                                <td><?php echo $transaksi[0]->tr_kategori; ?> Bulan</td>
                            </tr>
                            <tr>
                                <td colspan="2">TOTAL HARGA</td>
                                <td>Rp. <?php echo number_format($harg_akhir * $transaksi[0]->tr_kategori, 0, ',', '.'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="thanks">Terima Kasih!</div>
                </main>
                <footer>
                    Invoice ini dibuat secara otomatis dan sah tanpa tanda tangan atau materai.
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    window.print();
</script>