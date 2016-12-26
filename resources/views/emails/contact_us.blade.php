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
                                                        <h3 class="h3" style="text-align: center">We got a message from {{$name}}</h3>

                                                        <p style="text-align: center">
                                                          {{$contact_message}}
                                                        </p>

                                                    </div>
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

