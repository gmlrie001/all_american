@extends('templates.emails.layouts.index')

@section('content')

<tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
      Hi {{$user->name}},
    </td>
  </tr>

  <tr>
    <td style="padding-bottom: 20px;">
      <table width="80%">
        <tr>
          <td style="font-size: 15px;line-height: 15px;color: #1f1f1f;background: #cccccc;padding: 15px;">
            <strong>You have registered on the site with:</strong><br><br>
            {{$user->email}}<br>
            (this is your username)<br><br>
            Your password is as entered when registering on our website.<br>
          </td>
        </tr>
        </table>
    </td>
  </tr>
  
  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
      View <a style="text-decoration: underline;color: #255a9e;" href="{{url('/')}}">Your Account</a> to update your personal details.
    </td>
  </tr>

  <tr>
      <td align="center">
          <table width="400px">
            <tr>
              <td>
                <a style="text-align: center;display: block;background: #255a9e;text-decoration: none;color: #ffffff;font-weight: 700;padding: 15px;margin-bottom: 45px;margin-top: 45px;" href="{{url('/')}}">SHOP NOW</a>
              </td>
            </tr>
          </table>
      </td>
    </tr>

@endsection