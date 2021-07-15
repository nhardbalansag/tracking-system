@extends('welcome')

@section('content')

<div class="container">
    <div class="my-5">
        <form action="{{ route('track-driver') }}" method="post">
            @csrf
            <div class="w-50">
                <div class="row col-12">
                    <div class="col-md-7">
                        <input name="track_Id" class="form-control" type="text" aria-label="default input example">
                    </div>
                    <div class="col-md-5">
                        <input type="submit" class="btn btn-primary" placeholder="See Details">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

