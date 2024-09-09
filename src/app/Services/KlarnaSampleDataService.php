<?php

namespace App\Services;

/**
 * Service responsible for generating sample data for Klarna API requests.
 */
class KlarnaSampleDataService
{   
    /**
     * @var string $callback The callback URL for Klarna API.
     */
    protected string $callback;

    /**
     * KlarnaBaseService constructor.
     * Initializes the service with the Klarna API credentials.
     */
    public function __construct()
    {
        $this->callback = config('klarna.callback');
    }

    /**
     * Retrieves sample data for creating a new Klarna session.
     *
     * @return array The sample data array.
     */
    public function getSampleData(): array
    {
        $data = [
            "acquiring_channel" => "ECOMMERCE",
            "intent" => "buy",
            "purchase_country" => "SE",
            "purchase_currency" => "SEK",
            "locale" => "en-SE",
            "order_amount" => 11500,
            "order_tax_amount" => 1900,
            "order_lines" => [
              [
                "type" => "physical",
                "reference" => "19-402",
                "name" => "Battery Power Pack",
                "quantity" => 1,
                "unit_price" => 10000,
                "tax_rate" => 2500,
                "total_amount" => 9500,
                "total_discount_amount" => 500,
                "total_tax_amount" => 1900,
                "image_url" => "https://placehold.co/100",
                "product_url" => "https://www.estore.com/products/f2a8d7e34"
              ],
              [
                "type" => "shipping_fee",
                "name" => "Shipping",
                "quantity" => 1,
                "unit_price" => 2000,
                "tax_rate" => 0,
                "total_amount" => 2000,
                "total_tax_amount" => 0
              ]
            ],
            "merchant_urls" => [
                "confirmation" => $this->callback ."/confirmation",
                "redirect_url" => $this->callback ."/success",
                "authorization" => $this->callback . "/klarna-callback"
            ]
            ];

          return $data;
    }

    /**
     * Retrieves sample order data for creating a one-time payment order.
     *
     * @return array The sample order data array.
     */
    public function getSampleOrderData()
    {
        $data = [
            "purchase_country" => "SE",
            "purchase_currency" => "SEK",
            "billing_address" => [
                "given_name" => "Alice",
                "family_name" => "Test",
                "email" => "customer@email.se",
                "title" => "Mr",
                "street_address" => "Södra Blasieholmshamnen 2",
                "street_address2" => "Apt 214",
                "postal_code" => "11 148",
                "city" => "Stockholm",
                "region" => "SE",
                "phone" => "+46701740615",
                "country" => "SE"
            ],
            "shipping_address" => [
                "given_name" => "Alice",
                "family_name" => "Test",
                "email" => "customer@email.se",
                "title" => "Mr",
                "street_address" => "Södra Blasieholmshamnen 2",
                "street_address2" => "Apt 214",
                "postal_code" => "11 148",
                "city" => "Stockholm",
                "region" => "SE",
                "phone" => "+46701740615",
                "country" => "SE"
            ],
            "order_amount" => 11500,
            "order_tax_amount" => 1900,
            "order_lines" => [
                [
                    "type" => "physical",
                    "reference" => "19-402",
                    "name" => "Battery Power Pack",
                    "quantity" => 1,
                    "unit_price" => 10000,
                    "tax_rate" => 2500,
                    "total_amount" => 9500,
                    "total_discount_amount" => 500,
                    "total_tax_amount" => 1900,
                    "image_url" => "https://placehold.co/100",
                    "product_url" => "https://www.estore.com/products/f2a8d7e34"
                ],
                [
                    "type" => "shipping_fee",
                    "name" => "Shipping",
                    "quantity" => 1,
                    "unit_price" => 2000,
                    "tax_rate" => 0,
                    "total_amount" => 2000,
                    "total_tax_amount" => 0
                  ]
            ],
            "merchant_urls" => [
                "confirmation" => $this->callback ."/confirmation",
                "redirect_url" => $this->callback ."/success",
                "notification" => "https://example.com/pending"
            ],
            "merchant_reference1" => "45aa52f387871e3a210645d4",
        ];
        return $data;
    }

    /**
     * Retrieves sample recurring payment data for requesting a customer token.
     *
     * @return array The sample recurring payment data array.
     */
    public function getSampleRecurringPaymentData(): array 
    {
        $data = [
            "purchase_country"=> "US",
            "locale"=> "us-US",
            "billing_address" => [
                "given_name"=> "Doe",
                "family_name"=> "John",
                "email"=> "john@doe.com",
                "phone"=> "333444555",
                "street_address"=> "Lombard St 10",
                "postal_code"=> "90210",
                "city"=> "Beverly Hills",
                "region" => "CA",
                "country"=> "US"
            ],
            "description"=> "MySaaS subscription",
            "intended_use"=> "subscription",
            "merchant_urls"=> [
                "confirmation"=> $this->callback ."/confirmation",
            ]
            ];

        return $data;
    }

    /**
     * Retrieves sample data for updating session details.
     *
     * @return array The sample update data array.
     */
    public function getSampleUpdateData(): array 
    {
        $data = [
            "order_ammount" => 19000,
            "order_tax_ammount" => 1900,
            "order_lines" =>
                [
                    "type" => "physical",
                    "reference" => "19-402",
                    "name" => "Battery Power Pack",
                    "quantity" => 2,
                    "unit_price" => 10000,
                    "tax_rate" => 2500,
                    "total_amount" => 19000,
                    "total_discount_amount" => 1000,
                    "total_tax_amount" => 1900,
                    "image_url" => "https://placehold.co/100",
                    "product_url" => "https://www.estore.com/products/f2a8d7e34",
                ],
    ];

        return $data;
    }
}
