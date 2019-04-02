@extends('layouts.app')

@section('content')
<div class="container">
    <apartment-listings :apartments="{{ $apartments }}"></apartment-listings>
</div>
@endsection
