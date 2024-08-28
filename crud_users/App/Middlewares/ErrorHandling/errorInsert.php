<?php

namespace App\Middlewares\ErrorHandling;

use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class errorInsert
{

    public function __invoke(Request $request, Response $response, callable $next): Response
    {

        $newuser = $request->getParsedBody();


        if (
            !isset($newuser['name']) || empty($newuser['name']) ||
            !isset($newuser['mail']) || empty($newuser['mail']) ||
            !isset($newuser['birthday']) || empty($newuser['birthday']) ||
            !isset($newuser['occupation']) || empty($newuser['occupation']) ||
            !isset($newuser['cellphone']) || empty($newuser['cellphone']) ||
            !isset($newuser['phone']) || empty($newuser['phone']) 
        ) {

            try {
                throw new \Exception("Fill in all fields to proceed with the request");
            } catch (\Exception | \Throwable $ex) {
                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campos vazios ou inexistentes',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }

        }

        $response = $next($request, $response);
        return $response;
    }
}

