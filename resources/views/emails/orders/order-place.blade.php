<tr>
    <td valign="top">
    <!-- BEGIN MODULE: Hero -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
    <td class="pc-w620-spacing-0-0-0-0" style="padding: 0px 0px 0px 0px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
        <tr>
        <td valign="top" class="pc-w620-padding-24-0-0-0" style="padding: 0px 0px 0px 0px; border-radius: 0px; background-color: #ffffff;" bgcolor="#ffffff">
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <td>
            <table class="pc-width-fill pc-w620-gridCollapsed-0" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr class="pc-grid-tr-first pc-grid-tr-last">
                <td class="pc-grid-td-first pc-grid-td-last" align="center" valign="top" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;">
                <table style="border-collapse: separate; border-spacing: 0; width: 100%;" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                <td class="pc-w620-padding-40-24-40-24" align="center" valign="bottom" style="padding: 44px 44px 44px 44px; background-color: #ecf1fb; border-radius: 10px 10px 10px 10px;">
                    <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%;">
                    
                    {!! $body_html !!}

                    <tr>
                    <td align="center" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                        <th valign="top" align="center" style="text-align: center; font-weight: normal; line-height: 1;">
                        <!--[if mso]>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" align="center" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                            <tr>
                                <td valign="middle" align="center" style="border-radius: 500px 500px 500px 500px; background-color: #0067ff; text-align:center; color: #ffffff; padding: 14px 28px 14px 28px; mso-padding-left-alt: 0; margin-left:28px;" bgcolor="#0067ff">
                                                    <a class="pc-font-alt" style="display: inline-block; text-decoration: none; font-variant-ligatures: normal; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-weight: 500; font-size: 17px; line-height: 24px; text-align: center; color: #ffffff;" href="https://postcards.email/" target="_blank"><span style="display: block;"><span>Setup Notifications</span></span></a>
                                                </td>
                            </tr>
                        </table>
                        <![endif]-->
                        <!--[if !mso]><!-- -->
                        
                        @php
                            $order_statuses_color = [
                                1 => '#ffa500',  // Warning
                                2 => '#28a745',  // Success
                                3 => '#17a2b8',  // Info
                                4 => '#007bff',  // Primary
                                5 => '#dc3545',  // Danger
                                6 => '#6c757d'   // Secondary
                            ];

                            $status_color = $order_statuses_color[$order->status] ?? '#000000';
                        @endphp

                        <a style="display: inline-block; box-sizing: border-box; border-radius: 500px 500px 500px 500px; background-color: {{ $status_color }}; padding: 14px 28px 14px 28px; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-weight: 500; font-size: 17px; line-height: 24px; color: #ffffff; vertical-align: top; text-align: center; text-align-last: center; text-decoration: none; -webkit-text-size-adjust: none;"><span style="display: block;"><span>{{ config('general.order_statuses.' . $order->status) }}</span></span></a>
                        <!--<![endif]-->
                        </th>
                        </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                </td>
                </tr>
                </table>
                </td>
            </tr>
            </table>
            </td>
            </tr>
        </table>
        </td>
        </tr>
        </table>
    </td>
    </tr>
    </table>
    <!-- END MODULE: Hero -->
    </td>
</tr>