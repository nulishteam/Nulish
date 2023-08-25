<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="level-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Level Master"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="card ps-4">
                <ul class="nav justify-content-end px-1 me-1">
                    <li>
                        <a class="text-danger text-lg" href="javascript:cancelEdit('{{ route('level-master.index') }}')">
                            <i class="fa fa-window-close"></i>
                        </a>
                    </li>
                </ul>
                <h4 class="card-title">
                    @if (@isset($obj->id))
                        Edit Level
                    @else
                        Create Level
                    @endif
                </h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('level-master.store') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ encrypt($obj->id) }}">

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtLevelName" class="form-label">Level Name</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtLevelName"
                                        name="level_name"
                                        value="@isset($obj->id){{ $obj->level_name }}@endisset">
                                    <small id="emailHelp" class="form-text text-muted">The name of Level</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtLevelWeight" class="form-label">Level Weight</label>
                                    <input type="number" class="form-control border border-2 p-2" id="txtLevelWeight"
                                        name="level_weight" min=1 max=100
                                        value=@isset($obj->id) {{ $obj->level_weight }} @endisset>
                                    <small id="emailHelp" class="form-text text-muted">The weight of Level (indicates
                                        the priority)</small>
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
    @endpush
</x-template.dashboard>
