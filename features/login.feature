Feature: login
  In order to generate a identification token
  As an anonymous authenticated user
  I need to provide my identifiers

  Scenario: Generate token OK
    When I add "Content-Type" header equal to "application/json"
    When I send a "POST" request to "/login" with body:
    """
    {
        "username": "SFR",
        "password": "sfr1234"
    }
    """
    Then the response status code should be 200
    And the response should be in JSON

  Scenario: Generate token not OK
    When I add "Content-Type" header equal to "application/json"
    When I send a "POST" request to "/login" with body:
    """
    {
        "username": "SFR",
        "password": "badCredential"
    }
    """
    Then the response status code should be 401
    And the response should be in JSON