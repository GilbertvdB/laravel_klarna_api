<?php

return [
	/**
	 * The base URL for Klarna API endpoints
	 * Production: https://api.klarna.com
	 * Sandbox: https://api.playground.klarna.com
	 */
	'api_base_url' => env('KLARNA_API_BASE_URL', 'https://api.klarna.com'),

    /**
	 * Your Klarna username
	 */
	'username' => env('KLARNA_USERNAME'),

    /**
	 * Your Klarna password
	 */
	'password' => env('KLARNA_PASSWORD'),
    
    /**
	 * Your callback/webhook base URL for recieving Klarna requests (Authorization & Merchants urls)
	 */
	'callback' => env('KLARNA_CALLBACK', 'https://yourwebsitedomain.com'),

    /**
	 * URL for the payments endpoint
	 */
	'payments_sessions' => '/payments/v1/sessions',

    /**
	 * URL for the payments authorization endpoint
	 */
	'payments_authorizations' => '/payments/v1/authorizations/',

    /**
	 * URL for the customer token endpoint
	 */
	'customer_tokens' => '/customer-token/v1/tokens/',
];