@extends('user.default')

@include('user.partials.header')

@include('user.profil.introsejarah')

@section('content')



<section id="popularContent">
<section id="lazhaq" class="section-bg-lazhaq" >
    <div class="container" data-aos="fade-up" >

      <div class="row justify-content-center">
        
        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
          <div class="box2">
          <img src="{{ url('user/assets/img/sejarah1.jpg')}}" alt="" style="width: 100%">
            <h4 class="title">Sejarah</h4>
            <p class="description">Bismillahirrahmaanirrahiim. Masjid Baitul Haq memiliki peran sangat vital dan strategis dalam perkembangan dakwah Islam dan sosial di lingkungan perumahan Puri Gading. Masjid yang sangat dicintai oleh jamaahnya ini pertama kali dibangun tahun 1998 atas swadaya masyarakat, dan diresmikan oleh Wali kota Bekasi Bapak Achmad Jurfaih pada tahun 2004. <br> <br>
                Pendirian masjid Baitul Haq, tentunya tidak mudah dan perlu perjuangan yang panjang yang melibatkan banyak komponen masyarakat di Puri Gading maupun dari luar Puri Gading. Tidak kurang dari 20 tahun harus ditempuh hingga legalitasnya baru diperoleh di tahun 2019 dengan keluarnya surat penetapan sebagai fasilitas umum dari pemerintah Kota Bekasi yang ditandatangi oleh Bapak Rachmat Effendi, selaku Wali Kota.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="box2">
            <img src="{{ url('user/assets/img/slide2.png')}}" alt="" style="width: 100%">
              <p class="description">Itulah secara ringkas bagaimana masjid Baitul Haq berkembang dari waktu ke waktu, sehingga dengan mengetahuinya diharapkan tumbuh kecintaan jamaah terhadap tempat ibadahnya yang agung tersebut, semakin memakmurkannya dan ikut terlibat dalam perjuangan dakwah dalam rangka menegakkan Islam, agama Allah di lingkungan Puri Gading dan sekitarnya. Tak lupa kita semua mendoakan semua yang terlibat menggagas berdirinya masjid Baitul Haq hingga yang peduli dengan perkembangannya dengan balasan pahala yang tak putus dari Allah SWT.

                <br> <br>

  
                  Hormat Kami,
                  <br>
                  DKM Masjid Baitul Haq <br>
                  Dewan Syuro Masjid Baitul Haq
              </p>
            </div>
          </div>
      </div>
    </div>
  </section>

  <section id="lazhaq" class="section-bg-lazhaq">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>Visi Misi</h3>
            <p>Terwujudnya Masjid Menjadi Pusat Kegiatan Ibadah</p>
        </header>

      <div class="row justify-content-center">
        
        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
          <div class="box2" style="min-height: 250px" >
              <h3>Visi</h3>
            <p class="description">Terwujudnya masjid menjadi pusat kegiatan masyarakat puri gading dan sekitarnya sehingga memberikan dampak kesejahteraan dan kebahagiaan bagi warganya
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="box2" style="min-height: 250px">
                <h3>Misi</h3>
              <p class="description">Memperkuat fungsi fungsi masjid sebagai pusat ibadah, pusat menuntut ilmu dan pusat dakwah.
              <br>  Memberikan pelayanan yang terbaik kepada seluruh jamaah masjid .
              <br>  Mengorganisir seluruh potensi jamaah untuk kemajuan dan kebaikan masjid.
              </p>
            </div>
          </div>
      </div>
    </div>
  </section>
</section>

  

@include('user.partials.footer')

@endsection