<tr>
    <td valign="top">
    <!-- BEGIN MODULE: Order Summary -->
    <table style="margin-top: 20px;" width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
    <td class="pc-w620-spacing-0-0-0-0" style="padding: 0px 0px 0px 0px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
        <tr>
        <td valign="top" class="pc-w620-radius-10-10-10-10 pc-w620-padding-32-24-32-24" style="padding: 40px 24px 40px 24px; border-radius: 20px 20px 20px 20px; background-color: #ecf1fb;" bgcolor="#ecf1fb">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <td class="pc-w620-spacing-0-0-0-0" align="center" valign="top" style="padding: 0px 0px 8px 0px;">
            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
            <tr>
                <td valign="top" class="pc-w620-padding-0-0-0-0" align="center">
                <div class="pc-font-alt pc-w620-fontSize-24px pc-w620-lineHeight-40" style="line-height: 100%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 24px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: center; text-align-last: center;">
                <div><span>Your item in this order</span>
                </div>
                </div>
                </td>
            </tr>
            </table>
            </td>
            </tr>
        </table>

        
        <table style="margin-top:10px;" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <td style="padding: 0px 0px 4px 0px; ">
            <table class="pc-w620-tableCollapsed-0" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#FFFFFF" style="border-collapse: separate; border-spacing: 0; width: 100%; background-color:#FFFFFF; border-radius: 10px 10px 10px 10px; overflow: hidden;">
            <tbody>
            @php $subtotal = 0; $total = 0; @endphp

            @foreach($order->products as $index => $product)

            @php
                $price = $product->pivot->price;
                $quantity = $product->pivot->quantity;
            @endphp   
                <tr>
                <td align="left" valign="top" style="padding: 16px 0px 8px 16px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td valign="top">
                        <table class="" border="0" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                        <th valign="top" style="font-weight: normal; text-align: left;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                            <td class="pc-w620-spacing-0-16-20-0" valign="top" style="padding: 0px 20px 0px 0px;">
                            <img src="{{ $product->display_image_url }}" class="pc-w620-width-64 pc-w620-height-64 pc-w620-width-64-min" width="100" height="104" alt="" style="display: block; outline: 0; line-height: 100%; -ms-interpolation-mode: bicubic; width: 100px; height: 104px; border: 0;" />
                            </td>
                            </tr>
                        </table>
                        </th>
                        <th valign="top" style="font-weight: normal; text-align: left;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                            <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td valign="top">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                <th align="left" valign="top" style="font-weight: normal; text-align: left; padding: 0px 0px 4px 0px;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                                    <tr>
                                    <td valign="top" align="left" style="padding: 9px 0px 0px 0px;">
                                    <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-26" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                                        <div><span>{{ $product->name }}</span>
                                        </div>
                                    </div>
                                    </td>
                                    </tr>
                                    </table>
                                </th>
                                </tr>
                                
                                <tr>
                                <th align="left" valign="top" style="font-weight: normal; text-align: left;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                                    <tr>
                                    <td valign="top" align="left">
                                    <div class="pc-font-alt" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; font-variant-ligatures: normal; color: #53627a; text-align: left; text-align-last: left;">
                                        <div><span>Qty: {{ $quantity }}</span>
                                        </div>
                                    </div>
                                    </td>
                                    </tr>
                                    </table>
                                </th>
                                </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                            </td>
                            </tr>
                        </table>
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
                <td align="right" valign="top" style="padding: 24px 16px 24px 16px;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                <tr>
                    <td valign="top" align="right">
                    <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-20" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: right; text-align-last: right;">
                    <div><span style="color: #001942;">{{ $currency->symbol }}{{ $price * $quantity }}</span>
                    </div>
                    </div>
                    </td>
                </tr>
                </table>
                </td>
                </tr>
            @php $subtotal += $price * $quantity; @endphp
            @php $total += $price * $quantity; @endphp
            @endforeach
            </tbody>
            </table>
            </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="display: none;">
            <tr>
            <td style="padding: 0px 0px 4px 0px; ">
            <table class="pc-w620-tableCollapsed-0" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#ffffff" style="border-collapse: separate; border-spacing: 0; width: 100%; background-color:#ffffff; border-radius: 10px 10px 10px 10px; overflow: hidden;">
            <tbody>
                <tr>
                <td align="left" valign="middle" style="padding: 16px 0px 16px 16px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="left" valign="top" style="padding: 0px 0px 0px 0px;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                    <tr>
                    <td valign="top" align="left" style="padding: 0px 0px 0px 0px;">
                        <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-26" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                        <div><span>Subtotal</span>
                        </div>
                        </div>
                    </td>
                    </tr>
                    </table>
                    </td>
                </tr>
                </table>
                </td>
                <td align="right" valign="middle" style="padding: 16px 16px 16px 16px;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                <tr>
                    <td valign="top" align="right">
                    <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-20" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: right; text-align-last: right;">
                    <div><span>{{ $currency->symbol }}{{ number_format($subtotal, 2) }}</span>
                    </div>
                    </div>
                    </td>
                </tr>
                </table>
                </td>
                </tr>
                <tr>
                <td align="left" valign="middle" style="padding: 16px 0px 16px 16px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="left" valign="top" style="padding: 0px 0px 0px 0px;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                    <tr>
                    <td valign="top" align="left" style="padding: 0px 0px 0px 0px;">
                        <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-26" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                        <div><span>Delivery Charges</span>
                        </div>
                        </div>
                    </td>
                    </tr>
                    </table>
                    </td>
                </tr>
                </table>
                </td>
                <td align="right" valign="middle" style="padding: 16px 16px 16px 16px;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                <tr>
                    <td valign="top" align="right">
                    <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-20" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: right; text-align-last: right;">
                    <div><span>{{ $currency->symbol }} 0</span>
                    </div>
                    </div>
                    </td>
                </tr>
                </table>
                </td>
                </tr>
            </tbody>
            </table>
            </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <td style="padding: 0px 0px 32px 0px; ">
            <table class="pc-w620-tableCollapsed-0" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#ffffff" style="border-collapse: separate; border-spacing: 0; width: 100%; background-color:#ffffff; border-radius: 10px 10px 10px 10px; overflow: hidden;">
            <tbody>
                <tr>
                <td bgcolor="transparent" width="377" valign="middle" style="background-color: transparent;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td style="padding: 16px 0px 16px 16px;" align="left">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td align="left" valign="top" style="padding: 0px 0px 0px 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                        <tr>
                        <td valign="top" align="left" style="padding: 0px 0px 0px 0px;">
                        <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-26" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                            <div><span>Total</span>
                            </div>
                        </div>
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
                <td align="right" valign="middle" style="padding: 16px 16px 16px 16px;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0; margin-right: auto; margin-left: auto;">
                <tr>
                    <td valign="top" align="right">
                    <div class="pc-font-alt pc-w620-fontSize-16 pc-w620-lineHeight-20" style="line-height: 140%; letter-spacing: -0.03em; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: right; text-align-last: right;">
                    <div><span>{{ $currency->symbol }} {{ number_format($total, 2) }}</span>
                    </div>
                    </div>
                    </td>
                </tr>
                </table>
                </td>
                </tr>
            </tbody>
            </table>
            </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <td style="padding: 0px 0px 0px 0px;">
            <table class="pc-width-fill pc-w620-gridCollapsed-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
            <tr class="pc-grid-tr-first pc-grid-tr-last">
            @if(!empty($order->address->shipping_address_id))
                <td class="pc-grid-td-first pc-w620-itemsSpacings-0-30" align="left" valign="top" style="width: 50%; padding-top: 0px; padding-right: 20px; padding-bottom: 0px; padding-left: 0px;">
                <table style="border-collapse: separate; border-spacing: 0; width: 100%;" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                <td align="left" valign="top">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%;">
                    <tr>
                    <td align="left" valign="top">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                        <td class="pc-w620-spacing-0-0-14-0" valign="top" style="padding: 0px 0px 14px 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0;">
                        <tr>
                            <td valign="top" class="pc-w620-padding-0-0-0-0" align="left">
                            <div class="pc-font-alt" style="line-height: 140%; letter-spacing: -0.2px; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                            <div><span>Shipping Address</span>
                            </div>
                            </div>
                            </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td align="left" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%;">
                        <tr>
                        <td class="pc-w620-spacing-0-0-14-0" valign="top" style="padding: 0px 0px 14px 0px;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin-right: auto;">
                        <tr>
                            <td height="1" valign="top" style="line-height: 1px; font-size: 1px; border-bottom: 1px solid #cecece;">&nbsp;</td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td align="left" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" align="left" style="border-collapse: separate; border-spacing: 0;">
                        <tr>
                        <td valign="top" align="left">
                        <div class="pc-font-alt" style="line-height: 140%; letter-spacing: 0px; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                        <div><span>{{ $order->address->shippingAddress->address }}</br>{{ $order->address->shippingAddress->city }}</br>{{ $order->address->shippingAddress->state }},  {{ $order->address->shippingAddress->postal_code }}</br>{{ $order->address->shippingAddress->country }}</span>
                        </div>
                        </div>
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
            @endif

            @if(!empty($order->address->billing_address_id))

            <td class="pc-grid-td-last pc-w620-itemsSpacings-0-30" align="left" valign="top" style="width: 50%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 20px;">
                <table style="border-collapse: separate; border-spacing: 0; width: 100%;" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                <td align="left" valign="top">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%;">
                    <tr>
                    <td align="left" valign="top">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                        <td class="pc-w620-spacing-0-0-14-0" valign="top" style="padding: 0px 0px 14px 0px;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0;">
                        <tr>
                            <td valign="top" class="pc-w620-padding-0-0-0-0" align="left">
                            <div class="pc-font-alt" style="line-height: 140%; letter-spacing: -0.2px; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                            <div><span>Billing Address</span>
                            </div>
                            </div>
                            </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td align="left" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%;">
                        <tr>
                        <td class="pc-w620-spacing-0-0-14-0" valign="top" style="padding: 0px 0px 14px 0px;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin-right: auto;">
                        <tr>
                            <td height="1" valign="top" style="line-height: 1px; font-size: 1px; border-bottom: 1px solid #cecece;">&nbsp;</td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td align="left" valign="top">
                    <table class="pc-w620-width-auto" align="left" border="0" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                        <td valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="border-collapse: separate; border-spacing: 0;">
                        <tr>
                            <td valign="top" class="pc-w620-textAlign-left" align="left">
                            <div class="pc-font-alt pc-w620-textAlign-left" style="line-height: 140%; letter-spacing: 0px; font-family: 'Poppins', Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: left; text-align-last: left;">
                            <div><span>{{ $order->address->billingAddress->address }}<br/>{{ $order->address->billingAddress->city }}<br/>{{ $order->address->billingAddress->state }},  {{ $order->address->billingAddress->postal_code }}</br>{{ $order->address->billingAddress->country }}</span>
                            </div>
                            </div>
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
            @endif

            
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
    <!-- END MODULE: Order Summary -->
    </td>
    </tr>