<?php

namespace App\Services;

class KlarnaPaymentService extends KlarnaBaseService
{   
    /**
	 * @var array,string
	 */
    private $sampleDataService;
    private $paymentsSessionsUrl;
    private $paymentsAuthorizationsUrl;
    private $customerTokensUrl;

    /**
     * KlarnaPaymentService constructor.
     * Initializes the service with the Klarna API credentials.
     */
    public function __construct(KlarnaSampleDataService $sampleDataService)
    {
        parent::__construct();
        $this->sampleDataService = $sampleDataService;
        $this->paymentsSessionsUrl = config('klarna.payments_sessions');
        $this->paymentsAuthorizationsUrl = config('klarna.payments_authorizations');
        $this->customerTokensUrl = config('klarna.customer_tokens');
    }

    /**
     * Starts a new session for the customer.
     *
     * @param array $data The data to initialize a new session.
     * @return \Illuminate\Http\Client\Response
     */
    public function openSession(array $data): \Illuminate\Http\Client\Response
    {
        $data = $this->sampleDataService->getSampleData();
        return $this->makeRequest('post', $this->paymentsSessionsUrl, $data);
    }

    /**
     * Retrieves session details for a given session ID.
     *
     * @param string $sessionId The Klarna session ID.
     * @return \Illuminate\Http\Client\Response
     */
    public function getSessionDetails(string $sessionId): \Illuminate\Http\Client\Response
    {
        return $this->makeRequest('get', $this->paymentsSessionsUrl . "/" . $sessionId);
    }

    /**
     * Updates session details for a given session ID.
     *
     * @param string $sessionId The Klarna session ID.
     * @param array $data The data to update the session.
     * @return \Illuminate\Http\Client\Response
     */
    public function updateSessionDetails(string $sessionId, array $data): \Illuminate\Http\Client\Response
    {
        $data = $this->sampleDataService->getSampleUpdateData();
        return $this->makeRequest('post', $this->paymentsSessionsUrl . "/" . $sessionId, $data);
    }

    /**
     * Cancels an authorization using the authorization token.
     *
     * @param string $authorizationToken The Klarna authorization token.
     * @return \Illuminate\Http\Client\Response
     */
    public function cancelAuthorization(string $authorizationToken): \Illuminate\Http\Client\Response
    {
        return $this->makeRequest('delete', $this->paymentsAuthorizationsUrl . $authorizationToken);
    }

    /**
     * Creates a one-time payment order using the authorization token.
     *
     * @param string $authorizationToken The Klarna authorization token.
     * @param array $data The data to create the order.
     * @return \Illuminate\Http\Client\Response
     */
    public function createOneTimePaymentOrder(string $authorizationToken, array $data): \Illuminate\Http\Client\Response
    {
        $data = $this->sampleDataService->getSampleOrderData();
        return $this->makeRequest('post', $this->paymentsAuthorizationsUrl . $authorizationToken . "/order", $data);
    }

    /**
     * Requests a customer token for recurring payments using the authorization token.
     *
     * @param string $authorizationToken The Klarna authorization token.
     * @param array $data The data to request a customer token.
     * @return \Illuminate\Http\Client\Response
     */
    public function requestCustomerToken(string $authorizationToken, array $data): \Illuminate\Http\Client\Response
    {
        $data = $this->sampleDataService->getSampleRecurringPaymentData();
        return $this->makeRequest('post', $this->paymentsAuthorizationsUrl . $authorizationToken . "/customer-token", $data);
    }

    /**
     * Retrieves customer token details for a given customer token.
     *
     * @param string $customerToken The Klarna customer token.
     * @return \Illuminate\Http\Client\Response
     */
    public function getCustomerTokenDetails(string $customerToken): \Illuminate\Http\Client\Response
    {
        return $this->makeRequest('get', $this->customerTokensUrl . $customerToken);
    }
}
