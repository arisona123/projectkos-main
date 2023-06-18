<!DOCTYPE html>
<html lang="en">

<head>
	<title>SevenKos | Solusi cari kost!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 

	<style>
		#text-brand img {
			left: 0;
			padding-top: 15px;
			padding-right: 1rem;
			width: 120px;
			height: 70px;
			-webkit-filter: drop-shadow(5px 5px 5px #222);
			filter: drop-shadow(5px 5px 5px #222);
		}

		#img-brand img {
			padding: 2px 2px 0px 0px;
			left: 0;
			width: 50px;
			transition: 0.4s;
			-webkit-filter: drop-shadow(5px 5px 5px #222);
			filter: drop-shadow(5px 5px 5px #222);
		}

		.navbar-brand-text img {
			-moz-transition: all 0.3s ease;
			-o-transition: all 0.3s ease;
			-webkit-transition: all 0.3s ease;
			transition: all 0.3s ease;
		}

		.navbar-brand-icon:hover img {
			-moz-transform: rotate(-10deg) scale(1.2);
			-ms-transform: rotate(-10deg) scale(1.2);
			-o-transform: rotate(-10deg) scale(1.2);
			-webkit-transform: rotate(-10deg) scale(1.2);
			transform: rotate(-10deg) scale(1.2);
		}

		.navbar-brand-text:hover img {
			-moz-transform: rotate(-8deg) scale(1.1);
			-ms-transform: rotate(-8deg) scale(1.1);
			-o-transform: rotate(-8deg) scale(1.1);
			-webkit-transform: rotate(-8deg) scale(1.1);
			transform: rotate(-8deg) scale(1.1);
		}

		/* .ftco-navbar-light.scrolled .navbar-brand-icon img {
			opacity: 0px;
		} */
	</style>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class=" d-flex align-items-center " href="<?= base_url(); ?>">
				<div class="navbar-brand-icon " id="img-brand">
					<img src=" <?php echo base_url() ?>assets/images/mbakos 1.png" class="ml-2 ">
				</div>
				<div class="navbar-brand-text mx-1 " id="text-brand"> <img src=" <?php echo base_url() ?>assets/images/mbakos 2.png"></div>
			</a>
			<!-- <a class="navbar-brand" href="<?php echo base_url() ?>">SevenKos</a> -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"><i class="fa-sharp fa-solid fa-bars fa-lg"></i></span>
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="<?php echo base_url() ?>" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?php echo base_url() ?>semua-kos" class="nav-link">Kost</a></li>

					<?php
					$sudah_login = $this->session->userdata('sudah_login');
					if ($sudah_login) { ?>
						<li class="nav-item"><a href="<?php echo base_url('profil/' . $this->session->userdata('id_user')) ?>" class="nav-link">Profile</a></li>
						<li class="nav-item"><a href="<?php echo base_url() ?>transaksi" class="nav-link">Transaksi Saya</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>Login/logout" data-toggle="modal" data-target="#logoutModal">Log Out</a></li>
					<?php } else { ?>
						<li class="nav-item"><a href="<?php echo base_url() ?>login" class="nav-link">Login</a></li>
						<li class="nav-item"><a href="<?php echo base_url() ?>daftar" class="nav-link">Register</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Peringatan!!</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Pilih "keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<a class="btn btn-danger" href="<?php echo base_url() ?>Login/logout">Keluar</a>
				</div>
			</div>
		</div>
	</div>