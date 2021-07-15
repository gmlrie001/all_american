<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Automated Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Gothic+A1:400,700');
    /**
     * Avoid browser level font resizing.
     * 1. Windows Mobile
     * 2. iOS / OSX
     */
     body * {
         font-family: 'Gothic A1', sans-serif;
     }
  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }
  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }
  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }
  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }
  /**
   * Fix centering issues in Android 4.4.
   */
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }
  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }
  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }
  a {
    color: #1a82e2;
  }
  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }
  </style>

</head>
    <body style="background-color: #ffffff;">
        <table width="800px">
            <tr>
                <td align="center">
                    <a  target="_blank" style="display: inline-block; padding: 50px 0;">
                        @if(empty($logo))
                            <img src="{{ asset('assets/placeholder/vault_placeholder_main_logo.svg') }}" alt="Logo" border="0" width="100">
                        @else
                            <img src="{{ asset($logo) }}" alt="Logo" border="0" width="300">
                        @endif
                    </a>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table width="700px" style="background: #255a9e;position: relative;top: 2px;">
                        <tr>
                            <td style="color: #ffffff;padding: 20px 40px;font-size: 26px;">
                                {{$title}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding-bottom: 25px;">
                    <table width="700px" style="border: 1px solid #959595; border-top: none;">
                        <tr>
                            <td style="padding: 25px;">
                                <table width="100%;">