@extends('welcome')

@section('content')

    <div class="px-4 py-5 my-5 text-center">
        {{-- <img class="mx-auto mb-4 d-block" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="display-5 fw-bold">{{ env('APP_NAME') }}</h1>
        <div class="mx-auto col-lg-6">
            <p class="mb-4 lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <form action="{{ route('track-driver') }}" method="post">
                @csrf
                <div class="m-auto w-50">
                    <div class="row col-12">
                        <div class="col-md-7">
                            <input name="track_Id" class="form-control" type="text" aria-label="default input example" placeholder="Search Order ID">
                        </div>
                        <div class="col-md-5">
                            <input type="submit" class="btn btn-primary" value="See Details">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

