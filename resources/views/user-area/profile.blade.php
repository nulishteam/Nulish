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
                                                    src="{{ route('img.retrieve', ['user_image', $user->user_image]) }}"
                                                    width="150px" alt="image">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-12 pt-3">
                                        <div class="card-body mx-2">
                                            <h6 class="text-dark mx-auto">{{ $user->name }}</h6>
                                            <p class="mb-0 text-dark mx-auto">
                                                {{ $user->level->level_name }}
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5">

                            </div>
                        </div>

                        @foreach ($answers as $item)
                            @php
                                $diffVal = $now->diffInSeconds($item->created_at);
                                $diffStr = '';
                                if ($diffVal < 60) {
                                    $diffStr = $diffVal . ' seconds ago';
                                } elseif ($diffVal < 60 * 60) {
                                    $diffVal = $now->diffInMinutes($item->created_at);
                                    $diffStr = $diffVal . ' minutes ago';
                                } elseif ($diffVal < 24 * 60 * 60) {
                                    $diffVal = $now->diffInHours($item->created_at);
                                    $diffStr = $diffVal . ' hours ago';
                                } elseif ($diffVal < 7 * 24 * 60 * 60) {
                                    $diffVal = $now->diffInDays($item->created_at);
                                    $diffStr = $diffVal . ' days ago';
                                } else {
                                    $diffStr = $item->created_at->format('d M Y');
                                }
                            @endphp
                            <!--Start Content-->
                            <div class="card bg-gradient-light mb-4">
                                <div class="row col-12">

                                    <div class="col-lg-12 ps-5">
                                        <div class="card-body pb-1 mt-1 rounded-pill">

                                            <div class="d-flex flex-row justify-content-start ">
                                                <img src="{{ asset('assets/img/favicon1.png') }}" alt="avatar 1"
                                                    style="width: 45px; height: 100%;">
                                                <div class="p-3 ms-3"
                                                    style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                                    <div class="small mb-0">{{ $item->question->question_english }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse" id="collapseIndonesia">
                                                <div class="d-flex flex-row justify-content-start pt-3 mx-auto">
                                                    <div class="p-3 ms-6"
                                                        style="border-radius: 10px; background-color: rgba(57, 192, 237,.2);">
                                                        <div class="small mb-0">
                                                            {{ $item->question->question_english }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="justify-content-start mx-4">
                                                    <a class="btn btn-link" data-bs-toggle="collapse"
                                                        href="#collapseIndonesia" role="button" aria-expanded="false"
                                                        aria-controls="collapseIndonesia">
                                                        <span class="small text-info icon-move-right " style="text-transform: capitalize">
                                                            Translate<i class="fas fa-arrow-right text-sm ms-1"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row justify-content-end ">
                                                <div>
                                                    <div class="small fw-bold me-3 d-flex justify-content-end">
                                                        {{ $user->name }}
                                                    </div>
                                                    <div class="small p-2 me-3 text-white rounded-3 bg-secondary">
                                                        {{ $item->answer_text }}</div>
                                                    <p
                                                        class="small ms-0 mb-0 d-flex me-3 rounded-3 text-muted justify-content-end">
                                                        {{ $diffStr }}
                                                    </p>
                                                </div>

                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                    alt="avatar 1" style="width: 45px; height: 100%;">

                                            </div>

                                            <!--Start Inline Collapse Feedback-->
                                            <div class="d-flex justify-content-end m-0 me-5">
                                                <a class="btn btn-link text-info" data-bs-toggle="collapse"
                                                    href="#" role="button" aria-expanded="false"
                                                    aria-controls="collapseUser1">
                                                    <i class="bi bi-heart mx-auto"><span class="mx-1">Like</i>
                                                </a>
                                                <a class="btn btn-link text-info" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseUser-{{ $item->answer_key }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapsefeed-{{ $item->answer_key }}">
                                                    <i class="bi bi-chat-dots mx-auto"><span
                                                            class="mx-1">Feedback</span></i>
                                                </a>
                                            </div>

                                            <div class="collapse" id="collapseUser-{{ $item->answer_key }}">
                                                <div class="p-2 border border-white rounded-3">
                                                    <ul class="ps-2">
                                                        <div class="d-flex flex-row justify-content-start">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                                alt="avatar 1" style="width: 45px; height: 100%;">
                                                            <div class="container container-fluid">
                                                                <div class="text-dark pt-1 mx-auto">Clara Croft<button
                                                                        type="button" class="btn btn-link my-auto"
                                                                        style="color: black;" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsereport"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapserepot"><i
                                                                            class="bi bi-three-dots-vertical"></i>

                                                                    </button>
                                                                    <div class="collapse collapse-horizontal"
                                                                        id="collapsereport">
                                                                        <div class="row mx-8"
                                                                            style="width:150px; height:50px;">
                                                                            <h6 class="text-dark">Report</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="small mb-0 rounded-3">Lorem ipsum dolor
                                                                    sit amet, consectetur adipiscing elit, sed do
                                                                    eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua.

                                                                    <p class="small ms-0 mb-0 rounded-3 text-muted">
                                                                        23:58 | 03-Okt-2023</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div
                                                            class="card-footer text-muted d-flex justify-content-start align-items-center">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                                alt="avatar 3" style="width: 40px; height: 100%;">
                                                            <input type="text"
                                                                class="form-control form-control-lg border border-secondary"
                                                                id="FormControlInput1" placeholder="Type message">
                                                            <a class="ms-3" href="#!" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title="Send"><i
                                                                    class="fas fa-paper-plane"></i></a>
                                                        </div>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Content-->
                        @endforeach

                        <div class="row my-2">
                            <div class="col-12 col-md-6">
                                {{ $answers->links() }}
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex">
                                    <div class="ms-auto me-5">
                                        Page {{ $answers->currentPage() }} of {{ $answers->lastPage() }}
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <!--Start Content-->
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
                                        <h6 class="text-dark mx-auto">Clara Croft <button type="button"
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

                                <div class="col-lg-12 ps-5">
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
                                            <div class="d-flex flex-row-reverse justify-content-start pt-1">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                <div>
                                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                                        Tomorrow office. will be free on sunday.</p>
                                                    <p
                                                        class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">
                                                        12-September-2023</p>
                                                </div>

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
                                                    <ul class="ps-2">

                                                        <div class="d-flex flex-row justify-content-start">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                                alt="avatar 1" style="width: 45px; height: 100%;">
                                                            <p class="text-dark py-2 ms-3">Muhammad Luthfi
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p class="small p-2 ms-3 mb-1 rounded-3"
                                                                style="background-color: #f5f6f7;">Lorem ipsum dolor
                                                                sit amet, consectetur adipiscing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua.
                                                            <p class="small ms-4 mb-3 rounded-3 text-muted">
                                                                23:58 | 03-Okt-23</p>
                                                        </div>
                                                        <div class="divider d-flex align-items-center mb-4">
                                                            <p class="text-center mx-3 mb-0" style="color: #a2aab7;">
                                                                Today</p>
                                                        </div>

                                                        <div class="d-flex flex-row justify-content-start">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                                                alt="avatar 2" style="width: 45px; height: 100%;">
                                                            <p class="text-dark py-2 ms-3">Angelia
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p class="small p-2 ms-3 mb-1 rounded-3"
                                                                style="background-color: #f5f6f7;">Ut enim ad minim
                                                                veniam, quis nostrud exercitation ullamco laboris nisi
                                                                ut aliquip ex ea commodo consequat.
                                                            </p>
                                                            <p class="small ms-4 mb-3 rounded-3 text-muted">
                                                                23:58 | 03-Okt-23</p>
                                                        </div>

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
                        </div> --}}
                    </div>
                </div>
    </section>
</x-template.landing>
