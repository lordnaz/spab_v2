
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
             

@foreach ($displayBelumProses as $displayBelumProsess)
              @php
             $total = count($displayBelumProsess['program']);
                           
             @endphp
                <tr class="text-center">
                  <td></td>
                  <td>{{$displayBelumProsess['nric']}}</td>
                  <td>{{$displayBelumProsess['name']}}</td>
                  <td>{{$displayBelumProsess['type_program_applied']}}</td>
                  <td>{{$displayBelumProsess['state']}}</td>
                  @if ($total == '2')
                  @foreach ($displayBelumProsess as $displayBelumProsesss)
                  <td>{{$displayBelumProsesss['program']}}</td>
                  <td>{{$displayBelumProsesss['program']}}</td>
                  @endforeach
                  @else
                  <td>{{$displayBelumProsess['program']}}</td>
                  <td></td>
                  @endif
                  <td>{{$displayBelumProsess['cert_related_program']}}</td>
                  <td>{{$displayBelumProsess['code_center']}}</td>
                  <td>{{$displayBelumProsess['TarikhProses']}}</td>
                  <td>
                   
                    
                  </td>
                 
                </tr>
             @endforeach

            <tr>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            <td>kacak</td>
            </tr>

</tbody>
