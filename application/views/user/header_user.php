<section class="hero-wrap" style="background-image: url('asset/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center">
			<div class="col-lg-7 col-md-6 ftco-animate d-flex align-items-end">
				<div class="text">
					<h1 class="mb-4">Cari Kostan?<br>SevenKos Solusinya!</h1>
					<p style="font-size: 18px;">Disini kamu bisa cari kost sesuai dengan area, fasilitas, dan juga tipe kamar sesuai dengan apa yang kamu inginkan.</p>
					<p><a href="<?php echo base_url() ?>semua-kos" class="btn btn-success py-3 px-4">Mulai cari kost</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
.carousel{
    max-width: 700px;
	margin : 50px auto;
}  
img{
	border-radius: 20px;
	
}

</style>
<div class="col-md-12 heading-section text-center ftco-animate mb-5">
	<span class="subheading">What we offer</span>
	<h2>Dapatkan Promo Menarik</h2>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <a href="#"><div class="carousel-item active">
      <img src="<?php echo base_url('assetss') ?>/images/iklan/tokopedia.jpg" class="d-block w-100">
    </div></a>
	<a href="#"><div class="carousel-item">
      <img src="<?php echo base_url('assetss') ?>/images/iklan/bukalapak.png" class="d-block w-100">
    </div></a>
    <a href="#"><div class="carousel-item">
      <img src="<?php echo base_url('assetss') ?>/images/iklan/shopee.png" class="d-block w-100">
    </div></a>
    <a href="#"><div class="carousel-item">
      <img src="<?php echo base_url('assetss') ?>/images/iklan/lazada.jpg" class="d-block w-100">
    </div></a>
</div>
    <div class="count"></div>
</div>
</div>
  
<script>
var totalItems = $('.carousel-item').length;
var currentIndex = $('.carousel-item.active').index() + 1;
$('.count').html(' ' + currentIndex + '/' + totalItems + ' ');
$('#carouselExampleIndicators').on('slid.bs.carousel', function() {
  currentIndex = $('.carousel-item.active').index() + 1;
  $('.count').html(' ' + currentIndex + '/' + totalItems + ' ');
});
</script>
 

<section class="ftco-section ftco-no-pb ftco-no-pt bg-success">
	<div class="container">
		<div class="row d-flex no-gutters">
			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
				<div class="media block-6 services services-bg d-block text-center px-4 py-5">
					<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
					<div class="media-body py-md-4">
						<h3>Dipercaya oleh Customer</h3>
						<p>Dengan pelayanan dan juga fitur yang kami sediakan, customer merasa puas dan juga terbantu dalam proses pencarian kos hingga deal dengan pemilik.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
				<div class="media block-6 services services-bg services-darken d-block text-center px-4 py-5">
					<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-home"></span></div>
					<div class="media-body py-md-4">
						<h3>Banyak Pilihan Kost</h3>
						<p>Kami menyediakan banyak pilihan untuk kost dari area yang kamu inginkan, mulai dari fasilitas, harga, dan juga tipe kost.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
				<div class="media block-6 services services-bg services-lighten d-block text-center px-4 py-5">
					<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-stats"></span></div>
					<div class="media-body py-md-4">
						<h3>Proses Transaksi Mudah</h3>
						<p>Tentunya proses transaksi yang akan kamu lalui akan berlangsung mudah dan juga aman, kamu perlu melalui beberapa langkah untuk proses transaksi yang terjamin.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
				<di class="media block-6 services services-bg d-block text-center px-4 py-5">
					<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-quarantine"></span></div>
					<div class="media-body py-md-4">
						<h3>Harga yang Bersahabat</h3>
						<p>Harga kost tentunya affordable dan bersahabat, terutama untuk pelajar dan juga mahasiswa.</p>
					</div>
				</di v>
			</div>
		</div>
	</div>
</section>



<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">What we offer</span>
				<h2 class="mb-2">Recommendation from Us</h2>
			</div>
		</div>
		<div class="row ftco-animate">
  <div class="col-md-12">
				<div class="carousel-properties owl-carousel">
					<div class="item">
						<div class="property-wrap ftco-animate">
							<a href="#" class="img" style="background-image: url(file/kos_image/19.jpg);">
								<div class="rent-sale">
									<span class="rent">Campur</span>
								</div>
								<p class="price"><span class="orig-price">Rp. 2.700.000<small> / bulan</small></span></p>
							</a>
							<div class="text">
								<h3><a href="#">Kost Tian Jalan Pagarsih No. 78</a></h3>
								<span class="location">Jakarta</span>
								<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
									<span class="fa fa-link"></span>
								</a>
								<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
									<div class="d-flex align-items-center">
										<div class="img" style="background-image: url(images/person_1.jpg);"></div>
									</div>
									<span class="text-right">2017-07-12</span>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="property-wrap ftco-animate">
							<a href="#" class="img" style="background-image: url(file/kos_image/20.jpg);">
								<div class="rent-sale">
									<span class="rent">Putri</span>
								</div>
								<p class="price"><span class="orig-price">Rp. 2.000.000<small> / bulan</small></span></p>
							</a>
							<div class="text">
								<h3><a href="#">Kost Light Home Sukajadi</a></h3>
								<span class="location">Jakarta</span>
								<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
									<span class="fa fa-link"></span>
								</a>
			. 					<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
									<div class="d-flex align-items-center">
										<div class="img" style="background-image: url(images/person_1.jpg);"></div>
									</div>
									<span class="text-right">2017-07-12</span>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="property-wrap ftco-animate">
							<a href="#" class="img" style="background-image: url(file/kos_image/14.jpg);">      
								<div class="rent-sale">
									<span class="rent">Putri</span>
								</div>
								<p class="price"><span class="orig-price">Rp. 1.700.000<small> / bulan</small></span></p>
							</a>
							<div class="text">
								<h3><a href="#">Kost Terusan Ciheulang No. 235 B Type A Coblong</a></h3>
								<span class="location">Jakarta</span>
								<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
									<span class="fa fa-link"></span>
								</a>
								<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
									<div class="d-flex align-items-center">
										<div class="img" style="background-image: url(images/person_1.jpg);"></div>
									</div>
									<span class="text-right">2017-07-12</span>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="property-wrap ftco-animate">
							<a href="#" class="img" style="background-image: url(file/kos_image/6.jpg);">
								<div class="rent-sale">
									<span class="rent">Putra</span>
								</div>
								<p class="price"><span class="orig-price">Rp. 1.500.000<small> / bulan</small></span></p>
							</a>
							<div class="text">
								<h3><a href="#">Kost Pondok Mars Barat III No. 8 Tipe B Rancasari</a></h3>
								<span class="location">Yogyakarta</span>
								<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
									<span class="fa fa-link"></span>
								</a>
								<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
									<div class="d-flex align-items-center">
										<div class="img" style="background-image: url(images/person_1.jpg);"></div>
									</div>
									<span class="text-right">2017-07-12</span>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="property-wrap ftco-animate">
							<a href="#" class="img" style="background-image: url(file/kos_image/17.jpg);">
								<div class="rent-sale">
									<span class="rent">Campur</span>
								</div>
								<p class="price"><span class="orig-price">Rp. 1.500.000<small> / bulan</small></span></p>
							</a>
							<div class="text">
								<h3><a href="#">Kost Nur House</a></h3>
								<span class="location">Yogyakarta</span>
								<a href="#" class="d-flex align-items-center justify-content-center btn-custom">
									<span class="fa fa-link"></span>
								</a>
								<div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
									<div class="d-flex align-items-center">
										<div class="img" style="background-image: url(images/person_1.jpg);"></div>
									</div>
									<span class="text-right">2017-07-12</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">Area</span>
				<h2 class="mb-2">Area Populer</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo base_url() ?>filter?kota=Jakarta" class="search-place img" style="background-image: url(asset/images/jakarta.jpg);">
					<div class="desc">
						<h3><span>Jakarta</span></h3>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url() ?>filter?kota=Yogyakarta" class="search-place img" style="background-image: url(asset/images/yogyakarta.jpg);">
					<div class="desc">
						<h3><span>Yogyakarta</span></h3>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url() ?>filter?kota=Surabaya" class="search-place img" style="background-image: url(asset/images/surabaya.jpg);">
					<div class="desc">
						<h3><span>Surabaya</span></h3>
					</div>
				</a> 
	</div>
</section>
<section class="ftco-section services-section bg-darken">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
				<span class="subheading">Work flow</span>
				<h2 class="mb-3">How it works</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services services-2">
					<div class="media-body py-md-4 text-center">
						<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>01</span>
							<img src="asset/images/Vector 16.png" alt="">
						</div>
						<h3>Register & Login</h3>
						<p>Buat akun dengan mudah! Hanya perlu dengan klik tombol register pada navigasi di atas, kemudian kamu bisa login dan dapat menggunakan website dengan maksimal.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services services-2">
					<div class="media-body py-md-4 text-center">
						<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>02</span>
							<img src="asset/images/Vector 16.png" alt="">
						</div>
						<h3>Cari Kost sesuai Area</h3>
						<p>Kamu bisa mencari kost sesuai dengan area, tipe, dan juga harga yang kamu inginkan, mudah! Dengan menggunakan fitur search.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services services-2">
					<div class="media-body py-md-4 text-center">
						<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>03</span>
							<img src="asset/images/Vector 16.png" alt="">
						</div>
						<h3>Pilih dan Sewa</h3>
						<p>Kamu bisa memilih dan melihat detail harga, fasilitas yang disediakan, deskripsi, dan juga nomor dari pemilik kost yang bisa kamu hubungi.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services services-2">
					<div class="media-body py-md-4 text-center">
						<div class="icon mb-1 d-flex align-items-center justify-content-center"><span>04</span>
							<img src="asset/images/Vector 16.png" alt="">
						</div>
						<h3>Deal dan Tempati</h3>
						<p>Setelah menemukan kost yang cocok dan sesuai, kamu bisa menyewa dan membuat perjanjian dengan pemilik kost melalui nomor yang sudah tertera.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 

<section class="ftco-section ftco-no-pb ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-7 order-md-last d-flex align-items-stretch">
				<div class="img w-100 img-2 mr-md-2" style="background-image: url(asset/images/rumah1.jpg);"></div>
				<div class="img w-100 img-2 ml-md-2" style="background-image: url(asset/images/rumah2.jpg);"></div>
			</div>
			<div class="col-md-5 wrap-about py-md-5 ftco-animate">
				<div class="heading-section pr-md-5">
					<h2 class="mb-4">SevenKos</h2>

					<p>Kami menyediakan website informasi kost untuk kamu yang sedang mencari kost sesuai dengan area yang dituju dengan menyertakan harga, fasilitas, nomor pemilik kost, dan juga informasi detail lainnya.</p>
					<p>Tentunya website kami akan mempermudah kamu untuk mencari kost sesuai dengan area yang kamu tuju dan juga keinginan kamu. Kami juga menyediakan beberapa fitur yang akan mempermudah dalam proses pencarian, tentunya kamu dapat menggunakan fitur-fitur ini dengan mudah. Awal mula SevenKos dibuat dikarenakan keluhan yang dialami pelajar, mahasiswa, atau bahkan kami sendiri dalam mencari informasi kost pada daerah tujuan kami.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter img" id="section-counter">
	<div class="container">        
		<div class="row pt-md-5">
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 py-5 mb-4">
					<div class="text text-border d-flex align-items-center info">
						<strong class="number"><?= $jumlahkos ?></strong>
						<span>Kos <br>Terdaftar</span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 py-5 mb-4">
					<div class="text text-border d-flex align-items-center info">
						<strong class="number"><?= $jumlahuser ?></strong>
						<span>User <br>Terdaftar</span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 py-5 mb-4">
					<div class="text text-border d-flex align-items-center info">
						<strong class="number"><?= $jumlahsewa ?></strong>
						<span>Sewa <br>Berlangsung</span>
					</div>
				</div> 
			</div>
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 py-5 mb-4">
					<div class="text d-flex align-items-center info">
						<strong class="number"><?= $jumlahrequest ?></strong>
						<span>Request <br>Berlangsung</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="testimonials">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">Review</span>
				<h2 class="mb-2">Apa Kata Pengguna SevenKos?</h2>
			</div>
	<div class="testimonial-box-container">

		<!--box-1-->
		<div class="testimonial-box">
			<!--top--->
			<div class="box-top">
				<!--profile-->
				<div class="profile">
					<!--img-->
					<div class="profile-img">
						<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"/>
					</div>
					<!--name-and-username-->
					<div class="name-user">
						<strong>Dani Sabilil Haqi</strong>
						<span>@danish</span>
					</div>
				</div>
				<!--reviews-->
				<div class="reviews">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				</div>
			</div>

			<!--comments-->
			<div class="client-comment">
				<p>Saya baru-baru ini mencoba menggunakan website Seven Kos untuk mencari kos baru, dan saya sangat terkesan dengan kemudahan penggunaannya. Website ini benar-benar mempermudahkan proses pencarian kos dengan fitur-fitur yang lengkap dan antarmuka yang intuitif.</p>
			</div>
		</div>

		<!--box-2-->
		<div class="testimonial-box">
			<!--top--->
			<div class="box-top">
				<!--profile-->
				<div class="profile">
					<!--img-->
					<div class="profile-img">
						<img src="https://png.pngtree.com/png-vector/20210921/ourlarge/pngtree-flat-people-profile-icon-png-png-image_3947764.png" />
					</div>
					<!--name-and-username-->
					<div class="name-user">
						<strong>Dzaky Algadinata F.</strong>
						<span>@dzakyaf</span>
					</div>
				</div>
				<!--reviews-->
				<div class="reviews">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i> 
				</div>
			</div>

			<!--comments-->
			<div class="client-comment">
				<p>Salah satu hal yang saya sukai dari Seven Kos adalah desainnya yang sederhana namun modern. Halaman beranda yang bersih dan tata letak yang teratur membuatnya mudah untuk menjelajahi opsi-opsi kos yang tersedia. Saya juga menghargai tampilan yang responsif, sehingga saya dapat dengan mudah mengakses website ini baik dari komputer desktop maupun perangkat seluler.</p>
			</div>
		</div>

		<!--box-3-->
		<div class="testimonial-box">
			<!--top--->
			<div class="box-top">
				<!--profile-->
				<div class="profile">
					<!--img-->
					<div class="profile-img">
						<img src="https://pixlok.com/wp-content/uploads/2022/02/Profile-Icon-SVG-09856789-300x300.png" />
					</div>
					<!--name-and-username-->
					<div class="name-user">
						<strong>Arisona Pamungkas</strong>
						<span>@arisonap</span>
					</div>
				</div>
				<!--reviews-->
				<div class="reviews">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i> 
				</div>
			</div>

			<!--comments-->
			<div class="client-comment">
				<p>Pencarian kos di Seven Kos juga sangat mudah. Mereka menyediakan berbagai filter yang berguna, seperti lokasi, harga, fasilitas, dan jenis kos. Dengan adanya filter ini, saya dapat dengan cepat menyaring pilihan yang sesuai dengan preferensi saya. Saya juga menyukai fitur pemetaan yang terintegrasi dengan baik, yang memungkinkan saya melihat letak kos dengan jelas dan mendapatkan gambaran tentang lingkungan sekitarnya.</p>
			</div>
		</div>

		<!--box-4-->
		<div class="testimonial-box">
			<!--top--->
			<div class="box-top">
				<!--profile-->
				<div class="profile">
					<!--img-->
					<div class="profile-img">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgY2WJcq5Kc6dBwxsOG1d0ThNAuBifIMt7rbSMEGCaDp7TdA2_Hgw5cXLQT9cCnirO4X4&usqp=CAU" />
					</div>
					<!--name-and-username-->
					<div class="name-user">
						<strong>Ade Ryan H.</strong>
						<span>@aderyanh</span>
					</div>
				</div>
				<!--reviews-->
				<div class="reviews"> 
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="far fa-star"></i> <!--bintang kosong-->
				</div>
			</div>

			<!--comments-->
			<div class="client-comment">
				<p>Secara keseluruhan, pengalaman saya dengan website Seven Kos sangat positif. Mereka benar-benar membuat proses mencari kos menjadi lebih mudah dan efisien. Dari tampilan yang menarik hingga fitur pencarian yang lengkap, semuanya dirancang dengan baik untuk memenuhi kebutuhan pengguna. Saya dengan senang hati merekomendasikan Seven Kos kepada siapa pun yang sedang mencari kos dengan cepat dan mudah.</p>
			</div>
		</div>

	</div>


	<style>
	*{
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}
	a{
		text-decoration: none;
	}
	#testimonials{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		width: 100%;
	}
	.testimonial-heading{
		letter-spacing: 1px;
		margin: 30px 0px;
		padding: 10px 20px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	.testimonial-heading h1{
		font-size: 2.2rem;
		font-weight: 500;
		background-color: #202020;
		color: #ffffff;
		padding: 10px 20px;
	}
	.testimonial-heading span{
		font-size: 1.3rem;
		color: #252525;
		margin-bottom: 10px;
		letter-spacing: 2px;
		text-transform: uppercase;
	}
	.testimonial-box-container{
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		width: 100%;
	}
	.testimonial-box{
		width: 500px;
		box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
		background-color: #ffffff;
		padding: 20px;
		margin: 15px;
		cursor: pointer;
	}
	.profile-img{
		width: 50px;
		height: 50px;
		border-radius: 50%;
		overflow: hidden;
		margin-right: 10px;
	}
	.profile-img img{
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
	}
	.profile{
		display: flex;
		align-items: center;
	}
	.name-user{
		display: flex;
		flex-direction: column;
	}
	.name-user strong{
		color: #3d3d3d;
		font-size: 1.1rem;
		letter-spacing: 0.5px;
	}
	.name-user span{
		color: #979797;
		font-size: 0.8rem;
	}
	.reviews{
		color: #f0d71c;
	}
	.box-top{
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 20px;
	}
	.client-comment p{
		font-size: 0.9rem;
		color: #4b4b4b;
	}
	.testimonial-box:hover{
		transform: translateY(-10px);
		transition: all;
	}

	@media(max-width:1060px){
		.testimonial-box{
			width: 45%;
			padding: 10px;
		}
	}
	@media(max-width:790px){
		.testimonial-box{
			width: 100%;
		}
		.testimonial-heading h1{
			font-size: 1.4rem;
		}
	}
	@media(max-width:340px){
		.box-top{
			flex-wrap: wrap;
			margin-bottom: 10px;
		}
		.reviews{
			margin-top: 10px;
		}
	}
	::selection{
		color: #ffffff;
		background-color: #252525;
	}
	
	</style>

</section>

<script src="<?= base_url(); ?>asset/js/jquery.min.js"></script> 