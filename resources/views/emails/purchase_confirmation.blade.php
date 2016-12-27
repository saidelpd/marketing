@extends('emails.template')
@section('content')
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
        <tr>
            <td align="center" valign="top" style="padding-top:20px;">
                <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                    <tr>
                        <td align="center" valign="top">
                            <!-- // Begin Template Body \\ -->
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                <tr>
                                    <td valign="top">
                                        <!-- // Begin Module: Standard Content \\ -->
                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">

                                            <tr>
                                                <td valign="top" class="bodyContent">
                                                    <div mc:edit="std_content00" style="text-align: center">
                                                        <h3 class="h3" style="text-align: center">Ticket Purchase Confirmation</h3>
                                                        <p>Purchase ID : {{$confirmation_id}}</p>
                                                    </div>
                                                    <div mc:edit="std_content00" style="text-align: center">
                                                        @include('emails._purchase')
                                                    </div>
                                                    @if($user_password)
                                                        <div mc:edit="std_content00" style="text-align: center">
                                                        <h5 class="h5" style="text-align: center">Login Information</h5>
                                                            <table border="0" cellpadding="10" cellspacing="0" width="100%"
                                                                   class="templateDataTable">
                                                                <tr>
                                                                    <th scope="col" valign="top" width="35%"
                                                                        class="dataTableHeading"
                                                                        mc:edit="data_table_heading00">
                                                                        User Name:
                                                                    </th>
                                                                    <td  mc:repeatable valign="top" class="dataTableContent"
                                                                         mc:edit="data_table_content00">
                                                                        {{ $user->email }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col" valign="top" width="35%"
                                                                        class="dataTableHeading"
                                                                        mc:edit="data_table_heading00">
                                                                        Password:
                                                                    </th>
                                                                    <td  mc:repeatable valign="top" class="dataTableContent"
                                                                         mc:edit="data_table_content00">
                                                                        {{ $user_password }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <p class="text-info"> For more details about this purchase please <a href="{{URL::route('fantasy.login')}}"> login </a>  with the credentials provided.</p>
                                                        </div>
                                                        @else
                                                        <div mc:edit="std_content00" style="text-align: center">
                                                           <p class="text-info"> For more details about this purchase click <a href="{{URL::route('fantasy.dashboard')}}"> here </a> </p>
                                                        </div>
                                                     @endif


                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // End Module: Standard Content \\ -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // End Template Body \\ -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- // Begin Template Footer \\ -->
                            <table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
                                <tr>
                                    <td valign="top" class="footerContent">

                                        <!-- // Begin Module: Transactional Footer \\ -->
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top">
                                                    <div mc:edit="std_footer">
                                                        <em>© Fantasy Marketing LLC {{date('Y')}}.</em>
                                                        <br/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- // End Module: Transactional Footer \\ -->
                                    </td>
                                </tr>
                            </table>
                            <!-- // End Template Footer \\ -->
                        </td>
                    </tr>
                </table>
                <br/>
            </td>
        </tr>
    </table>

@endsection

