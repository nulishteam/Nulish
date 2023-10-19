<x-template.landing bodyClass="about-us bg-gray-200">

    <x-navbars.navs.landingnav titlePage=""></x-navbars.navs.landingnav>

    <!-- -------- START HEADER 7 w/ text and video ------- -->
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-100" style="background-image: url('{{ asset('assets') }}/img/landing5.jpg');">
            <span class="mask bg-gradient-dark opacity-4"></span>
            <div class="container mt-1">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mx-auto my-auto">
                        <h1 class="text-white">Welcome to the Nulish website</h1>
                        <p class="lead mb-4 text-white opacity-8">Let's Learn English from an early age</p>
                        @guest
                            <a type="submit" class="btn btn-info text-dark" href="{{ route('register') }}"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Test">Your Ability Test?</a>
                        @endguest
                        @auth
                            <a type="submit" class="btn bg-white text-dark" href="{{ route('user-area') }}"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Go to ">User Area</a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- -------- END HEADER 7 w/ text and video ------- -->
    <div class="card card-body bg-white shadow-xl mx-3 mx-md-4 mt-n4">
        <!-- Section with four info areas left & one card right with image and waves -->
        <section class="pb-5 position-relative mx-n3">
            @foreach ($landing as $obj)
                @if ($obj->sequence % 2 == 0)
                    <div class="d-flex align-items-end flex-column mb-3 mx-2">
                        <div class="col-md-2 d-sm-none d-lg-block"></div>
                        <div class="col-lg-9 col-md-8 col-sm-8 mx-6">
                            <div class="card card-profile mt-4 bg-secondary">
                                <div class="row flex-row-reverse">
                                    <div class="col-lg-4 col-md-6 col-12 my-auto">
                                        <a href="javascript:;">
                                            <div class="p-3 pe-md-3">
                                                <img class="w-100 border-radius-md shadow-lg"
                                                    src="{{ route('img.retrieve', ['home_item', $obj->image]) }}"
                                                    alt="image">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                                        <div class="card-body ps-lg-4">
                                            <h6 class="text-dark text-center">{{ $obj->title }}</h6>
                                            <p class="mb-0 text-light ">
                                                {!! strip_tags($obj->content) !!}
                                            <p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex align-items-start flex-column mb-3 mx-2">
                        <div class="col-md-2 d-sm-none d-lg-block"></div>
                        <div class="col-lg-9 col-md-8 col-sm-8 mx-6">
                            <div class="card card-profile mt-4 bg-secondary">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12 my-auto">
                                        <a href="javascript:;">
                                            <div class="p-3 pe-md-3">
                                                <img class="w-100 border-radius-md shadow-lg"
                                                    src="{{ route('img.retrieve', ['home_item', $obj->image]) }}"
                                                    alt="image">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                                        <div class="card-body ps-lg-0">
                                            <h6 class="text-dark text-center">{{ $obj->title }}</h6>
                                            <p class="mb-0 text-light">
                                                {!! strip_tags($obj->content) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
        <!-- END Section with four info areas left & one card right with image and waves -->

        <!--Start Features Nulish-->
        <section class="py-3 position-relative ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center mx-auto my-auto">
                        <h3 class="mb-6">Things About Nulish In The Classroom</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 ">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative py-4">
                                <a class="d-block blur-shadow-image ">
                                    <img src="../assets/img/examples/promosi2.png" alt="img-blur-shadow"
                                        class="img-fluid shadow rounded mx-auto d-block border-radius-lg"
                                        loading="lazy">
                                </a>
                            </div>
                            <div class="card-body px-0">
                                <p>
                                    Finding temporary housing for your dog should be as easy as
                                    renting an Airbnb. That’s the idea behind Rover ...
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative py-4">
                                <a class="d-block blur-shadow-image">
                                    <img src="../assets/img/examples/promosi1.png" alt="img-blur-shadow"
                                        class="img-fluid shadow runded mx-auto d-block  border-radius-lg"
                                        loading="lazy">
                                </a>
                            </div>
                            <div class="card-body px-0">

                                <p>
                                    If you’ve ever wanted to train a machine learning model
                                    and integrate it with IFTTT, you now can with ...
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative py-4">
                                <a class="d-block blur-shadow-image">
                                    <img src="../assets/img/examples/promosi3.png" alt="img-blur-shadow"
                                        class="img-fluid shadow rounded mx-auto d-block border-radius-lg"
                                        loading="lazy">
                                </a>
                            </div>
                            <div class="card-body px-0">

                                <p>
                                    If you’ve ever wanted to train a machine learning model
                                    and integrate it with IFTTT, you now can with ...
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end Features Nulish-->
        <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
        <section class="pb-5 position-relative bg-gradient-light rounded-3 mx-n3 my-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-8 text-start mb-5 mt-5 text-center mx-auto my-auto">
                        <h3 class="text-dark z-index-1 position-relative">Nulish Teams</h3>
                        <p><a class=" link-opacity-50-hover" href="{{route('author')}}">It's never too late to learn, as long as we have the will to learn..!</a></p>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n1">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0 ">
                                            <img class="w-100 border-radius-md shadow-lg rounded-circle"
                                                src="{{ asset('assets') }}/img/teams/Rivo.png" alt="image" height="200px">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Rivo Ardian</h5>
                                        <h6 class="text-info">Project Leader</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-lg-4 mt-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n1">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg rounded-circle"
                                                src="{{ asset('assets') }}/img/teams/Faiz2.png" alt="image" height="200px">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Faiz Nurhadi</h5>
                                        <h6 class="text-info"> Technical Leader</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4 z-index-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n1">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg rounded-circle"
                                                src="{{ asset('assets') }}/img/teams/Luthfi1.png" alt="image" height="200px">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Muhammad Luthfi Hamid</h5>
                                        <h6 class="text-info">Front End Dev</h6>
                                        <p class="mb-0">At first it was forced, but over time I got used to it...!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-lg-4 mt-5 z-index-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n1">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg rounded-circle"
                                                src="{{ asset('assets') }}/img/teams/Ade1.png" alt="image" height="200px">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Ade Ramdhani</h5>
                                        <h6 class="text-info">IT Support</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- END Features w/ pattern background & stats & rocket -------- -->

        <script>
            // get the element to animate
            var element = document.getElementById('count-stats');
            var elementHeight = element.clientHeight;

            // listen for scroll event and call animate function

            document.addEventListener('scroll', animate);

            // check if element is in view
            function inView() {
                // get window height
                var windowHeight = window.innerHeight;
                // get number of pixels that the document is scrolled
                var scrollY = window.scrollY || window.pageYOffset;
                // get current scroll position (distance from the top of the page to the bottom of the current viewport)
                var scrollPosition = scrollY + windowHeight;
                // get element position (distance from the top of the page to the bottom of the element)
                var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

                // is scroll position greater than element position? (is element in view?)
                if (scrollPosition > elementPosition) {
                    return true;
                }

                return false;
            }

            var animateComplete = true;
            // animate element when it is in view
            function animate() {

                // is element in view?
                if (inView()) {
                    if (animateComplete) {
                        if (document.getElementById('state1')) {
                            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
                            if (!countUp.error) {
                                countUp.start();
                            } else {
                                console.error(countUp.error);
                            }
                        }
                        if (document.getElementById('state2')) {
                            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
                            if (!countUp1.error) {
                                countUp1.start();
                            } else {
                                console.error(countUp1.error);
                            }
                        }
                        if (document.getElementById('state3')) {
                            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
                            if (!countUp2.error) {
                                countUp2.start();
                            } else {
                                console.error(countUp2.error);
                            };
                        }
                        animateComplete = false;
                    }
                }
            }

            if (document.getElementById('typed')) {
                var typed = new Typed("#typed", {
                    stringsElement: '#typed-strings',
                    typeSpeed: 90,
                    backSpeed: 90,
                    backDelay: 200,
                    startDelay: 500,
                    loop: true
                });
            }
        </script>
        <script>
            if (document.getElementsByClassName('page-header')) {
                window.onscroll = debounce(function() {
                    var scrollPosition = window.pageYOffset;
                    var bgParallax = document.querySelector('.page-header');
                    var oVal = (window.scrollY / 3);
                    bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
                }, 6);
            }
        </script>
</x-template.landing>
