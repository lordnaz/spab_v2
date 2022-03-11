
<thead>
              <tr class="text-center">
                <th></th>
                <th>No.KP</th>
                <th>{!! __('locale.Name') !!}</th>
                <th>Jenis</th>
                <th>Negeri</th>
                <th>P1</th>
                <th>P2</th>
                <th>Sijil</th>
                <th>P.T'Duga</th>
                <th>T.Proses</th>
                <th>{!! __('locale.Action') !!}</th>
              </tr>

            </thead>
            @php  
                $count = 1;
              @endphp
<tbody>
             

@foreach ($displayTolak as $displayTolakk)
              @php
             $total = count($displayTolakk['program']);
                           
             @endphp
                <tr class="text-center">
                  <td></td>
                  <td>{{$displayTolakk['nric']}}</td>
                  <td>{{$displayTolakk['name']}}</td>
                  <td>{{$displayTolakk['type_program_applied']}}</td>
                  <td>{{$displayTolakk['state']}}</td>
                  @if ($total == '2')
                  @foreach ($displayTolakk as $displayTolakkk)
                  <td>{{$displayTolakkk['program']}}</td>
                  <td>{{$displayTolakkk['program']}}</td>
                  @endforeach
                  @else
                  <td>{{$displayTolakk['program']}}</td>
                  <td></td>
                  @endif
                  <td>{{$displayTolakk['cert_related_program']}}</td>
                  <td>{{$displayTolakk['code_center']}}</td>
                  <td>{{$displayTolakk['TarikhProses']}}</td>
                  <td>
                   
                    
                  </td>
                 
                </tr>
             @endforeach

            <tr>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            <td>sazrul</td>
            </tr>

</tbody>
