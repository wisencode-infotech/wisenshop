<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FooterMenuSectionItem;

class FooterMenuSectionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer_menu_items = [
            [
                'name' => 'Shops',
                'url' => null,
                'slug' => '/',
                'is_external' => false,
                'is_system_built' => true,
                'footer_menu_section_id' => 1,
                'content' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deals',
                'url' => '/',
                'slug' => null,
                'is_external' => true,
                'is_system_built' => false,
                'footer_menu_section_id' => 1,
                'content' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coupon',
                'url' => null,
                'slug' => 'coupon',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 1,
                'content' => '<div class="w-full py-10 px-4">
                      <div class="max-w-5xl mx-auto bg-white p-8 shadow-md rounded-lg">
                        <h3 class="text-2xl font-semibold mb-6">Coupons & Discounts</h3>
                        <div class="space-y-6">
                          <div class="space-y-4">
                            <p class="text-gray-700">
                              Enjoy exclusive discounts on your favorite products! Check out the available coupons below, and follow the instructions to redeem them at checkout.
                            </p>
                          </div>
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">How to Use a Coupon</h4>
                            <p class="text-gray-700">
                              To apply a coupon, simply enter the coupon code at checkout in the “Coupon Code” field, and the discount will be automatically applied to your order.
                            </p>
                          </div>
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">Available Coupons</h4>
                            <div class="p-4 border border-gray-200 rounded-lg shadow-sm">
                              <h5 class="text-lg font-medium mb-2">10% Off on Orders Over $50</h5>
                              <p class="text-gray-700 mb-2">Use code: <span class="text-blue-600 font-semibold">SAVE10</span></p>
                              <p class="text-gray-600 text-sm">Valid until: December 31, 2024</p>
                            </div>
                            <div class="p-4 border border-gray-200 rounded-lg shadow-sm">
                              <h5 class="text-lg font-medium mb-2">Free Shipping on Orders Over $75</h5>
                              <p class="text-gray-700 mb-2">Use code: <span class="text-blue-600 font-semibold">FREESHIP75</span></p>
                              <p class="text-gray-600 text-sm">Valid until: November 30, 2024</p>
                            </div>
                            <div class="p-4 border border-gray-200 rounded-lg shadow-sm">
                              <h5 class="text-lg font-medium mb-2">Buy One, Get One 50% Off</h5>
                              <p class="text-gray-700 mb-2">Use code: <span class="text-blue-600 font-semibold">BOGO50</span></p>
                              <p class="text-gray-600 text-sm">Valid until: October 31, 2024</p>
                            </div>
                          </div>
                          <div class="space-y-4 mt-8">
                            <h4 class="text-xl font-medium mb-2">Terms & Conditions</h4>
                            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                              <li>Coupons are valid only for specified dates and cannot be combined with other promotions.</li>
                              <li>Each coupon can be used once per customer.</li>
                              <li>Discounts do not apply to gift cards or other excluded items.</li>
                              <li>If you have any questions, please contact our support team at <a href="mailto:support@yourecommerce.com" class="text-blue-500 underline">support@yourecommerce.com</a>.</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ & Helps',
                'url' => null,
                'slug' => 'faq-help',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 2,
                'content' => '<div class="w-full py-10 px-4">
                        <div class="max-w-5xl mx-auto bg-white p-8 shadow-md rounded-lg">
                        <h3 class="text-2xl font-semibold mb-6">Frequently Asked Questions &amp; Help</h3>
                        <div class="space-y-6">
                        <div class="space-y-4">
                        <h4 class="text-xl font-medium mb-2">Frequently Asked Questions</h4>
                        <div>
                        <h5 class="text-lg font-medium">Q1: How do I place an order?</h5>
                        <p class="text-gray-700">To place an order, browse our products, add items to your cart, and proceed to checkout. You&rsquo;ll be prompted to provide shipping and payment information to complete your purchase.</p>
                        </div>
                        <div>
                        <h5 class="text-lg font-medium">Q2: What payment methods do you accept?</h5>
                        <p class="text-gray-700">We accept major credit cards, PayPal, and other secure payment options. All transactions are processed securely.</p>
                        </div>
                        <div>
                        <h5 class="text-lg font-medium">Q3: Can I track my order?</h5>
                        <p class="text-gray-700">Yes, once your order is shipped, you&rsquo;ll receive a tracking number via email. Use this number to track your order&rsquo;s delivery status.</p>
                        </div>
                        <div>
                        <h5 class="text-lg font-medium">Q4: What is your return policy?</h5>
                        <p class="text-gray-700">If you&rsquo;re not satisfied with your purchase, you can return the item within 30 days of receipt. Please refer to our <a class="text-blue-500 underline" href="#">Return Policy</a> for detailed instructions.</p>
                        </div>
                        <div>
                        <h5 class="text-lg font-medium">Q5: Do you offer international shipping?</h5>
                        <p class="text-gray-700">Yes, we offer worldwide shipping. Please note that international orders may have additional shipping fees and customs charges.</p>
                        </div>
                        </div>
                        <div class="mt-8">
                        <h4 class="text-xl font-medium mb-2">Need Further Assistance?</h4>
                        <p class="text-gray-700 mb-4">If you need more help, our customer support team is here to assist you with any issues or questions.</p>
                        <p class="text-gray-700 mb-2">Contact us at <a class="text-blue-500 underline" href="mailto:support@yourecommerce.com">support@yourecommerce.com</a> or call us at <strong>1-800-123-4567</strong>.</p>
                        <p class="text-gray-700">For quick answers, visit our <a class="text-blue-500 underline" href="#">Help Center</a> or browse our <a class="text-blue-500 underline" href="#">Support Articles</a> for step-by-step guides on shopping, returns, and more.</p>
                        </div>
                        </div>
                        </div>
                        </div>',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer Refund Policies',
                'url' => null,
                'slug' => 'customer-refund-policy',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 2,
                'content' => '<div class="w-full py-10 px-4">
                          <div class="max-w-5xl mx-auto bg-white p-8 shadow-md rounded-lg">
                            <h3 class="text-2xl font-semibold mb-6">Customer Refund Policy</h3>
                            
                            <div class="space-y-6">
                              <div class="space-y-4">
                                <p class="text-gray-700">
                                  We are committed to ensuring our customers are satisfied with their purchases. Our Customer Refund Policy outlines the terms and conditions under which refunds may be provided. Please read this policy carefully before making a purchase.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">1. Refund Eligibility</h4>
                                <p class="text-gray-700">
                                  To be eligible for a refund, items must be returned within 30 days of purchase, unused and in their original packaging. Proof of purchase, such as a receipt or order number, is required for all refunds.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">2. Non-Refundable Items</h4>
                                <p class="text-gray-700">
                                  Certain items are not eligible for refunds, including gift cards, downloadable software, and any items marked as final sale. Personalized or custom-made products are also non-refundable unless they arrive damaged or defective.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">3. Return Process</h4>
                                <p class="text-gray-700">
                                  To initiate a return, please contact our support team at <a href="mailto:support@yourecommerce.com" class="text-blue-500 underline">support@yourecommerce.com</a>. Once your return is approved, you will receive instructions on how to ship your item back to us.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">4. Refund Processing Time</h4>
                                <p class="text-gray-700">
                                  Refunds are processed within 5–7 business days after we receive and inspect the returned item. The refund will be applied to your original payment method, and you will be notified via email once the refund is completed.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">5. Exchanges</h4>
                                <p class="text-gray-700">
                                  If you received a defective or damaged item, we are happy to exchange it. Please contact our support team to arrange an exchange for the same product, subject to availability.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">6. Shipping Costs</h4>
                                <p class="text-gray-700">
                                  Shipping costs for returned items are the responsibility of the customer, unless the return is due to a damaged or incorrect item received. Original shipping fees are non-refundable.
                                </p>
                              </div>

                              <div class="space-y-4">
                                <h4 class="text-xl font-medium mb-2">7. Contact Us</h4>
                                <p class="text-gray-700">
                                  For any questions about our refund policy, please reach out to our customer support team at <a href="mailto:support@yourecommerce.com" class="text-blue-500 underline">support@yourecommerce.com</a> or call <strong>1-800-123-4567</strong>.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        ',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Privacy policies',
                'url' => null,
                'slug' => 'privacy-policy',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 3,
                'content' => '<div class="w-full py-10 px-4">
                      <div class="max-w-5xl mx-auto bg-white p-8 shadow-md rounded-lg">
                        <h3 class="text-2xl font-semibold mb-6">Privacy Policy</h3>
                        
                        <div class="space-y-6">
                          <div class="space-y-4">
                            <p class="text-gray-700">
                              Welcome to our Privacy Policy page. Your privacy is of utmost importance to us. This policy explains how we collect, use, disclose, and safeguard your information when you visit our website.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">1. Information We Collect</h4>
                            <p class="text-gray-700">
                              We may collect information about you in a variety of ways, including your name, email address, phone number, and payment information. We also collect non-personal information such as browser type and device ID to enhance your experience.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">2. How We Use Your Information</h4>
                            <p class="text-gray-700">
                              We use your information to process transactions, improve our website, send promotional offers, and for customer support. We may also use your data to enhance our security and fraud prevention efforts.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">3. Sharing Your Information</h4>
                            <p class="text-gray-700">
                              We do not sell or rent your personal information. We may share information with third-party service providers who perform services on our behalf, such as payment processing, analytics, or customer service. These parties are obligated to keep your information secure.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">4. Cookies and Tracking Technologies</h4>
                            <p class="text-gray-700">
                              Our website uses cookies to collect information about your preferences and enhance your browsing experience. You can disable cookies in your browser settings, but note that doing so may limit certain functionalities on our site.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">5. Security of Your Information</h4>
                            <p class="text-gray-700">
                              We use administrative, technical, and physical safeguards to protect your information. While we take reasonable steps to secure your data, please be aware that no security measures are entirely foolproof.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">6. Changes to This Privacy Policy</h4>
                            <p class="text-gray-700">
                              We may update our Privacy Policy periodically to reflect changes in our practices. We encourage you to review this page frequently for any updates. Your continued use of our website following any changes indicates your acceptance of the new policy.
                            </p>
                          </div>
                          
                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">7. Contact Us</h4>
                            <p class="text-gray-700">
                              If you have any questions or concerns about this Privacy Policy, please contact us at <a href="mailto:privacy@yourecommerce.com" class="text-blue-500 underline">privacy@yourecommerce.com</a> or call <strong>1-800-123-4567</strong>.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    ',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Terms & conditions',
                'url' => null,
                'slug' => 'term-condition',
                'is_external' => false,
                'is_system_built' => false,
                'footer_menu_section_id' => 3,
                'content' => '<div class="w-full py-10 px-4">
                      <div class="max-w-5xl mx-auto bg-white p-8 shadow-md rounded-lg">
                        <h3 class="text-2xl font-semibold mb-6">Terms and Conditions</h3>
                        
                        <div class="space-y-6">
                          <div class="space-y-4">
                            <p class="text-gray-700">
                              Welcome to our Terms and Conditions page. These terms outline the rules and regulations for using our website. By accessing or using this site, you agree to comply with and be bound by these terms. Please read them carefully.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">1. User Accounts</h4>
                            <p class="text-gray-700">
                              You may be required to create an account to access certain features of our website. You agree to provide accurate information and keep your account credentials secure. We are not responsible for any unauthorized access to your account.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">2. Prohibited Activities</h4>
                            <p class="text-gray-700">
                              You agree not to engage in any activities that may harm our website or other users, including but not limited to hacking, spamming, or violating the rights of others. We reserve the right to suspend or terminate access for any violations.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">3. Intellectual Property</h4>
                            <p class="text-gray-700">
                              All content on this site, including text, images, and logos, is the property of our company or licensed to us. You may not use, copy, or distribute any content without prior written permission.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">4. Limitation of Liability</h4>
                            <p class="text-gray-700">
                              We are not liable for any damages resulting from the use or inability to use our website, including indirect or incidental damages. We provide all content and services “as is” without any warranties.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">5. Governing Law</h4>
                            <p class="text-gray-700">
                              These terms are governed by the laws of the jurisdiction in which our company operates. Any disputes arising from these terms will be resolved in accordance with these laws.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">6. Changes to Terms</h4>
                            <p class="text-gray-700">
                              We may update these Terms and Conditions at any time. We encourage you to review this page periodically. Continued use of our website after any changes indicates acceptance of the updated terms.
                            </p>
                          </div>

                          <div class="space-y-4">
                            <h4 class="text-xl font-medium mb-2">7. Contact Us</h4>
                            <p class="text-gray-700">
                              If you have any questions regarding our Terms and Conditions, please contact us at <a href="mailto:terms@yourecommerce.com" class="text-blue-500 underline">terms@yourecommerce.com</a> or call <strong>1-800-123-4567</strong>.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    ',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contact Us',
                'url' => null,
                'slug' => 'contact-us',
                'is_external' => false,
                'is_system_built' => true,
                'footer_menu_section_id' => 3,
                'content' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        FooterMenuSectionItem::insert($footer_menu_items);
    }
}
