Feature: client
  In order to manipulate client
  As an authenticated user (client) with ROLE_ADMIN
  I need to provide a token

  Scenario: He asks for the list of clients
    When I send a "GET" request to "/api/clients"
    Then the response status code should be 200

  Scenario: He asks for the details of a client
    When I send a "GET" request to "/api/clients/ebd1b37b-623f-46df-8ccf-893d605d7297"
    Then the response status code should be 200

  Scenario: It creates a client
    When I add "Content-Type" header equal to "application/json"
    When I send a "POST" request to "/api/clients" with body:
    """
    {
        "username": "Behat_test",
        "password": "Behat_test_password"
    }
    """
    Then the response status code should be 200

  Scenario: It remove a client OK
    When I send a "DELETE" request to "/api/clients/e48530aa-7cb0-46db-8f44-043268a41b45"
    Then the response status code should be 200

  Scenario: It remove a client not OK (bad uuid)
    When I send a "DELETE" request to "/api/clients/3748754f-e68f-4545-afe5-b23caed98ff7"
    Then the response status code should be 404
