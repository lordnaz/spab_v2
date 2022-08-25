@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{!! __('locale.Details_2') !!}</h4>
        </div>
        <div class="card-body">
          <form action="/add_new_temuduga" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
            @csrf
            <div class="row">

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="code">{!! __('locale.No.KP') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="code" class="form-control" name="no_ic" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Name') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_name" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Position') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_position" placeholder="" required/>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Faculty') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="faculty" name="panel_faculty" required>
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option data-avatar="1-small.png" value="Muzik">Muzik</option>
                        <option data-avatar="3-small.png" value="Tari">Tari</option>
                        <option data-avatar="5-small.png" value="Teater">Teater</option>
                        <option data-avatar="7-small.png" value="Animasi Dan Multimedia">Animasi Dan Multimedia</option>
                        <option data-avatar="9-small.png" value="Pengurusan Seni Budaya Dan Warisan">Pengurusan Seni Budaya Dan Warisan</option>
                        <option data-avatar="7-small.png" value="Seni Halus">Seni Halus</option>
                        <option data-avatar="7-small.png" value="Penulisan Kretif dan Filem">Penulisan Kretif dan Filem</option>
                        <option data-avatar="7-small.png" value="Pusat Pengajian Asasi">Pusat Pengajian Asasi</option>
                        <option data-avatar="7-small.png" value="Pusat Pascasiswazah">Pusat Pascasiswazah</option>
                        <option data-avatar="7-small.png" value="Diploma Seni Muzik TLDM">Diploma Seni Muzik TLDM</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="label-textarea">{!! __('locale.Address') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="label-textarea" name="address_1" rows="4" placeholder="...."></textarea>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Tel(H)') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="tel_house" placeholder="" />
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Tel(P)') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="tel_phone" placeholder="" />
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Email') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_email" placeholder="" />
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Status') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                      <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                      <option data-avatar="1-small.png" value="Aktif">{!! __('locale.Active') !!}</option>
                      <option data-avatar="3-small.png" value="Tidak Aktif">{!! __('locale.Not Active') !!}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Description') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="description" placeholder="" value="" />
                  </div>
                </div>
              </div>

              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('paneltemuduga') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
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