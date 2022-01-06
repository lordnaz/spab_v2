@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Kick start -->
<div class="card">
    <div class="misc-wrapper">
        <div class="misc-inner p-2 p-sm-3">
            <div class="w-100 text-center">
                <h2 class="mb-1">You are not authorized! 🔐</h2>
                <p class="mb-2">
                    The Webtrends Marketing Lab website in IIS uses the default IUSR account credentials to access the web pages it
                    serves.
                </p>
                <a class="btn btn-primary mb-1 btn-sm-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Back to login</a>
                <br>
                <img class="img-fluid" src=".\images\pages\not-authorized.svg" alt="Not authorized page" />
            </div>
        </div>
    </div>

</div>
<!--/ Kick start -->

@endsection
