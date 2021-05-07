
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>MDC Policy</title>
  <link rel="icon" type="image/x-icon" href="{{ env('APP_URL') }}/public/favicon_io/icon.png"  />
  <style type="text/css">
    @font-face {
      font-family: apercu-pro;
      font-style: normal;
      font-weight: 400;
      src: local("apercu-pro"), url(https://font.typeform.com/dist/fonts/ApercuPro-Regular.woff2) format("woff")
    }

    body {
      font-family: Arial, Helvetica, sans-serif
    }

    p {
      margin-bottom: 1em
    }

    @media all and (max-width: 500px) {
      .hide_on_mobile {
        display: none !important
      }

      .show_on_mobile {
        display: block !important;
        margin: auto !important;
        float: left !important
      }

      .fullwidth {
        width: 100% !important;
        height: auto !important;
        min-width: 100% !important;
        float: none !important
      }

      .padded {
        box-sizing: border-box;
        padding-left: 20px !important;
        padding-right: 20px !important
      }

      .content {
        padding: 0 !important
      }

      .noborders {
        padding: 0 !important
      }

      .reduce {
        padding: 30px 0 0 0 !important
      }

      .article {
        margin-left: 0 !important
      }

      .padded {
        padding-left: 20px !important;
        padding-right: 20px !important
      }

      .boxpad {
        padding-top: 20px !important
      }
    }

    @media screen {
      .avenir, .webfont1 {
        font-family: apercu-pro, sans-serif !important
      }
    }
  </style>

</head>
<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#FFFFFF"
      style="margin:0;padding:0;font-family:Arial,Helvetica,sans-serif;-webkit-text-size-adjust:none">
<div style="display:none;font-size:1px;color:#FFFFFF;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden">Yep, it's yet another email about GDPR. We know, you're super excited. But don't worry, we've done some pretty extensive research on the subject so you're in good hands...
</div>
<a href="{{ route('edit.policy') }}" type="button" class="btn  float-right bg-navy"><i class="fa fa-edit"></i></a>
<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#FFFFFF" class="fullwidth">
  <tr>
    <td>
      <table border="0" cellpadding="0" cellspacing="0" width="800" class="fullwidth" align="center"
             style="margin:auto">
        <tr>
          <td>

            <table border="0" cellpadding="0" cellspacing="0" width="800" class="fullwidth">
              <tr>
                <td style="padding:0 30px 50px 30px" class="content">

                  <!-- header -->
                  <table border="0" cellpadding="0" cellspacing="0" width="640" class="fullwidth" align="center"
                         style="margin:auto">
                    <tr>
                      <td style="padding:30px 0 10px 0" class="padded">
                        <a href="https://www.typeform.com?utm_source=autopilot&utm_medium=email&utm_campaign=gdpr&utm_content=logo"
                           style="color:#e4b83a;text-decoration:none;display:block;float:left" id="logo">
                            <img src="http://webapps.iqlance-demo.com/mdc/public/favicon_io/android-chrome-512x512.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 22%;margin-left: 50%;">
                          <!--[if !mso]><!-- --><img
                                  src="https://s3.amazonaws.com/typeform-marketing-images/Logo_Mobile.png"
                                  class="show_on_mobile" width="60" style="display:none"><!--<![endif]--></a>
                      </td>
                    </tr>
                  </table>
                  <!-- end header ->
          <!-- body -->
                  <table border="0" cellpadding="0" cellspacing="0" width="740" class="fullwidth" align="center"
                         style="margin:auto">
                    <tr>
                      <td style="padding:20px 80px 0px 80px;font-family:sans-serif;font-size:16px;line-height:167%;font-weight:400;color:#343333" class="avenir padded" ap:edit="body">
                        <p><b>{{ $data->title }}</b></p>

                       
                       <p>{!! $data->description !!} </p>
                      </td>
                    </tr>
                  </table>
                  <!-- end body -->
                  <!-- START RULE -->
                  <table border="0" cellpadding="0" cellspacing="0" width="600" class="fullwidth" align="center"
                         style="margin:auto">
                    <tr>
                      <td style="padding:20px;border-bottom:1px solid #959ea5"></td>
                    </tr>
                  </table>
                  <!-- END RULE -->
                  <!-- START FOOTER (LIGHT BG) -->
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    
                    <tr>
                      <td style="padding:50px 0;text-align:center">
                        <!-- social icons -->
                        <a href="https://www.facebook.com/"><img
                                src="https://s3.amazonaws.com/typeform-marketing-images/Facebook30.png" width="30"
                                alt="fb" style="padding:0 5px"></a>&nbsp;
                        <a href="https://twitter.com/"><img
                                src="https://s3.amazonaws.com/typeform-marketing-images/Twitter30.png" width="30"
                                alt="tw" style="padding:0 5px"></a>&nbsp;
                        <a href="https://www.instagram.com/"><img
                                src="https://s3.amazonaws.com/typeform-marketing-images/Instagram30.png" width="30"
                                alt="in" style="padding:0 5px"></a>&nbsp;
                        <a href="https://www.youtube.com/"><img
                                src="https://s3.amazonaws.com/typeform-marketing-images/Youtube30.png" width="30"
                                alt="yt" style="padding:0 5px"></a>&nbsp;
                        <a href="https://www.linkedin.com/"><img
                                src="https://s3.amazonaws.com/typeform-marketing-images/Linkedin30.png" width="30"
                                alt="li" style="padding:0 5px"></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- tagline -->
                        <table border="0" cellpadding="0" cellspacing="0" align="center" style="margin:auto">
                          <tr>
                            <td height="30" style="padding:0 5px 0 0"><img
                                    src="https://s3.amazonaws.com/typeform-marketing-images/map+map+map.png" width="12">
                            </td>
                            <td style="font-weight:400;font-size:14px;color:#343333" class="webfont1" valign="middle">
                              With love, from <img src="http://128.199.31.19/mdc/public/favicon_io/icon.png" > MDC
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    
                  </table>
                  <!-- END FOOTER (LIGHT BG) -->

                </td>
              </tr>
            </table>

          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>

