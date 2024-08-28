<?php

namespace App\Middlewares\Validation;

use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;
use App\Models\BD\ModelUser;
final class validationUpdate
{

    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $userupdate = $request->getParsedBody();

        $phone = preg_replace('/[\(\)\-\s]/', '', $userupdate['phone']);

        if (strlen($phone) > 10 || strlen($phone < 5)) {

            try {
                throw new \Exception("Number Incorrect");
            } catch (\Exception | \Throwable $ex) {
                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'userMessage' => 'Forneça um número de telefone válido.',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        }

        $resUsers = new ModelUser();
        $mailExistVerify = $resUsers->getContactByMailUpdate($userupdate['id'],$userupdate['mail']);

        if ($mailExistVerify) {

            try {
                throw new \Exception("Mail Exists");
            } catch (\Exception | \Throwable $ex) {
                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'userMessage' => 'O e-mail fornecido existe em nosso sistema.',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        }


        $phoneExistVerify = $resUsers->getContactByPhoneUpdate($userupdate['id'],$userupdate['phone']);

        if ($phoneExistVerify) {

            try {
                throw new \Exception("Phone Exists");
            } catch (\Exception | \Throwable $ex) {
                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'userMessage' => 'O número de telefone fornecido existe em nosso sistema.',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        }

        $response = $next($request, $response);
        return $response;
    }
}

