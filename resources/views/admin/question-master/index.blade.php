<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="question-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Question Master"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg px-0 mx-0 py-0 my-0 shadow-none border-radius-xl bg-gray-200">
                        <div class="container-fluid mx-3">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item d-flex align-items-center">
                                    <a class="btn btn-info text-capitalize text-md px-3 py-2"
                                        href="javascript:window.location.replace('{{ route('question-master.create') }}');">
                                        <i class="fa fa-plus"></i> Tambah
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="card my-3">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Question Master</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0 ps-3">
                                <table class="table align-items-center mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Question (English)</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Question (Indonesian)</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Level</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Type</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Created By</th>
                                            <th class="text-secondary text-xs opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($questions->count() == 0)
                                            <tr>
                                                <td colspan="3">
                                                    <div class="w-100 text-center">
                                                        No Data
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                        @isset($questions)
                                            @foreach ($questions as $question)
                                                <tr>
                                                    <td>{{ $question->question_english }}</td>
                                                    <td>{{ $question->question_indonesia }}</td>
                                                    <td>{{ $question->level->level_name }}</td>
                                                    <td>{{ $question->type->type_name }}</td>
                                                    <td>{{ $question->createdBy->name }}</td>
                                                    <td>
                                                        <span>
                                                            <a href="javascript:window.location.replace('{{ route('question-master.edit', $question) }}');"
                                                                class="btn btn-success m-0 py-1 px-3"
                                                                data-original-title="Edit Question">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                            <a href="javascript:confirmDelete({{ $question }});"
                                                                class="btn btn-danger m-0 py-1 px-3"
                                                                data-original-title="Delete Question">
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
                            <div class="row my-2">
                                <div class="col-12 col-md-6">
                                    {{ $questions->links() }}
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex">
                                        <div class="ms-auto me-5">
                                            Page {{ $questions->currentPage() }} of {{ $questions->lastPage() }}
                                        </div>
                                    </div>
                                </div>
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
                    title: 'Delete selected question ?',
                    html: "Selected Question will be deleted permanently! <br/>This action <strong>cannot be undone</strong>!'",
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
                            url: "{{ route('question-master.index') }}/" + obj.id,
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
                                    window.location.href = "{{ route('question-master.index') }}";
                                });
                            }
                        });
                    }
                });
            }
        </script>
    @endpush
</x-template.dashboard>
