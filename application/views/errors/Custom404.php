<style>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    section {
        padding: 0;
        margin: 0;
        background-color: #1cc88a;
    }

    #notfound {
        position: relative;
        height: 100vh;
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notfound {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }

    .notfound .notfound-404 {
        position: absolute;
        height: 100px;
        top: 0;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        z-index: -1;
    }

    .notfound .notfound-404 h1 {
        font-family: 'Maven Pro', sans-serif;
        color: #ececec;
        font-weight: 900;
        font-size: 276px;
        margin: 0px;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notfound h2 {
        font-family: 'Maven Pro', sans-serif;
        font-size: 46px;
        color: #000;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0px;
    }

    .notfound p {
        font-family: 'Maven Pro', sans-serif;
        font-size: 16px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
    }

    .notfound a {
        font-family: 'Maven Pro', sans-serif;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        text-transform: uppercase;
        background: #000;
        display: inline-block;
        padding: 16px 38px;
        border: 2px solid #fff;
        border-radius: 40px;
        color: #fff;
        font-weight: 400;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .notfound a:hover {
        font-weight: bold;
        background-color: #1cc88a;
        border-color: #fff;
        color: #000;
    }

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 h1 {
            font-size: 162px;
        }

        .notfound h2 {
            font-size: 26px;
        }
    }
</style>
<section>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Maaf, Halaman tidak ditemukan!</h2>
            <p>Halaman yang anda cari mungkin telah dihapus atau tidak tersedia untuk sementara.</p>
            <a href="<?= base_url(); ?>">Kembali</a>
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<script src="<?= base_url(); ?>assets/plugins/fontawesome/all.min.js"></script>

</body>

</html>