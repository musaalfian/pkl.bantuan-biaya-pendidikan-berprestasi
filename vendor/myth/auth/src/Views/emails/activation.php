<head>
    <style>
        .btn{
           
           padding: 5px 10px;
           border-radius: 10px;
       }
       .bg-abu{
           background-color: rgb(236, 236, 236);
           display: flex !important;
           justify-content: center !important;
       }
       p{
           font-size: 12px;
       }
       a{
           text-decoration: none;
           color: white;
       }
       .text-center{
           text-align: center;
       }
       .p50{
           padding-bottom: 50px;
           padding-top: 50px;
       }
       .bg-white{
           background-color: white;
       }
       .d-flex{
           display: flex;
       }
       .align-items-center{
           align-items: center;
       }
       .justify-content-center{
           justify-content: center !important;
       }
       .p25{
           padding-bottom: 25px;
           padding-top: 25px;
       }
       .fa16{
           font-size: 16px;
       }
       .bold{
           font-weight: 800;
       }
       .mt5{
           margin-top: 5px;
       }
       .btn-biru{
           background-color: blue;
           color: white;
       }
       .br20{
           border-radius: 20px;
       }
       .px50{
           padding-right: 50px;
           padding-left: 50px;
       }
       .text-white{
        color: white !important;
       }

    </style>
</head>
<div class="bg-abu p50"  style="width: 100%;">
    <div class="text-center px50 p50 bg-white " style="width: 500px;">
        <img class="text-center" src="logo-kabupaten-batang 2.png" height="20px" alt="" />
            <p class="fa16 bold mt-3">Sistem Informasi Bantuan Biaya Pendidikan Bagi Peserta Didik Pendidikan Menengah dan Mahasiswa yang Berprestasi Dari Keluarga Miskin</p>
            <p class="mt5">Silkahkan klik dibawah ini unuk melakukan aktivasi akun </p>
            <div class="">
                <a class="btn btn-biru text-white" href="<?= site_url('activate-account') . '?token=' . $hash ?>">Aktivasi</a>
            </div>
            <p>Harap untuk tidak membalas pesan ini. <span style="font-weight: 700;color:blue ;">Semangat dan teruslah berprestasi</span></p>
        </div>
    </div>


<!-- <p>Ini adalah email aktivasi untuk akun Anda di <?= site_url() ?>.</p>
<p>Untuk mengaktifkan akun anda, klik link berikut.</p>
<p><a href="<?= site_url('activate-account') . '?token=' . $hash ?>">Aktivasi akun</a>.</p>
<br>
<p>Jika Anda tidak terdaftar di situs web ini, Anda dapat mengabaikan email ini dengan aman.</p>
<br>
<p>Tim seleksi penerima bantuan biaya pendidikan berprestasi Kabupaten Batang</p> -->