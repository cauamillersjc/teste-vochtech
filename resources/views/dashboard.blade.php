@extends('layout')

@section('content')
    <div class="d-flex justify-content-center">
        <img src="data:image/png;base64,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" />
    </div>
@endsection