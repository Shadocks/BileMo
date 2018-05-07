Feature: product
  In order to view a product
  As an authenticated user
  I need to provide a token

  Scenario: It receives a response with all products of API
    When I send a "GET" request to "/api/products"
    Then the response status code should be 200

  Scenario: It receives a response product details of API
    When I send a "GET" request to "/api/products/31b6d0ef-ee9a-4823-8e41-89ce4b65a5c6"
    Then the response status code should be 200
