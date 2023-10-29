<x-template.landing bodyClass="blog-author bg-gray-200">
    <x-navbars.navs.auth titlePage=''></x-navbars.navs.auth>

    <!-- Start foto user and identitas user-->
    <section class="py-lg-5">
        <div class="container d-flex justify-content-center">
            <div class="col-12 col-lg-10 ">
                <div class="row ">
                    <div class="col my-6 ">

                        <!--Start Content-->
                        <div class="card card-profile bg-gradient-light mb-4">
                            <div class="row col-12 ps-5">
                                <form method='POST' action='{{ route('answer.store') }}'>
                                    @csrf
                                    <div class="card-body ps-lg-0 mt-1 rounded-pill">
                                        <h4 class="mb-4 text-center rounded-3 border-bottom"
                                            style="font-family: Georgia, 'Times New Roman', Times, serif">Daily
                                            Questions!
                                            <hr>
                                        </h4>
                                        <div class="col">
                                            <div class="d-flex flex-row justify-content-start pt-1">
                                                <img src="{{ asset('assets/img/favicon1.png') }}" alt="avatar 1"
                                                    style="width: 45px; height: 100%;">
                                                <div class="p-3 ms-3"
                                                    style="border-radius: 10px; background-color: rgba(57, 192, 237,.2);">
                                                    <div class="small mb-0">
                                                        <span class="text-dark">
                                                            @if (isset($question))
                                                                {{ $question->question_english }}
                                                                <input type="hidden" name="q_key"
                                                                    value="{{ $question->question_key }}" />
                                                            @else
                                                                <strong class="text-warning">No questions available for
                                                                    you.
                                                                    Looks like
                                                                    you have exceeded the maximum level</strong>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-flex flex-row justify-content-start mx-5">
                                                <a type="button" class="btn btn-link" data-bs-toggle="popover"
                                                data-bs-placement="right" data-bs-custom-class="custom-popover"
                                                data-bs-content="
                                            @if (isset($question)) {{ $question->question_indonesia }}

                                                            @else
                                                                <strong class="text-warning">No questions available for
                                                                    you.
                                                                    Looks like
                                                                    you have exceeded the maximum level</strong> @endif
                                                            ">
                                                <span class="small text-info icon-move-right"
                                                    style="text-transform: capitalize">Translate
                                                    <i class="fas fa-regular fa-hand-point-right fa-beat"></i>
                                                </span>

                                            </a>
                                            </div>

                                        </div>

                                        <div class="container row">
                                            <div class="justify-content-start mx-4 col-auto">
                                                {{-- <a class="btn btn-link" data-bs-toggle="collapse"
                                                    href="#collIndonesia" role="button" aria-expanded="false"
                                                    aria-controls="collIndonesia">
                                                    <span class="small text-info icon-move-right " style="text-transform: capitalize">
                                                        Translate<i class="fas fa-arrow-right text-sm ms-2"></i>
                                                    </span>
                                                </a> --}}

                                            </div>
                                            {{-- <div class="collapse col" id="collIndonesia">
                                                <div class="col-auto mx-aut pt-3">
                                                        <div class="small mb-0">
                                                            <span class="text-dark">
                                                                @if (isset($question))
                                                                    {{ $question->question_indonesia }}
                                                                    <input type="hidden" name="q_key"
                                                                        value="{{ $question->question_key }}" />
                                                                @else
                                                                    <strong class="text-warning">No questions available for
                                                                        you.
                                                                        Looks like
                                                                        you have exceeded the maximum level</strong>
                                                                @endif

                                                            </span>
                                                        </div>

                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="d-flex text-muted justify-content-start align-items-center py-2">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                alt="avatar 3" style="width: 40px; height: 100%;">
                                            <input type="text"
                                                class="form-control form-control-lg border border-secondary mx-1 p-3 ms-3"
                                                id="exampleFormControlInput1" placeholder="Type message">
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn bg-gradient-dark my-2">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--End Content-->

                        <!--Aktivity-->
                        <div class="card card-profile bg-gradient-light ">
                            <div class="row row-flex justify-content-center">
                                <h4 class="col-3  mb-4 text-center bg-gradient-white rounded-3 my-3 border-bottom"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif">
                                    Recent Activity!
                                </h4>
                            </div>
                            {{-- <div class="container">
                                <div class="medium fw-normal mb-2 ps-5"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif">New action</div>
                            </div> --}}
                            {{-- No Collapse  --}}
                            @foreach ($recents1 as $item)
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
                                <div class="card w-90 mx-auto mb-2">
                                    <div class="row col-12 ps-6 mb-2">
                                        <div class="d-flex flex-row justify-content-start">
                                            <img src="{{ route('img.retrieve', ['user_image', $item->user->user_image]) }}"
                                                class=" rounded rounded-circle" alt="avatar 1"
                                                style="width: 80px; height: 100%;">
                                            <div class="col-10 mx-3">
                                                <div class="small me-3 d-flex fw-bold justify-content-start py-2">
                                                    <a
                                                        href="{{ route('profile', $item->user->user_key) }}">{{ $item->user->name }}</a>
                                                </div>
                                                <div class="small  rounded-3">
                                                    <a href="{{ $item->link }}">{{ $item->text }}</a>
                                                </div>

                                                <div class="text-xs fw-light">
                                                    <i class="fa fa-clock me-1"></i>
                                                    {{ $diffStr }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- With Collapse  --}}
                            @foreach ($recents2 as $item)
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
                                <div class="collapse" id="collapseExample">
                                    <div class="card w-90 mx-auto mb-2">
                                        <div class="row col-12 ps-6 mb-2">
                                            <div class="d-flex flex-row justify-content-start">
                                                <img src="{{ route('img.retrieve', ['user_image', $item->user->user_image]) }}"
                                                    class=" rounded rounded-circle" alt="avatar 1"
                                                    style="width: 80px; height: 100%;">
                                                <div class="col-10 mx-3">
                                                    <div class="small me-3 d-flex fw-bold justify-content-start py-2">
                                                        <a
                                                            href="{{ route('profile', $item->user->user_key) }}">{{ $item->user->name }}</a>
                                                    </div>
                                                    <div class="small  rounded-3">
                                                        <a href="{{ $item->link }}">{{ $item->text }}</a>
                                                    </div>

                                                    <div class="text-xs fw-light">
                                                        <i class="fa fa-clock me-1"></i>
                                                        {{ $diffStr }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!---collapse-->
                            <div class="container">
                                <div class="d-flex justify-content-end mx-4">
                                    <a class="btn btn-link" data-bs-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="small text-info icon-move-right "
                                            style="text-transform: capitalize">
                                            More <i class="fas fa-regular fa-hand-point-right fa-beat"></i></i>
                                        </span>
                                    </a>
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
