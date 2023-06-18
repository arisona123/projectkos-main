<html>
Hi <?= $nama_penerima; ?>,
<br><br>
Permintaan ulang kata sandi yang diminta untuk akun Anda '<?= $username; ?>' di<br>SevenKos.
<br><br>
Untuk mengonfirmasi permintaan ini, dan menetapkan kata sandi baru untuk akun<br>Anda, silakan kunjungi alamat web berikut:
<br><br>
<a href="<?= base_url(); ?>reset_password?token=<?= $token; ?>"><?= base_url(); ?>reset_password?token=<?= $token; ?></a>
<br>
(link ini berlaku untuk 30 menit dari waktu permintaan ulang kata sandi ini<br>pertama kali diminta)
<br><br>
Jika permintaan ulang kata sandi ini tidak diminta oleh Anda, tidak ada<br>tindakan yang diperlukan.
<br><br>
Jika Anda membutuhkan bantuan, silakan hubungi Administrator situs,
<br><br>
Admin,<br>
<a href="mailto:sevenkos@fiantest.my.id" target="_blank">sevenkos@fiantest.my.id</a>

</html>