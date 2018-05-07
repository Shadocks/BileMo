Feature:
  In order to view documentation
  As an anonymous authenticated user
  I need to access it by a path http://bilemo/api/docs

  Scenario: It receives a response from Symfony's kernel
    When I send a "GET" request to "/api/docs"
    Then the response status code should be 200
