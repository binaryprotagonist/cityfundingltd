   <table>
            <thead>
                <tr>
                      <td>Address</td>
                      <td>Value</td>
                      <td>Outstanding Mortgage</td>
                      <td>Monthly Rental Income</td>
                      <td>Monthly Mortgage Payment</td>
                      <td>Purchase Prise</td>
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
                        <td>{{ $item->address }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $item->conmany_name }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforeach
              @endif
            </tbody>
          </table>