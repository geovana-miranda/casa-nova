<?php

namespace CasaNova\Controller;

class Error404Controller implements Controller
{
    public function handleRequest(): void
    {
        http_response_code(404);
    }

}
