<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="home-item-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="HomeItem Master"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="card">
                <div class="d-flex ps-3">
                    <h4 class="card-title flex-item pt-4 pb-1">
                        @if (@isset($obj->id))
                            Edit Home-item
                        @else
                            Create Home-item
                        @endif
                    </h4>
                    <ul class="nav justify-content-end px-1 ms-auto me-1">
                        <li>
                            <a class="text-danger text-lg"
                                href="javascript:cancelEdit('{{ route('home-item-master.index') }}')">
                                <i class="fa fa-window-close"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('home-item-master.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ encrypt($obj->id) }}">

                        <div class="row py-2">
                            <div class="col-12 col-lg-6 py-1">
                                <div class="form-group">
                                    <label for="txtTitle" class="font-weight-bold">Title</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtTitle"
                                        name="title"
                                        value="@isset($obj->id) {{ $obj->title }} @endisset">

                                </div>
                            </div>
                            <div class="col-12 py-1">
                                @isset($obj->image)
                                    <div class="col-12 col-lg-6 py-1">
                                        <img src="{{ route('img.retrieve', ['home_item', $obj->image]) }}"
                                            class="img-fluid">
                                    </div>
                                @endisset
                                <div class="col-12 col-lg-6 py-1">
                                    <div class="form-group">
                                        <label for="image" class="font-weight-bold">
                                            @if (isset($obj->image))
                                                Update Image
                                            @else
                                                Select Image
                                            @endif
                                        </label>
                                        <input class="form-control border border-secondary px-2" type="file"
                                            id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-1">
                                <div class="form-group">
                                    <label class="font-weight-bold">Content</label>
                                    <textarea class="form-control border border-2 p-2" rows="5" name="content" placeholder="Input your content">
@isset($obj->id)
{{ $obj->content }}
@endisset
</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Submit
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>

    @push('js')
        <script>
            @isset($rspMsg)
                Swal.fire({
                    title: '{{ $rspMsg->title }}',
                    html: '{!! $rspMsg->message !!}',
                    icon: '{{ $rspMsg->status }}',
                });
            @endisset
            function cancelEdit(homeUrl) {
                Swal.fire({
                    title: 'Close page?',
                    html: "Any unsaved change(s) will be lost! <br/>This action <strong>cannot be undone</strong>!'",
                    icon: 'warning',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    //cancelButtonColor: 'blue',
                    confirmButtonText: 'Close',
                    cancelButtonText: 'Continue editing',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace(homeUrl);
                    }
                });
            }
        </script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    @endpush
</x-template.dashboard>
