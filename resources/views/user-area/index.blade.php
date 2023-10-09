<x-template.landing bodyClass="blog-author bg-gray-200">

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
                                                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                width="70px" alt="image">
                                        </div>
                                    </a>
                                    <div class="card-body ">
                                        <h6 class="text-dark mx-auto">Muhammad Luthfi <button type="button"
                                                class="btn btn-link my-auto" style="color: black;"><i
                                                    class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="text-xs fw-light">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </div>
                                        </h6>

                                    </div>
                                </div>

                                <div class="col-lg-10 col-md-6 col-12 mx-auto">
                                    <div class="card-body ps-lg-0 mt-1 rounded-pill">

                                        <div class="card-body">
                                            <div class="d-flex flex-row justify-content-start mb-3">
                                                <img src="{{ asset('assets/img/favicon1.png') }}" alt="avatar 1"
                                                    style="width: 45px; height: 100%;">
                                                <div class="p-3 ms-3"
                                                    style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                                    <p class="small mb-0">What are you doing tomorrow? </p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row justify-content-end mb-2 pt-1">
                                                <div>
                                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                                        Tomorrow office. will be free on sunday.</p>
                                                    <p
                                                        class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">
                                                        12-September-2023</p>
                                                </div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                            </div>
                                            <!--Start Inline Collapse Feedback-->
                                            <p class="d-inline-flex gap-6">
                                                <a class="btn btn-link text-info" data-bs-toggle="collapse"
                                                    href="#" role="button" aria-expanded="false"
                                                    aria-controls="collapseUser1">
                                                    <i class="bi bi-heart mx-auto"><span class="mx-1">Like</i>
                                                </a>
                                                <button class="btn btn-link text-info" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseUser1"
                                                    aria-expanded="false" aria-controls="collapsefeed1">
                                                    <i class="bi bi-chat-dots mx-auto"><span
                                                            class="mx-1">Feedback</span></i>
                                                </button>
                                            </p>

                                            <div class="collapse" id="collapseUser1">
                                                <div class="card card-body">
                                                    <ul class="mb-2">
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            <div class="d-flex flex-row justify-content-start">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                <div>
                                                                    <p class="small p-2 ms-3 mb-1 rounded-3"
                                                                        style="background-color: #f5f6f7;">Long time
                                                                        no
                                                                        see! Tomorrow office. will be free on
                                                                        sunday.
                                                                    </p>
                                                                    <p class="small ms-3 mb-3 rounded-3 text-muted">
                                                                        23:58</p>
                                                                </div>
                                                            </div>

                                                            <div class="divider d-flex align-items-center mb-4">
                                                                <p class="text-center mx-3 mb-0"
                                                                    style="color: #a2aab7;">Today</p>
                                                            </div>

                                                            <div class="d-flex flex-row justify-content-start">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                <div>
                                                                    <p class="small p-2 ms-3 mb-1 rounded-3"
                                                                        style="background-color: #f5f6f7;">I will
                                                                        meet
                                                                        you Sandon Square sharp at 10 AM</p>
                                                                    <p class="small ms-3 mb-3 rounded-3 text-muted">
                                                                        23:58</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <p class="d-inline-flex gap-1">

                                                            <button class="btn btn-link text-secondary" type="button"
                                                                data-bs-toggle="collapsed" data-bs-target="#collaps"
                                                                aria-expanded="false" aria-controls="collapseExample">
                                                                Selengkapnya
                                                            </button>
                                                        </p>
                                                        <div
                                                            class="card-footer text-muted d-flex justify-content-start align-items-center ">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                                alt="avatar 3" style="width: 40px; height: 100%;">
                                                            <input type="text" class="form-control form-control-lg"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Type message">
                                                            <a class="ms-3" href="#!"><i
                                                                    class="fas fa-paper-plane"></i></a>
                                                        </div>
                                                    </ul>

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
                                                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                width="70px" alt="image">
                                        </div>
                                    </a>
                                    <div class="card-body ">
                                        <h6 class="text-dark mx-auto">Muhammad Luthfi <button type="button"
                                                class="btn btn-link my-auto" style="color: black;"><i
                                                    class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="text-xs fw-light">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </div>
                                        </h6>

                                    </div>
                                </div>

                                <div class="col-lg-10 col-md-6 col-12 mx-auto">
                                    <div class="card-body ps-lg-0 mt-1 rounded-pill">

                                        <div class="card-body">
                                            <div class="d-flex flex-row justify-content-start mb-3">
                                                <img src="{{ asset('assets/img/favicon1.png') }}" alt="avatar 1"
                                                    style="width: 45px; height: 100%;">
                                                <div class="p-3 ms-3"
                                                    style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                                    <p class="small mb-0">What are you doing tomorrow? </p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row justify-content-end mb-2 pt-1">
                                                <div>
                                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                                        Tomorrow office. will be free on sunday.</p>
                                                    <p
                                                        class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">
                                                        12-September-2023</p>
                                                </div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                            </div>
                                            <!--Start Inline Collapse Feedback-->
                                            <p class="d-inline-flex gap-6">
                                                <a class="btn btn-link text-info" data-bs-toggle="collapse"
                                                    href="#" role="button" aria-expanded="false"
                                                    aria-controls="collapseUser2">
                                                    <i class="bi bi-heart mx-auto"><span class="mx-1">Like</i>
                                                </a>
                                                <button class="btn btn-link text-info" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseUser2"
                                                    aria-expanded="false" aria-controls="collapsefeed2">
                                                    <i class="bi bi-chat-dots mx-auto"><span
                                                            class="mx-1">Feedback</span></i>
                                                </button>
                                            </p>

                                            <div class="collapse" id="collapseUser2">
                                                <div class="card card-body">
                                                    <ul class="mb-2">
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            <div class="d-flex flex-row justify-content-start">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                <div>
                                                                    <p class="small p-2 ms-3 mb-1 rounded-3"
                                                                        style="background-color: #f5f6f7;">Long time
                                                                        no
                                                                        see! Tomorrow office. will be free on
                                                                        sunday.
                                                                    </p>
                                                                    <p class="small ms-3 mb-3 rounded-3 text-muted">
                                                                        23:58</p>
                                                                </div>
                                                            </div>

                                                            <div class="divider d-flex align-items-center mb-4">
                                                                <p class="text-center mx-3 mb-0"
                                                                    style="color: #a2aab7;">Today</p>
                                                            </div>

                                                            <div class="d-flex flex-row justify-content-start">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                                <div>
                                                                    <p class="small p-2 ms-3 mb-1 rounded-3"
                                                                        style="background-color: #f5f6f7;">I will
                                                                        meet
                                                                        you Sandon Square sharp at 10 AM</p>
                                                                    <p class="small ms-3 mb-3 rounded-3 text-muted">
                                                                        23:58</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <p class="d-inline-flex gap-1">

                                                            <button class="btn btn-link text-secondary" type="button"
                                                                data-bs-toggle="collapsed" data-bs-target="#collaps"
                                                                aria-expanded="false" aria-controls="collapseExample">
                                                                Selengkapnya
                                                            </button>
                                                        </p>
                                                        <div
                                                            class="card-footer text-muted d-flex justify-content-start align-items-center ">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                                alt="avatar 3" style="width: 40px; height: 100%;">
                                                            <input type="text" class="form-control form-control-lg"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Type message">
                                                            <a class="ms-3" href="#!"><i
                                                                    class="fas fa-paper-plane"></i></a>
                                                        </div>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</x-template.landing>
