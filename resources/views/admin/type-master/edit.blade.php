<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="type-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Type Master"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="card">
                <div class="d-flex ps-3">
                    <h4 class="card-title flex-item pt-4 pb-1">
                        @if (@isset($obj->id))
                            Edit Question Type
                        @else
                            Create Question Type
                        @endif
                    </h4>
                    <ul class="nav justify-content-end px-1 ms-auto me-1">
                        <li>
                            <a class="text-danger text-lg"
                                href="javascript:cancelEdit('{{ route('type-master.index') }}');">
                                <i class="fa fa-window-close"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('type-master.store') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ encrypt($obj->id) }}">

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4 py-1">
                                <div class="form-group">
                                    <label for="txtTypeName" class="form-label">Type Name</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtTypeName"
                                        name="type_name"
                                        value="@isset($obj->id) {{ $obj->type_name }} @endisset">
                                    <small id="typeNameHelp" class="form-text text-muted">The name of Question
                                        Type</small>
                                </div>
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
                    html: 'Any unsaved change(s) will be lost! <br/>This action <strong>cannot be undone</strong>!',
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
    @endpush

</x-template.dashboard>
