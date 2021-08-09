<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Confirmación de correo</title>
    <style type="text/css">
        body {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
        }

        .tableContent img {
            border: 0 !important;
            display: inline-block !important;
            outline: none !important;
        }

        p, h1, h2, h3, ul, ol, li, div {
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            font-weight: normal;
            background: transparent !important;
            border: none !important;
        }

        td, table {
            vertical-align: top;
        }

        td.middle {
            vertical-align: middle;
        }

        a {
            text-decoration: none;
        }

        a.link1 {
            font-size: 16px;
            color: #a5a5a5;
        }

        a.link2 {
            font-size: 18px;
            font-weight: bold;
            color: #000000;
            text-decoration: underline;
        }

        a.link3 {
            font-size: 15px;
            font-weight: bold;
            color: #ffffff;
            background-color: #00b6e9;
            padding: 11px 15px;
            text-decoration: none;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            text-align: center;
            display: inline-block;
        }

        .contentEditable li {

        }

        .igp-text-color {
            color: #454545;
        }

        .igp-bg-color {
            background-color: #00B6E9;
        }

        .igp-button {
            background-color: #009fcb;
            border-radius: 2px;
            color: #ffffff;
            padding: 8px 20px;
        }

        .igp-reserved-link {
            text-decoration: none;
            border-bottom: 1px solid #757575;
            color: #757575;
            font-weight: bolder;
        }

        .igp-ul {

        }

        .igp-ul > li {
            color: #454545;
            padding: 3px 0;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #000000;
            line-height: 150%;
        }

        h2 {
            font-size: 18px;
            font-weight: bold;
            color: #000000;
            line-height: 150%;
            height: 60px;
        }

        p {
            font-size: 16px;
            color: #000000;
            line-height: 150%;
            text-align: left;
        }

        .bgItem {
            background: #ffffff;
        }

        .bgBody {
            background: #dcdcdc52;
        }
    </style>

    <script type="colorScheme" class="swatch active">
        {
            "name":"Default",
            "bgBody":"3f4040",
            "link":"555555",
            "color":"000000",
            "bgItem":"ffffff",
            "title":"000000"
        }

    </script>

</head>


<body paddingwidth="0" paddingheight="0" class='bgBody'
      style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;"
      offset="0" toppadding="0" leftpadding="0">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center"
       style='font-family:Helvetica, sans-serif;'>


    <tr>
        <td align='center' class='movableContentContainer'>

            <!-- =============== START HEADER =============== -->

            <div class='movableContent'>
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height='20'></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="contentEditableContainer contentImageEditable">
                                <div class="contentEditable">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td height='10' bgcolor="00B6E9"></td>
                    </tr>
                </table>
            </div>

            <!-- =============== END HEADER =============== -->
            <!-- =============== START BODY =============== -->


            <div class='movableContent'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <!--<tr><td height='20'></td></tr>-->
                    <tr>
                        <td>
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class='bgItem'
                                   style='border-radius:0 0 3px 3px ;'>
                                <tr>
                                    <td colspan="5" height='30'></td>
                                </tr>
                                <tr>
                                    <td width='20'></td>

                                    <td width='15'></td>
                                    <td width='395'>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="contentEditable">
                                                <h2 style="height: 35px; text-align: center;" class="igp-text-color">
                                                    Bienvenido {{ $user->name }}
                                                </h2>

                                                <p>&nbsp;</p>

                                                <p class="igp-text-color">
                                                    Tu correo registrado es {{ $user->email }}. Por favor hacer click en el enlace de abajo para verificar
                                                    tu cuenta.
                                                </p>

                                                <p>&nbsp;</p>

                                                <p style='text-align: right;'>
                                                    <a target="_blank" href="{{ route('account.verify', $user->verifiable_token) }}"
                                                       class="igp-button" style="color: #ffffff !important;">Verificar cuenta</a>
                                                </p>

                                            </div>
                                        </div>
                                    </td>
                                    <td width='20'></td>
                                </tr>
                                <tr>
                                    <td colspan="5" height='30'></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>


            <!-- =============== END BODY =============== -->
            <!-- =============== START FOOTER =============== -->

            <div class='movableContent'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height='20'></td>
                    </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class='bgItem'>
                    <tr>
                        <td height='10' bgcolor="00B6E9"></td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </table>
            </div>

            <div class='movableContent'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class='bgItem'>
                    <tr>
                        <td style="background-color: #00b0e1">
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td height='20'></td>
                                </tr>
                                <tr>
                                    <td align='center'>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="contentEditable">
                                                <p style='color:white;text-align:center;font-size:12px;line-height:19px;'>
                                                    Instituto Geofísico del Perú - IGP <br>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height='20'></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- =============== END FOOTER =============== -->

        </td>
    </tr>
</table>

</body>
</html>
