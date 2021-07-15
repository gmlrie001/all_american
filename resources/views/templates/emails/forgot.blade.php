@extends('templates.emails.layouts.index')

@section('content')

  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
      Hi {{$user->name}} {{$user->surname}},
    </td>
  </tr>
  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
        There was recently a request to change the password for your account.
    </td>
  </tr>
  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
        If you requested this password change, please click on the following link to reset your password:
    </td>
  </tr>
  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
        <a style="display: block;float: left;width: 100%;word-break: break-all;" href="{{url('/').'/reset/password/'.$user->remember_token}}">{{url('/').'/reset/password/'.$user->remember_token}}</a>
    </td>
  </tr>
  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
        If clicking the link does not work, please copy and paste the URL into your browser instead.
    </td>
  </tr>
  <tr>
    <td style="font-size: 15px;line-height: 25px;color: #1f1f1f;padding-bottom: 15px;">
        If you did not make this request, you can ignore this message and your password will remain the same.
    </td>
  </tr>
@endsection