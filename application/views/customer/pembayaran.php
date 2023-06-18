<style>
	body {
		background: #1cc88a;
	}
</style>
<div class="container mt-5 bg-success">
	<div class="row mt-5">
		<div class="col-md-7">

			<div class="card " style="margin-top: 115px;">
				<div class="card-header">

					<h4> Invoice Pembayaran</h4>
				</div>
				<div class="card-body">
			
					<table class="table table-striped">
						<?php foreach ($transaksi as $dt) : ?>
							<?php
                        $harga_awal = $dt->harga;
                        $diskon = $dt->diskon;
                        $mendiskon = ($diskon / 100) * $harga_awal;
                        $harg_akhir = $harga_awal - $mendiskon;
                        ?>
							<tr>
								<td>Nama penyewa</td>
								<td>:</td>
								<td> <?= ucwords($dt->fullname) ?> </td>
							</tr>		
							<tr>
								<td>Kos yang di sewa</td>
								<td>:</td>
								<td> <?= $dt->nama ?> </td>
							</tr>
							<tr>
								<td>ID Transaksi</td>
								<td>:</td>
								<td> #<?= $dt->id_booking, $dt->id_kos, $dt->id_user ?> </td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>:</td>
								<td>Rp. <?= number_format($dt->harga, 0, ',', '.') ?> /Bulan </td>
							</tr>
							<tr>
								<td>Potongan Harga</td>
								<td>:</td>
								<td>Rp. <?= number_format($mendiskon, 0, ',', '.') ?> </td>
							</tr>
							<tr>
								<td>Tanggal mulai sewa</td>
								<td>:</td>
								<td> <?= tgl_indo($dt->tgl_sewa) ?> </td>
							</tr>
							<tr>

								<td>Kategori Sewa</td>
								<td>:</td>
								<td> <?php if ($dt->tr_kategori == 1) {
											echo 'Per Bulan';
										} elseif ($dt->tr_kategori == 3) {
											echo 'Per 3 Bulan';
										} elseif ($dt->tr_kategori == 6) {
											echo 'Per 6 Bulan';
										} elseif ($dt->tr_kategori == 12) {
											echo 'Per 1 Tahun';
										} ?>
								</td>
							</tr>
							<tr>
								<td>Tanggal Selesai </td>
								<td>:</td>
								<td> <?= tgl_indo($dt->tanggal_selesai) ?> </td>
							</tr>
							<tr>
								<?php
								$tglAwal = strtotime($dt->tgl_sewa);
								$tglAhir = strtotime(($dt->tanggal_selesai) ?? '');
								$jarak = $tglAhir - $tglAwal  ?? '';

								$hari = $jarak / 60 / 60 / 24  ?? '';
								?>

								<td>Lama Sewa </td>
								<td>:</td>
								<td> <?= number_format($hari, 0, '.', ''); ?> Hari</td>

							</tr>
							<tr>
								<td>Jumlah Pembayaran </td>
								<td>:</td>
								<td>
									<button class="badge-pill badge-info"> Rp.
										<?= number_format($harg_akhir * $dt->tr_kategori, 0, ',', '.')  ?> </button>
								</td>
							<tr>
								<td></td>
								<td></td>
								<td> <a href="<?= base_url('customer/transaksi/print_invoice/' . $dt->id_booking) ?>" class="btn btn-info mt-3" target="_blank">Print Invoice</a> </td>
							</tr>
					</table>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="col-md-4 " style="margin-top: 117px;">
			<div class="card border-secondary">
				<div class="card-header alert alert-secondary p-1 text-center">
					<p>Pembayaran</p>
				</div>
				<div class="card-body p-3">
					<p>Silahkan melakukan pembayaran ke rekening dibawah ini. Kemudian, jangan lupa upload bukti
						pembayaran anda</p>
					
					<ul class="list-group list-group-flush">
						<li class="list-group-item"> Bank BCA 456 4882 960</li>
						<li class="list-group-item"> Bank BNI 030 6489 674</li>
						<li class="list-group-item"> Bank BRI 007601031704505</li>
						<li class="list-group-item"> Bank MANDIRI 1370007718568</li>
					</ul>

					<?php if (empty($dt->bukti_pembayaran)) { ?>

						<form action="<?= base_url('customer/transaksi/pembayaran_aksi') ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id_booking" class="form-control" value="<?= $dt->id_booking ?>">
							<input type="file" name="bukti_pembayaran" class="form-control" accept="image/*" required>
							<button type="submit" class="btn btn-success text text-light mt-3 btn-block">Kirim Bukti</button>
						<?php } elseif ($dt->status_pembayaran == '0') { ?>
							<button type="submit" class="btn btn-sm btn-outline-info mt-3 btn-block" style=" color: blue;"> Menunggu Konfirmasi </button>
							<a href="<?= base_url(); ?>file/kos_image/<?= $dt->bukti_pembayaran; ?>" class="text-info" download><small>Download Bukti Pembayaran</small></a>
						<?php } elseif ($dt->status_pembayaran == '1') { ?>
							<button type="submit" class="btn btn-sm btn-outline-info mt-3 btn-block" style=" color: blue;">Transaksi Sukses </button>
						<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>

<!-- loader -->
<!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script src="<?= base_url(); ?>assets/plugins/fontawesome/all.min.js"></script>

</body>

</html>