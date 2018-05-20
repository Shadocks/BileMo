Feature: documentation
  In order to view documentation
  As an anonymous authenticated user
  I need to access it by a path http://bilemo/api/docs

  Scenario: It receives a JSON response of documentation from API
    When I send a "GET" request to "/api/docs"
    Then the response status code should be 200

  Scenario: It receives a HTML response of documentation from API
    When I send a "GET" request to "/api/docs.html"
    Then the response status code should be 200
    And the response should not be in JSON
