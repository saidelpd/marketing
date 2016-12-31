<h5 class="h5" style="text-align: center">Ticket(s) Information</h5>
@if(count($tickets))
<table border="0" cellpadding="10" cellspacing="0" width="100%" >
        <tr>
            <th>Quantity:</th>
            <td >
                  {{count($tickets)}}
            </td>
        </tr>
        <tr>
            <th>
                 Your Ticket(s):
            </th>
            <td>
                @foreach($tickets as $ticket)
                {{ $ticket->ticket_number }} <br>
                @endforeach
            </td>
        </tr>
</table>
@endif


