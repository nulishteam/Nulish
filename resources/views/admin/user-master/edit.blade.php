<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="user-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

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
                    <form method="POST" action="{{ route('user-master.store') }}" enctype="multipart/form-data">
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
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control border border-2 p-2" id="txtEmail"
                                        name="email"
                                        value="@isset($obj->id) {{ $obj->email }} @endisset">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan email aktif Kamu</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 py-1">
                                <div class="form-group">
                                    <label for="cboLevel" class="form-label">Level</label>
                                    <select class="form-select border-secondary" id="cboLevel" name="level_id">
                                        <option value="" disabled="true" selected>Select Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">
                                                {{ $level->level_name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="questionLevelHelp" class="form-text text-muted">Select level</small>
                                </div>
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-12 py-1">
                                @isset($obj->user_image)
                                    <div class="col-12 col-lg-6 py-1">
                                        <img src="{{ route('img.retrieve', ['user_image', $obj->user_image]) }}"
                                            class="img-fluid">
                                    </div>
                                @endisset
                                <div class="col-12 col-lg-6 py-1">
                                    <div class="form-group">
                                        <label for="image" class="font-weight-bold">
                                            @if (isset($obj->user_image))
                                                Update Image
                                            @else
                                                Select Image
                                            @endif
                                        </label>
                                        <input class="form-control border border-secondary px-2" type="file"
                                            id="userImage" name="user_image">
                                        <small id="userImageHelp" class="form-text text-muted">Upload Gambar Profil
                                            Kamu</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-2">
                            <h6>
                                @if (@isset($obj->id))
                                    Update Password
                                @else
                                    Set Password
                                @endif
                            </h6>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control border border-2 p-2" id="txtPassword"
                                        name="password">
                                    <small id="passwordlHelp" class="form-text text-muted">Buat password Kamu</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="txtPassword" class="form-label">Retype Password</label>
                                    <input type="password" class="form-control border border-2 p-2" id="txtPassword"
                                        name="passwordRetype">
                                    <small id="passwordlHelp" class="form-text text-muted"></small>
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

            var level_id = null;
            @isset($obj->level_id)
                level_id = {{ $obj->level_id }};
            @endisset

            setSelectValue($('#cboLevel'), level_id);

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

            function setSelectValue(instance, value) {
                instance.val(value).change();
            }
        </script>
    @endpush

</x-template.dashboard>
