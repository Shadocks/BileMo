Feature: user
  In order to manipulate users
  As an authenticated user (client) with ROLE_USER
  I need to provide a token

  Scenario: He asks for the list of users
    When I send a "GET" request to "/api/users"
    Then the response status code should be 200

  Scenario: He asks for the details of a user who is authorized
    When I send a "GET" request to "/api/users/e4087900-e39f-45ea-9600-75c2126dc18c"
    Then the response status code should be 200

  Scenario: He asks the details of a user who is not authorized to him
    When I send a "GET" request to "/api/users/873481e5-776d-405c-8ec0-118a14b9f009"
    Then the response status code should be 404

  Scenario: It creates a user
    When I add "Content-Type" header equal to "application/json"
    When I send a "POST" request to "/api/users" with body:
    """
    {
        "firstName": "behat_test_firstName",
        "lastName": "behat_test_lastName",
        "email": "behat.behat@gmail.com",
        "mobileNumber": "0654129884",
        "product": "\/api\/products\/8bec2037-6fb9-4196-ae5b-e03a59a1a2cb"
     }
    """
    Then the response status code should be 200

  Scenario: It remove a user OK
    When I send a "DELETE" request to "/api/users/e85c3941-82a5-4c1f-8084-3dbf472490b5"
    Then the response status code should be 200

  Scenario: It remove a user not OK
    When I send a "DELETE" request to "/api/users/36e728ac-ff53-4a95-b746-b3626d71e0e1"
    Then the response status code should be 404
