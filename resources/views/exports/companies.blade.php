   <table>
            <thead>
                <tr>  
                      <td></td>
                      <td>Address</td>
                      <td>Value</td>
                      <td>Outstanding Mortgage</td>
                      <td>Monthly Rental Income</td>
                      <td>Monthly Mortgage Payment</td>
                      <td>Purchase Price</td>
                      <td>Purchase Date</td>
                      <td>Lender Name</td>
                      <td>Property Type</td>
                      <td>Owners Name (Company)</td>
                      <td>Ownership % </td>
                      <td>Bedrooms</td>
                      <td>HMO / MUF</td>
                      <td>Size (SQM - SQF)</td>
                </tr>
            </thead>
            <tbody>
              @if($companies)
                @foreach($companies as $key => $item)
                    @php $item = (Object) $item @endphp
                    <tr>
                        <td></td>
                        <td>{{ $item->address }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$item->purchase_price}}</td>
                        <td>{{$item->purchase_date}}</td>
                        <td>{{ $item->lender_name}}</td>
                        <td>{{ $item->property_type}}</td>
                        <td>{{$item->owners_name}}</td>
                        <td>{{$item->ownership}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforeach
              @endif
            </tbody>
          </table>