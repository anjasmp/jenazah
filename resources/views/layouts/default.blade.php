<!DOCTYPE html>
<html lang="en">

@include('user.partials.head')

<body>

    <section id="login-new">
        <div class="container" style="max-width: 100%; display:block; height: auto;" data-aos="fade-up">

            <div class="row row-eq-height justify-content-center">

                <div class="col-lg mb-8">
                    <div class="card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card-body">
                            @yield('login')
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    @include('user.partials.scripts')


</body>

</html>