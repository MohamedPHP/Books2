@extends('backend.layout.admin')


@section('content')
    <div class="row" style="padding: 25px;">
        <div class="col s12 z-depth-1">
            <h5>Create Codes</h5>
        </div>
    </div>
    <div class="row" style="padding: 25px;">
        <div class="col s12  z-depth-1">
            <div class="card-panel teal">
                <span class="white-text">The Code Name Can't Be Reapeated And It's required.</span>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 25px;">
        <div class="col s12 z-depth-3">
            <br>
            <form action="{{ route('code.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s6">
                        <input id="code" name="code" type="text" class="validate" value="{{ old('code') }}">
                        <label for="code">Code</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="student_id" name="student_id" type="text" class="validate" value="{{ old('student_id') }}">
                        <label for="student_id">StudentID</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit">Create
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    @if (Session::has('message'))
        <script type="text/javascript">
            var $toastContent = $('<span>{{ Session::get('message') }}</span>');
            Materialize.toast($toastContent, 5000);
        </script>
    @endif
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                var $toastContent = $('<span>{{ $error }}</span>');
                Materialize.toast($toastContent, 5000);
            </script>
        @endforeach
    @endif
@endsection
