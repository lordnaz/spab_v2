<form action="/tawar_penawaran" method="post" enctype="multipart/form-data" accept-charset='UTF-8' class="form form-horizontal">
                        @csrf
                        <div class="row">



                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="code">No. KP:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" id="nric" class="form-control" name="nric" value="{{$displaypenawaran['nric']}}" readonly />
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">

                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="code">Nama:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" id="name" class="form-control" name="name" value="{{$displaypenawaran['name']}}" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label">Program Tawar:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="select2 form-select" id="myselect" name="program_tawar">
                                                <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                                @foreach ($program as $programs)
                                                <option value="{{$programs['program_id']}}" @if(!empty($displaypenawaran['cadang1'])) @if($programs['program_id'] == $displaypenawaran['program_tawar']) selected @endif @endif>{{$programs['code']}} - {{$programs['program']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">

                                    <div class="mb-1 row">
                                        <div class="col-sm-2">

                                            <label class="col-form-label">Semester:</label>
                                        </div>
                                        <div class="col-sm-4">

                                            <select class="select2 form-select" id="type" name="sem">
                                                <option selected disabled>{!! __('locale.Please Choose') !!}</option>
                                                
                                                <option value="1" @if($displaypenawaran['sem'] == '1') selected @endif >1</option>
                                                <option value="2" @if($displaypenawaran['sem'] == '2') selected @endif>2</option>
                                                <option value="3" @if($displaypenawaran['sem'] == '3') selected @endif>3</option>
                                                <option value="4" @if($displaypenawaran['sem'] == '4') selected @endif>4</option>
                                                <option value="5" @if($displaypenawaran['sem'] == '5') selected @endif>5</option>
                                                <option value="6" @if($displaypenawaran['sem'] == '6') selected @endif>6</option>
                                                
                                            </select>

                                        </div>

                                        <div class="col-sm-2">
                                            <label class="col-form-label">Tahun:</label>
                                        </div>
                                        <div class="col-sm-4">

                                            <input type="text" id="code" class="form-control" name="tahun" value="{{$displaypenawaran['tahun']}}"/>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">

                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label">Tarikh Daftar:</label>
                                        </div>
                                        <div class="col-sm-4">

                                            <input type="text" id="code" class="form-control" name="tarikh_daftar" value="{{$offer['registration_date']}}"/>
                                        </div>

                                        <div class="col-sm-2">
                                            <label class="col-form-label">Masa Daftar:</label>
                                        </div>
                                        <div class="col-sm-4">

                                            <input type="text" id="code" class="form-control" name="masa_daftar" value="{{$offer['registration_time']}}"/>
                                        </div>

                                    </div>
                                </div>





                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="label-textarea">Tempat Daftar</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="label-textarea" name="tempat_daftar" rows="3" placeholder="">{{$offer['registration_venue']}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="label-textarea">Catatan</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="label-textarea" name="catatan" rows="3" placeholder="">{{$displaypenawaran['catatan']}}</textarea>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-sm-3 offset-sm-9">
                                    <a href="{{ route('PusatTemudugaTable') }}" class="btn btn-outline-secondary me-1">{!! __('locale.Back') !!}</a>


                                    <button type="submit" class="btn btn-success">

                                        <i data-feather="plus-circle" class="me-25"></i>
                                        <span>{!! __('locale.Add') !!}</span>
                                    </button>


                                </div>

                            </div>
                    </form>