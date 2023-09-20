<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="type-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Master"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <nav class="navbar navbar-expand-lg px-0 mx-0 py-0 my-0 shadow-none border-radius-xl bg-gray-200">
                        <div class="container-fluid mx-3">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item d-flex align-items-center">
                                    <a class="btn btn-info text-capitalize text-md px-3 py-2"
                                        href="javascript:window.location.replace('{{ route('user-master.create') }}')">
                                        <i class="fa fa-plus"></i> Tambah
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="card my-3">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">User Master</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0 ps-3">
                                <table class="table align-items-center mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                User Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Email</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Image</th>
                                            <th class="text-secondary text-xs opacity-7"></th>

                                            <th class="text-secondary text-xs opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($users->count() == 0)
                                            <tr>
                                                <td colspan="3">
                                                    <div class="w-100 text-center">
                                                        No Data
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                        @isset($users)
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->user_image }}</td>
                                                    <td>
                                                        <span>
                                                            <a href="javascript:window.location.replace('{{ route('user-master.edit', $user) }}');"
                                                                class="btn btn-success m-0 py-1 px-3"
                                                                data-original-title="Edit User">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                            <a href="javascript:confirmDelete({{ $user }});"
                                                                class="btn btn-danger m-0 py-1 px-3"
                                                                data-original-title="Delete User">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>

                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

            function confirmDelete(obj) {
                var token = $("input[name='_token']").attr("value");
                Swal.fire({
                    title: 'Delete <br/> <strong>' + obj.name +
                        '</strong> ?', // type_name diganti jadi name (field DB)?
                    html: "<strong>" + obj.name +
                        "</strong> will be deleted permanently! <br/>This action <strong>cannot be undone</strong>!'",
                    icon: 'warning',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    //cancelButtonColor: 'blue',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('user-master.index') }}/" + obj.id,
                            data: {
                                "id": obj.id,
                                "_token": token,
                            },
                            dataType: "json",
                            success: function(res) {
                                Swal.fire(
                                    'Success',
                                    res.message,
                                    'success'
                                ).then((result) => {
                                    window.location.href = "{{ route('user-master.index') }}";
                                    //window.location.replace("{{ route('user-master.index') }}");
                                });
                            }
                        });
                    }
                });
            }
        </script>
    @endpush
</x-template.dashboard>
