<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use App\Models\EmailTemplateCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'email_template_category_id' => 5,
                'name' => 'inquiry_received',
                'subject' => 'New Inquiry Received',
                'body_html' => '<h1><span style="font-size: 18pt;">New Inquiry Received</span></h1><p>You have received a new inquiry from {{ name }}.</p><p><strong>Subject:</strong> {{ subject }}</p><p><strong>Email:</strong> {{ email }}</p><p><strong>Message:</strong> {{ description }}</p><p>Thanks</p>',
                'body_text' => '',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'email_template_category_id' => 2,
                'name' => 'user_created',
                'subject' => 'Welcome to {{ app_name }}',
                'body_html' => '<p>Hi <strong>{{ user_name }}</strong>,</p>
                    <p>Welcome to <strong>{{ app_name }}</strong>! We’re thrilled to have you on board. 🎉</p>
                    <p>If you have any questions or need assistance, feel free to reach out to us at <strong>{{ support_email }}</strong>. We’re here to help!</p>
                    <p>Let’s make great things happen together.</p>
                    <p>Thanks,<br /><strong>{{ app_name }}</strong></p>',
                'is_active' => true,
            ],
            [
                'email_template_category_id' => 2,
                'name' => 'password_reset',
                'subject' => 'Reset Your Password',
                'body_html' => '<p>Hello,</p><p>You can reset your password using the link below:</p><p style="text-align: center;"><span style="text-decoration: underline;"><strong><a href="{{ reset_url }}">Reset Password</a></strong></span></p><p>If you did not request this, please ignore this email.</p><p>Thanks</p>',
                'body_text' => 'If you are having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: {{ reset_url }}',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'email_template_category_id' => 1,
                'name' => 'order_placed',
                'subject' => 'Your Order Has Been Placed',
                'body_html' => '<table role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                        <tr>
                            <td style="padding: 0px 0px 20px 0px;" valign="top">
                                <table style="border-collapse: separate; border-spacing: 0;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td align="center" valign="top">
                                                <div class="pc-font-alt pc-w620-fontSize-32px pc-w620-lineHeight-32"
                                                    style="line-height: 100%; letter-spacing: -0.03em; font-family: \'Poppins\', Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 600; font-variant-ligatures: normal; color: #001942; text-align: center; text-align-last: center;">
                                                    <div>Thanks for the Order</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                        <tr>
                            <td style="padding: 0px 0px 20px 0px;" valign="top">
                                <table style="border-collapse: separate; border-spacing: 0;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td align="center" valign="top">
                                                <div class="pc-font-alt pc-w620-fontSize-14px pc-w620-lineHeight-140pc"
                                                    style="line-height: 140%; letter-spacing: 0px; font-family: \'Poppins\', Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; font-variant-ligatures: normal; color: #001942; text-align: center; text-align-last: center;">
                                                    <div>
                                                        <span style="letter-spacing: 0px;">
                                                            Great news! Your order <strong>{{ order_number }}</strong> is all set to hit the road.
                                                            We\'re packing it up with care and it\'ll be on its way to you in no time.
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>',
                'body_text' => '',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'email_template_category_id' => 1,
                'name' => 'order_updated',
                'subject' => 'Order Status Updated',
                'body_html' => '<h1><span style="font-size: 18pt;">Order Status Update - Order #{{ order_number }}</span></h1>
                            <p>Hello {{ customer_name }},</p>
                            <p style="text-align: left;">
                                We wanted to let you know that the status of your order (Order number: {{ order_number }}) has been updated.
                                <br /><br />
                                {{ customer_and_order_info }}
                            </p>
                            <p style="text-align: center;">
                                <br />
                                {{ view_order_button }}
                            </p>
                            <p>If you have any questions or need further assistance regarding your order, please don\'t hesitate to contact us.</p>
                            <p>&nbsp;</p>
                            <p>Thanks</p>
                        ',
                'body_text' => '',
                'locale' => 'en',
                'is_active' => true,
            ],
            [
                'email_template_category_id' => 3,
                'name' => 'stock_reminder',
                'subject' => 'Product Back in Stock',
                'body_html' => '<h1><span style="font-size: 18pt;">{{ product_name }} is Back in Stock {{ product_variation }}!!</span></h1>
                    <p>Good news! The product you\'re interested in is now available.</p>
                    <p style="text-align: center;">
                        {{ product_image }}
                    </p>
                    <p style="text-align: center;">
                        {{ view_product_button }}
                    </p>
                    <p><br />Thanks</p>',
                'body_text' => '',
                'locale' => 'en',
                'is_active' => true,
            ],
        ];

        // $categories = EmailTemplateCategory::select('id')->pluck('id')->all();

        foreach ($templates as $template) {
            // $template['email_template_category_id'] = $categories[array_rand($categories)];
            EmailTemplate::create($template);
        }
    }
}
