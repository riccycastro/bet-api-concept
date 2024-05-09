### Assumptions
    1. All requests should have content-type application/json, and all response should be in json too;
    2. There's not public route, so AuthGuardDispatcher is placed without checking if route is secured or not;
    3. All env vars are injected through docker container config;
    4. The moment that a user is creatd, the corresponding balance is created too;
