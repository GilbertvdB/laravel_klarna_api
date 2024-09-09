# laravel_klarna_api_services
Here is my take on setting up services to connect with Klarna API, mainly payments and checkout. Im using Laravel version 11 and Laravel regular Http client instead of Guzzle. This repository provides a set of classes and configurations for integrating with the Klarna API. It includes services for handling payment sessions and sample data, a facade for easy access, and configuration files for setting up API credentials.

What is not included is classes to handle and process the responses. 

# Overview
- KlarnaBaseService: Provides base functionality for making HTTP requests to the Klarna API.
- KlarnaPaymentService: Extends KlarnaBaseService to handle payment-specific interactions.
- KlarnaSampleDataService: Supplies sample data for API requests.
- KlarnaPaymentFacade: A facade for easy access to the payment service methods.
- klarna.php: Configuration file for API credentials and endpoints.
- AppServiceProvider: Demonstrates how to register the services in the Laravel service container.

# Usage
If you would like to use these files you can copy them to their respected folders or create the folders in your project.
In your env file you can add and setup the lines below for your own project.:

>KLARNA_API_BASE_URL=  
>KLARNA_USERNAME=  
>KLARNA_PASSWORD=  
>KLARNA_CALLBACK=  

In your controller for example you can use the facade:
> KlarnaPayment::openSession();

If you want to provide your own $data to the functions you should remove or comment out the $data = $this->sampleData in the services.


