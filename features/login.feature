Feature:
  In order to generate a identification token
  As an anonymous authenticated user
  I need to provide my identifiers

  Scenario: Generate token OK
    When I send a "POST" request to "/login" with body:
    """
    {
        "username": "SFR",
        "password": "sfr123"
    }
    """
    Then the response status code should be 200
    And the response should be encoded in "application/json"
    And the header "Content-Type" should be equal to "application/json"

  Scenario: Generate token not OK
    When I send a "POST" request to "/login" with body:
    """
    {"username": "SFR", "password": "sfr123"}
    """
    Then the response status code should be 401
    And the response should be encoded in "application/json"