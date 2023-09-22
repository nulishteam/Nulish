<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="user-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Master"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="card">
                <div class="d-flex ps-3">
                    <h4 class="card-title flex-item pt-4 pb-1">
                        @if (@isset($obj->id))
                            Edit User
                        @else
                            Create User
                        @endif
                    </h4>
                    <ul class="nav justify-content-end px-1 ms-auto me-1">
                        <li>
                            <a class="text-danger text-lg"
                                href="javascript:cancelEdit('{{ route('user-master.index') }}');">
                                <i class="fa fa-window-close"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user-master.store') }}">
                        {{-- ini yg penting utk mengarahkan setelah action dilakukan --}}
                        @csrf
                        {{-- csrf ini menghasilkan token utk keamanan akses, data yg dikirim dari depan itu adalah berasal dari website internal --}}
                        <input type="hidden" name="id" value="{{ encrypt($obj->id) }}">

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtName" class="form-label">Name</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtName"
                                        name="name"
                                        value="@isset($obj->id) {{ $obj->name }} @endisset">
                                    <small id="nameHelp" class="form-text text-muted">Buat nama Kamu</small>
                                </div>
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtEmail"
                                        name="email"
                                        value="@isset($obj->id) {{ $obj->email }} @endisset">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan email aktif Kamu</small>
                                </div>
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtImage" class="form-label">Gambar Profil</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtImage"
                                        name="user_image"
                                        value="@isset($obj->id) {{ $obj->user_image }} @endisset">
                                    <small id="userImageHelp" class="form-text text-muted">Upload Gambar Profil
                                        Kamu</small>
                                </div>
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control border border-2 p-2" id="txtPassword"
                                        name="password"
                                        value="@isset($obj->id) {{ $obj->password }} @endisset">
                                    <small id="passwordlHelp" class="form-text text-muted">Buat password Kamu</small>
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
