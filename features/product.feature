Feature: product
  In order to view a product
  As an authenticated user
  I need to provide a token

  Scenario: It receives a response with all products of API
    When I send a "GET" request to "/api/products"
    Then the response status code should be 200

  Scenario: It receives a response product details of API
    When I send a "GET" request to "/api/products/8bec2037-6fb9-4196-ae5b-e03a59a1a2cb"
    Then the response status code should be 200
