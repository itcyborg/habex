<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Habexagro</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
            <tbody>
            <tr>
                {{--<td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="javascript:void(0)" target="_blank"><img src="{{asset('sys/plugins/images/admin-logo.png')}}" alt="Habexagro_logo" style="border:none"><br/></td>--}}
            </tr>
            </tbody>
        </table>
        <div style="padding: 40px; background: #fff;">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr>
                    <td><b>Dear {{$user->name}},</b>
                        <p>This is to inform you that, your account with Habex Agro has been created successfully.</p>
                        <p style="text-decoration: dashed underline;">Use the following information to log in:</p>
                        <p><b>Email: </b><i>{{$user->email}}</i></p>
                        <p><b>Password:</b> <i>{{$user->password}}</i></p>
                        <p><strong><i>Please change your password as soon as you login.</i></strong></p>
                        <a href="https://sys.habexagro.com/login" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #1e88e5; border-radius: 60px; text-decoration:none;"> Login </a><br>
                        <b>- Thanks (Admin team)</b><br>
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 1px dashed black;border-bottom: 1px dashed black;">
                        <p style="text-align: center"><i>This is a System generated email, in case of any issues please contact the Administrator or reply to this email.</i></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
            <p>  2018 &copy; Habex Agro designed by GTLabs <br> </p>
        </div>
    </div>
</div>
</body>
</html>
