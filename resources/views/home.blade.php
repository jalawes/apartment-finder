@extends('layouts.app')

@section('content')
<div class="container">
    <apartment-listings :apartments="{{ json_encode($apartments) }}"></apartment-listings>
</div>
@endsection
