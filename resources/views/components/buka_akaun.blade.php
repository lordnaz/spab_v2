@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Buka Akaun</h4>
        </div>
        <div class="card-body">
          <form action="/add_new_akaun" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
            @csrf
            <div class="row">

            <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">No. Kad Pengenalan</label>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" id="code" class="form-control" name="nric" placeholder="" required/>
                  </div>
                </div>
              </div>

            <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">Nama</label>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" id="code" class="form-control" name="name" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">Emel</label>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" id="code" class="form-control" name="emel" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">Password</label>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" id="name" class="form-control" name="password" placeholder="" required/>
                  </div>
                </div>
              </div>

              

              <div class="col-sm-3 offset-sm-5">
                
                <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>{!! __('locale.Add') !!}</span>
                </button>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- Basic Horizontal form layout section end -->

@endsection