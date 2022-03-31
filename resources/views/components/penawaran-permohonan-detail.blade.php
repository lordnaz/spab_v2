@extends('layouts/contentLayoutMaster')

@section('content')
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{!! __('locale.Applicant Details') !!}</h4>
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
                    <input type="text" id="code" class="form-control" name="no_ic" placeholder="" />
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Name') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="panel_name" placeholder="" />
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Type') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                      <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                      <option value="Sepenuh Masa">{!! __('locale.Full Time') !!}</option>
                      <option value="Separuh Masa">{!! __('locale.Half Time') !!}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.State') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option value="Kedah Darul Aman">Kedah Darul Aman</option>
                        <option value="Kelantan Darul Naim">Kelantan Darul Naim</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan Darul Khusus">Negeri Sembilan Darul Khusus</option>
                        <option value="Pahang Darul Makmur">Pahang Darul Makmur</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Perak Darul Ridzuan">Perak Darul Ridzuan</option>
                        <option value="Perlis Indra Kayangan">Perlis Indra Kayangan</option>
                        <option value="Selangor Darul Ehsan">Selangor Darul Ehsan</option>
                        <option value="Terengganu Darul Iman">Terengganu Darul Iman</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                        <option value="W.P Labuan">W.P Labuan</option>
                        <option value="W.P Putrajaya">W.P Putrajaya</option>
                        <option value="Lain-lain">Lain-lain</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Program') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option value="ANF123">ANF123 - Penulisan Seni Kreatif</option>
                        <option value="SFX321">SFX321 - Animasi & Multimedia</option>
                        <option value="MSC456">MSC456 - Perniagaan Musik</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Certificate') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="tel_house" placeholder="" />
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Interview Center') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option value="ASWARA">ASWARA</option>
                        <option value="JKKN Kedah">JKKN Kedah</option>
                        <option value="JKKN Terengganu">JKKN Terengganu</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label">{!! __('locale.Session') !!}:</label>
                  </div>
                  <div class="col-sm-10">
                    <select class="select2 form-select" id="type" name="status">
                        <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Proposal') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="description" placeholder="" value="" />
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label" for="name">{!! __('locale.Marks') !!}</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="name" class="form-control" name="description" placeholder="" value="" />
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
                      <option value="Tawar">{!! __('locale.Offer') !!}</option>
                      <option value="KIV">{!! __('locale.KIV') !!}</option>
                      <option value="Tolak">{!! __('locale.Reject') !!}</option>
                      <option value="Tolak">{!! __('locale.Attend') !!}</option>
                    </select>
                  </div>
                </div>
              </div>



              <div class="col-sm-3 offset-sm-9">
                <a href="{{ route('paneltemuduga') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>
                <button type="submit" class="btn btn-success">
                  <i data-feather="plus-circle" class="me-25"></i>
                  <span>{!! __('locale.Submit') !!}</span>
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