<style>
  /***
  User Profile Sidebar by

  @keenthemes

  A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
        Licensed under MIT
        ***/
  body {
    padding: 0;
    margin: 0;
  }

  html {
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
  }

  @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
    *[class="table_width_100"] {
      width: 96% !important;
    }

    *[class="border-right_mob"] {
      border-right: 1px solid #dddddd;
    }

    *[class="mob_100"] {
      width: 100% !important;
    }

    *[class="mob_center"] {
      text-align: center !important;
    }

    *[class="mob_center_bl"] {
      float: none !important;
      display: block !important;
      margin: 0px auto;
    }

    .iage_footer a {
      text-decoration: none;
      color: #929ca8;
    }

    img.mob_display_none {
      width: 0px !important;
      height: 0px !important;
      display: none !important;
    }

    img.mob_width_50 {
      width: 40% !important;
      height: auto !important;
    }
  }

  .table_width_100 {
    width: 680px;
  }
</style>

<!--
Responsive Email Template by @keenthemes
    A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
    Licensed under MIT
-->

<div id="mailsub" class="notification" align="center">

  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
    <tr>
      <td align="center" bgcolor="#eff3f8">
        <!--[if gte mso 10]>
        <table width="680" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
        <![endif]-->
        <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%"
               style="max-width: 680px; min-width: 300px;">
          <tr>
            <td><!-- padding --></td>
          </tr>
          <!--header -->
          <tr>
            <td align="center" bgcolor="#ffffff">
              <!-- padding -->
              <table width="90%" border="0" cellspacing="0" cellpadding="0">
                <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                <tr>
                  <td align="center">
                    <a href="#" target="_blank"
                       style="color: #596167; font-family: Arial, Helvetica, sans-serif; float:left; width:100%; padding:20px;text-align:center; font-size: 13px;">
                      <img src="https://erbium.ch/assets/images/logo.png" width="120" alt="Erbium" border="0"/>
                    </a>
                  </td>
                  <td align="right">
                    <div style="height: 50px; line-height: 50px; font-size: 10px;"></div>
                  </td>
                </tr>
                <!--header END-->

                <!--content 1 -->
                <tr>
                  <td align="center" bgcolor="#fbfcfd">
                    @yield("content")
                  </td>
                </tr>
                <!--content 1 END-->


                <!--footer -->
                <tr>
                  <td class="iage_footer" align="center" bgcolor="#ffffff">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
                          <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                            {!! date('Y') !!} © Erbium. ALL Rights Reserved.
                            </span>
                          </font>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <!--footer END-->
                <tr>
                  <td>&nbsp; </td>
                </tr>
              </table>
              <!--[if gte mso 10]>
              </td>
              </tr>
              </table>
              <![endif]-->
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>