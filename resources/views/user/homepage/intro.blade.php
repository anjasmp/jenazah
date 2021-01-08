<section id="intro" class="clearfix">
    <div class="container" data-aos="fade-up">

      <!-- ======= Services Section ======= -->
<section id="introcontent" class="section-bg-content">
  <div class="container" data-aos="fade-up">

    

    <div class="row justify-content-center">

      <div class="col" data-aos="zoom-in" data-aos-delay="100">
        <div class="box">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="slide">
              @foreach ($carousel as $key => $item)
              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($item->image)}}" class="d-block w-100" alt="...">
              </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <header id="headerIntro">
      {{-- <h3 style="margin-top: 20px">Jadwal Sholat</h3>
      <h4 style="text-align: center; margin-top: -10px">Wilayah Bekasi dan Sekitarnya</h4> --}}
      <div class="table table-borderless table-responsive-sm" style="margin-top: 15px;" id="jadwal">
      
        {{-- <table class="table" >
        <thead >
          <tr style="color: gray">
            <th scope="col" style="text-align: center"> Subuh</th>
            <th scope="col" style="text-align: center">Dhuha</th>
            <th scope="col" style="text-align: center">Dzuhur</th>
            <th scope="col" style="text-align: center">Ashar</th>
            <th scope="col" style="text-align: center">Maghrib</th>
            <th scope="col" style="text-align: center">Isya</th>
          </tr>
        </thead>
        <tbody style="text-align: center">
          <tr style="color: #008185">
            <td> <h4>14:50 WIB</h4> </td>
            <td><h4>14:50 WIB</h4></td>
            <td><h4>14:50 WIB</h4></td>
            <td><h4>14:50 WIB</h4></td>
            <td><h4>14:50 WIB</h4></td>
            <td><h4>14:50 WIB</h4></td> --}}

            {{-- <td>{{ $response['subuh']}}</td>
            <td>{{ $response['dhuha']}}</td>
            <td>{{ $response['dzuhur']}}</td>
            <td>{{ $response['ashar']}}</td>
            <td>{{ $response['maghrib']}}</td>
            <td>{{ $response['isya']}}</td>
          </tr>--}}
          
        {{-- </tbody>
      </table>  --}}
      </div>
    
    {{-- <p style="color: gray; margin-bottom: -40px; margin-top: -30px" id="wilayah">20 Nov 2020 - Wilayah Bekasi dan sekitarnya</p> --}}
      <div class="container" data-aso="zoom-in" id="announ">

        <div class="row justify-content-center">
          <div class="col-lg-8">
    
            <div class="owl-carousel testimonials-carousel owl-loaded owl-drag">
    
              
            <div class="owl-stage-outer ">
              
              <div class="owl-stage " style="transform: translate3d(-2760px, 0px, 0px); transition: all 0.25s ease 0s; width: 7590px;">
                @foreach ($announcement as $key => $item)
              <div class="owl-item {{$key == 0 ? 'active' : '' }}" style="width: 690px;  margin-bottom: -50px">
                <div class="testimonial-item">
                <h4>
                  {!! $item->content !!}
                </h4>
                
              </div>
              </div>
              @endforeach

              

             </div>
             
            </div>
             


            <div class="owl-nav disabled">
                <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
              
              <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
            </div>
            
            <div class="owl-dots">
                  <button role="button" class="owl-dot"><span></span></button>
                  <button role="button" class="owl-dot active"><span></span></button>
                  <button role="button" class="owl-dot"><span></span></button>
                  <button role="button" class="owl-dot"><span></span></button>
                  <button role="button" class="owl-dot"><span></span></button>
            </div>

            </div>
    
          </div>
        </div>
        
      </div>
      

      
    </header>
    
  </div>
</section>
    </div>
  </section>
