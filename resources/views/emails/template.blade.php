<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style type="text/css">
        /* Client-specific Styles */
        #outlook a {
            padding: 0;
        }

        /* Force Outlook to provide a "view in browser" button. */
        body {
            width: 100% !important;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        /* Force Hotmail to display emails at full width */
        body {
            -webkit-text-size-adjust: none;
        }

        /* Prevent Webkit platforms from changing default text sizes. */

        /* Reset Styles */
        body {
            margin: 0;
            padding: 0;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table td {
            border-collapse: collapse;
        }

        #backgroundTable {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        body, #backgroundTable {
            background-color: #FAFAFA;
        }

        #templateContainer {
            border: 1px solid #DDDDDD;
        }

        h1, .h1 {
            color: #202020;
            display: block;
            font-family: Arial;
            font-size: 34px;
            font-weight: bold;
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            text-align: left;
        }

        h2, .h2 {
            color: #202020;
            display: block;
            font-family: Arial;
            font-size: 30px;
            font-weight: bold;
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            text-align: left;
        }

        h3, .h3 {
            color: #202020;
            display: block;
            font-family: Arial;
            font-size: 26px;
            font-weight: bold;
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            text-align: left;
        }

        h4, .h4 {
            color: #202020;
            display: block;
            font-family: Arial;
            font-size: 22px;
            font-weight: bold;
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            text-align: left;
        }

        #templateHeader {
            background-color: #FFFFFF;
            border-bottom: 0;
        }

        .headerContent {
            color: #202020;
            font-family: Arial;
            font-size: 34px;
            font-weight: bold;
            line-height: 100%;
            padding: 0;
            text-align: center;
            vertical-align: middle;
        }

        .headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */
        .headerContent a .yshortcuts /* Yahoo! Mail Override */
        {
            color: #336699;
            font-weight: normal;
            text-decoration: underline;
        }

        #headerImage {
            height: auto;
            max-width: 600px !important;
        }

        #templateContainer, .bodyContent {
            background-color: #FFFFFF;
        }

        .bodyContent div {
            color: #505050;
            font-family: Arial;
            font-size: 14px;
            line-height: 150%;
            text-align: left;
        }

        .bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */
        .bodyContent div a .yshortcuts /* Yahoo! Mail Override */
        {
            color: #336699;
            font-weight: normal;
            text-decoration: underline;
        }

        .templateDataTable {
            background-color: #FFFFFF;
            border: 1px solid #DDDDDD;
        }

        .dataTableHeading {
            background-color: #D8E2EA;
            color: #336699;
            font-family: Helvetica;
            font-size: 14px;
            font-weight: bold;
            line-height: 150%;
            text-align: left;
            border-top: 1px solid #336699;
        }

        .dataTableHeading a:link, .dataTableHeading a:visited, /* Yahoo! Mail Override */
        .dataTableHeading a .yshortcuts /* Yahoo! Mail Override */
        {
            color: #FFFFFF;
            font-weight: bold;
            text-decoration: underline;
        }

        .dataTableContent {
            border-top: 1px solid #336699;
            border-bottom: 0;
            color: #202020;
            font-family: Helvetica;
            font-size: 12px;
            font-weight: bold;
            line-height: 150%;
            text-align: left;
        }

        .dataTableContent a:link, .dataTableContent a:visited, /* Yahoo! Mail Override */
        .dataTableContent a .yshortcuts /* Yahoo! Mail Override */
        {
            color: #202020;
            font-weight: bold;
            text-decoration: underline;
        }

        .templateButton {
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            background-color: #336699;
            border: 0;
            border-collapse: separate !important;
            border-radius: 3px;
        }
        .templateButton a .yshortcuts /* Yahoo! Mail Override */
        {
            color: #FFFFFF;
            font-family: Arial;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: -.5px;
            line-height: 100%;
            text-align: center;
            text-decoration: none;
        }

        .bodyContent img {
            display: inline;
            height: auto;
        }

        .footerContent div {
            color: #707070;
            font-family: Arial;
            font-size: 12px;
            line-height: 125%;
            text-align: center;
        }

        .footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */
        .footerContent div a .yshortcuts /* Yahoo! Mail Override */
        {
            color: #336699;
            font-weight: normal;
            text-decoration: underline;
        }
    </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
@yield('content')
</body>
</html>
