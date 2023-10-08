<x-template.landing bodyClass="blog-author bg-gray-200 bg-gray-200">

    <x-navbars.navs.auth titlePage=''></x-navbars.navs.auth>

    <!-- Start foto user and identitas user-->
    <section class="py-lg-5">
        <div class="container d-flex justify-content-center">
            <div class="col-12 col-lg-10 ">
                <div class="row ">
                    <div class="col my-6 ">
                        <div class="card box-shadow-xl overflow-hidden mb-4 bg-gradient-light">
                            <div class="col-lg-7">
                                <div class="row col-12 mx-2">
                                    <div class="col-lg-4 col-md-6 col-12 my-auto">
                                        <a href="javascript:;">
                                            <div class="p-3 pe-md-3">
                                                <img class="border-radius-md shadow-lg rounded-circle rounded mx-auto d-block"
                                                    src="{{ asset('assets/img/bruce-mars.jpg') }}" width="150px"
                                                    alt="image">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-12 my-auto">
                                        <div class="card-body ps-lg-0">
                                            <h6 class="text-dark mx-auto">Muhammad Luthfi</h6>
                                            <p class="mb-0 text-dark mx-auto">
                                                Level Name
                                            </p>
                                            <p class="mb-0 text-dark mx-auto">
                                                Weight
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5">

                            </div>
                        </div>

                        <!--Start Content-->
                        <div class="card card-profile bg-gradient-light mb-4">
                            <div class="row col-12">
                                <div class="d-flex justify-content-start my-auto">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-3">
                                            <img class="border-radius-md shadow-lg rounded-circle mx-auto d-block"
                                                src="{{ asset('assets/img/bruce-mars.jpg') }}" width="70px"
                                                alt="image">
                                        </div>
                                    </a>
                                    <div class="card-body ">
                                        <h6 class="text-dark mx-auto">Muhammad Luthfi <button type="button"
                                                class="btn btn-link my-auto mx-auto" style="color: black;"><i
                                                    class="bi bi-three-dots-vertical"></i>
                                            </button></h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-md-6 col-12 mx-auto">
                                    <div class="card-body ps-lg-0 mt-1">
                                        <p class="mb-2 text-dark mx-4">
                                            Apa bahasa inggrisnya mobil besar.?
                                        </p>

                                        <!--Start Inline Collapse Feedback-->
                                        <p class="d-inline-flex gap-6">
                                            <a class="btn btn-link text-info" data-bs-toggle="collapse" href="#"
                                                role="button" aria-expanded="false" aria-controls="collapseUser1">
                                                <i class="bi bi-heart mx-auto"><span class="mx-1">Like</i>
                                            </a>
                                            <button class="btn btn-link text-info" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseUser1" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="bi bi-chat-dots mx-auto"><span
                                                        class="mx-1">Feedback</span></i>
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseUser1">
                                            <div class="card card-body">
                                                <ul class="mb-2">
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        <div class="d-flex py-1">
                                                            <div class="my-auto">
                                                                <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                                    class="avatar avatar-sm  me-3 ">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="text-sm font-weight-normal mb-1">
                                                                    <span class="font-weight-bold">New message</span>
                                                                    from Laur
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    <i class="fa fa-clock me-1"></i>
                                                                    13 minutes ago
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </ul>
                                                <ul class="mb-2">
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        <div class="d-flex py-1">
                                                            <div class="my-auto">
                                                                <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="text-sm font-weight-normal mb-1">
                                                                    <span class="font-weight-bold">New album</span> by
                                                                    Travis Scott
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    <i class="fa fa-clock me-1"></i>
                                                                    1 day
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </ul>
                                                <p class="d-inline-flex gap-1">

                                                    <button class="btn btn-link text-secondary" type="button"
                                                        data-bs-toggle="collapsed" data-bs-target="#collaps"
                                                        aria-expanded="false" aria-controls="collapseExample">
                                                        Selengkapnya
                                                    </button>
                                                </p>

                                                {{-- <div class="dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Lihat Selengkapnya
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <div class="card card-body">
                                                            <ul class="mb-2">
                                                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                                                    <div class="d-flex py-1">
                                                                        <div class="my-auto">
                                                                            <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                                        </div>
                                                                        <div class="d-flex flex-column justify-content-center">
                                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                                <span class="font-weight-bold">New album</span> by
                                                                                Travis Scott
                                                                            </h6>
                                                                            <p class="text-xs text-secondary mb-0">
                                                                                <i class="fa fa-clock me-1"></i>
                                                                                1 day
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </ul>
                                                </div> --}}
                                                <div class="row col-12">
                                                    <div class="col-lg-2 my-auto">
                                                        <a href="javascript:;">
                                                            <div class="p-3 pe-md-3">
                                                                <img class="border-radius-md shadow-lg rounded-circle mx-auto d-block"
                                                                    src="{{ asset('assets/img/logo-ct.png') }}"
                                                                    width="40px" alt="image">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="form-floating col-lg-8 col-md-10 col-12 my-auto">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Feedback">
                                                        <label for="floatingInput">Feedback</label>

                                                    </div>
                                                    <button type="button" class="btn btn-link col-lg-2 my-2"
                                                        style="font-size: 1rem; color: cornflowerblue;"> <i
                                                            class="bi bi-send" title="Send"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Content-->

                         <!--Start Content-->
                         <div class="card card-profile bg-gradient-light mb-4">
                            <div class="row col-12">
                                <div class="d-flex justify-content-start my-auto">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-3">
                                            <img class="border-radius-md shadow-lg rounded-circle mx-auto d-block"
                                                src="{{ asset('assets/img/bruce-mars.jpg') }}" width="70px"
                                                alt="image">
                                        </div>
                                    </a>
                                    <div class="card-body ">
                                        <h6 class="text-dark mx-auto">Muhammad Luthfi <button type="button"
                                                class="btn btn-link my-auto mx-auto" style="color: black;"><i
                                                    class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <p class="text-xs text-secondary">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </h6>

                                    </div>
                                </div>

                                <div class="col-lg-10 col-md-6 col-12 mx-auto">
                                    <div class="card-body ps-lg-0 mt-1">
                                        <p class="mb-2 text-dark mx-4">
                                            Apa bahasa inggrisnya mobil besar.?
                                        </p>

                                        <!--Start Inline Collapse Feedback-->
                                        <p class="d-inline-flex gap-6">
                                            <a class="btn btn-link text-info" data-bs-toggle="collapse" href="#"
                                                role="button" aria-expanded="false" aria-controls="collapseUser1">
                                                <i class="bi bi-heart mx-auto"><span class="mx-1">Like</i>
                                            </a>
                                            <button class="btn btn-link text-info" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseUser1" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                <i class="bi bi-chat-dots mx-auto"><span
                                                        class="mx-1">Feedback</span></i>
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseUser1">
                                            <div class="card card-body">
                                                <ul class="mb-2">
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        <div class="d-flex py-1">
                                                            <div class="my-auto">
                                                                <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                                    class="avatar avatar-sm  me-3 ">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="text-sm font-weight-normal mb-1">
                                                                    <span class="font-weight-bold">New message</span>
                                                                    from Laur
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    <i class="fa fa-clock me-1"></i>
                                                                    13 minutes ago
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </ul>
                                                <ul class="mb-2">
                                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                                        <div class="d-flex py-1">
                                                            <div class="my-auto">
                                                                <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="text-sm font-weight-normal mb-1">
                                                                    <span class="font-weight-bold">New album</span> by
                                                                    Travis Scott
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    <i class="fa fa-clock me-1"></i>
                                                                    1 day
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </ul>
                                                <p class="d-inline-flex gap-1">

                                                    <button class="btn btn-link text-secondary" type="button"
                                                        data-bs-toggle="collapsed" data-bs-target="#collaps"
                                                        aria-expanded="false" aria-controls="collapseExample">
                                                        Selengkapnya
                                                    </button>
                                                </p>

                                                {{-- <div class="dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Lihat Selengkapnya
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <div class="card card-body">
                                                            <ul class="mb-2">
                                                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                                                    <div class="d-flex py-1">
                                                                        <div class="my-auto">
                                                                            <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                                        </div>
                                                                        <div class="d-flex flex-column justify-content-center">
                                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                                <span class="font-weight-bold">New album</span> by
                                                                                Travis Scott
                                                                            </h6>
                                                                            <p class="text-xs text-secondary mb-0">
                                                                                <i class="fa fa-clock me-1"></i>
                                                                                1 day
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </ul>
                                                </div> --}}
                                                <div class="row col-12">
                                                    <div class="col-lg-2 my-auto">
                                                        <a href="javascript:;">
                                                            <div class="p-3 pe-md-3">
                                                                <img class="border-radius-md shadow-lg rounded-circle mx-auto d-block"
                                                                    src="{{ asset('assets/img/logo-ct.png') }}"
                                                                    width="40px" alt="image">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="form-floating col-lg-8 col-md-10 col-12 my-auto">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Feedback">
                                                        <label for="floatingInput">Feedback</label>

                                                    </div>
                                                    <button type="button" class="btn btn-link col-lg-2 my-2"
                                                        style="font-size: 1rem; color: cornflowerblue;"> <i
                                                            class="bi bi-send" title="Send"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Content-->
                    </div>
                </div>
            </div>

    </section>
</x-template.landing>
