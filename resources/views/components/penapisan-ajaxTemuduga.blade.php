
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
             

             @foreach ($displayTemuduga as $displayTemudugaa)
             @php
            $total = count($displayTemudugaa['program']);
                          
            @endphp
               <tr class="text-center">
                 <td></td>
                 <td>{{$displayTemudugaa['nric']}}</td>
                 <td>{{$displayTemudugaa['name']}}</td>
                 <td>{{$displayTemudugaa['type_program_applied']}}</td>
                 <td>{{$displayTemudugaa['state']}}</td>
                 @if ($total == '2')
                 @foreach ($displayTemudugaa as $displayTemudugaaa)
                 <td>{{$displayTemudugaaa['program']}}</td>
                 <td>{{$displayTemudugaaa['program']}}</td>
                 @endforeach
                 @else
                 <td>{{$displayTemudugaa['program']}}</td>
                 <td></td>
                 @endif
                 <td>{{$displayTemudugaa['cert_related_program']}}</td>
                 <td>{{$displayTemudugaa['code_center']}}</td>
                 <td>{{$displayTemudugaa['TarikhProses']}}</td>
                 <td>
                  
                   
                 </td>
                
               </tr>
            @endforeach

            <tr>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            <td>nizam</td>
            </tr>

</tbody>
