@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            <apartment-form></apartment-form>
        </div>
        <div class="col">
            <apartment-listings :apartments="{{ $apartments }}"></apartment-listings>
        </div>
    </div>
</div>
@endsection
