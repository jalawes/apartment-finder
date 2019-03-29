@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <apartment-listings :apartments="{{ $apartments }}"></apartment-listings>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <apartment-form></apartment-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
