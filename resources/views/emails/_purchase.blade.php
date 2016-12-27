<h5 class="h5" style="text-align: center">Ticket(s) Information</h5>
@if(count($tickets))
<table border="0" cellpadding="10" cellspacing="0" width="100%" class="templateDataTable">

        <tr>
            <th scope="col" valign="top" width="35%"
                class="dataTableHeading"
                mc:edit="data_table_heading00">
                    Quantity:
            </th>
            <td  mc:repeatable valign="top" class="dataTableContent"
                 mc:edit="data_table_content00">
                  {{count($tickets)}}
            </td>
        </tr>
        <tr>
            <th scope="col" valign="top" width="35%"
                class="dataTableHeading"
                mc:edit="data_table_heading00">
                 Your Ticket(s):
            </th>
            <td  mc:repeatable valign="top" class="dataTableContent"
                 mc:edit="data_table_content00">
                @foreach($tickets as $ticket)
                {{ $ticket->ticket_number }} <br>
                @endforeach
            </td>
        </tr>

</table>

@endif


