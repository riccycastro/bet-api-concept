### Assumptions
    1. All requests should have content-type application/json, and all response should be in json too;
    2. There's not public route, so AuthGuardDispatcher is placed without checking if route is secured or not;
    3. All env vars are injected through docker container config;
    4. The moment that a user is creatd, the corresponding balance is created too;
    5. There's a proper JWT auth placed, so here we use the token only to identify the current user;

### Setup
Using you cmd line of choice, navigate to the project dir and execute
``` bash
    docker compose up
```

Using PHPStorm HTTP Client (you can use any other client of your choice), you can place the following request

```
POST http://localhost:8090/bet
Content-Type: application/json
Authorization: 1234567890

{
"number": 8,
"amount": 50
}
```

