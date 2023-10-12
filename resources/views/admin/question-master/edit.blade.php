<x-template.dashboard bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="question-master"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

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
                                href="javascript:cancelEdit('{{ route('question-master.index') }}');">
                                <i class="fa fa-window-close"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('question-master.store') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ encrypt($obj->id) }}">

                        <div class="row py-2">
                            <div class="col-12 col-md-6 col-lg-4 py-1">
                                <div class="form-group">
                                    <label for="cboType" class="form-label">Question Type</label>
                                    <select class="form-select border-secondary" id="cboType" name="type_id">
                                        <option value="" disabled="true" selected>Select Question Type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">
                                                {{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="questionTypeHelp" class="form-text text-muted">Select question
                                        type</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 py-1">
                                <div class="form-group">
                                    <label for="cboLevel" class="form-label">Level</label>
                                    <select class="form-select border-secondary" id="cboLevel" name="level_id">
                                        <option value="" disabled="true" selected>Select Question Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">
                                                {{ $level->level_name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="questionLevelHelp" class="form-text text-muted">Select question
                                        level</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 py-1">
                                <div class="form-group">
                                    <label for="txtQuestionEnglish" class="form-label">Question Text (English)</label>
                                    <textarea class="form-control border border-2 p-2" id="txtQuestionEnglish" name="question_english">{{ $obj->question_english }}</textarea>
                                    <small id="questionEngHelp" class="form-text text-muted">Question text (in
                                        English)</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 py-1">
                                <div class="form-group">
                                    <label for="txtQuestionIndonesian" class="form-label">Question Text
                                        (Indonesian)</label>
                                    <textarea class="form-control border border-2 p-2" id="txtQuestionIndonesian" name="question_indonesia">{{ $obj->question_indonesia }}</textarea>
                                    <small id="questionIndHelp" class="form-text text-muted">Translation of question
                                        text (in
                                        Indonesian)</small>
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
                    html: "{!! $rspMsg->message !!}",
                    icon: '{{ $rspMsg->status }}',
                });
            @endisset

            var type_id = null;
            var level_id = null;
            @isset($obj->type_id)
                type_id = {{ $obj->type_id }};
            @endisset
            @isset($obj->level_id)
                level_id = {{ $obj->level_id }};
            @endisset

            setSelectValue($('#cboType'), type_id);
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

            function setSelectedItem(id = null, ref = null) {
                if (id === ref) {
                    return "selected";
                }
                return null;
            }

            function setSelectValue(instance, value) {
                instance.val(value).change();
            }
        </script>
    @endpush

</x-template.dashboard>
