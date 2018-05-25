Feature: client
  In order to manipulate client
  As an authenticated user (client) with ROLE_ADMIN
  I need to provide a token

  Scenario: User asks for the list of clients
    When I send a "GET" request to "/api/clients"
    Then the response status code should be 200

  Scenario: User creates a client
    When I add "Content-Type" header equal to "application/json"
    When I send a "POST" request to "/api/clients" with body:
    """
    {
        "username": "Behat_test",
        "password": "Behat_test_password"
    }
    """
    Then the response status code should be 200
