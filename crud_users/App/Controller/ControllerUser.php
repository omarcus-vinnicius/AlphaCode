<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\BD\ModelUser;

final class ControllerUser
{

    public function getUser(Request $request, Response $response, array $args)
    {
        $resUsers = new ModelUser();
        $response = $response->withJson($resUsers->getUsers())->withStatus(200);
        return $response;
    }
    public function getUserId(Request $request, Response $response, array $args)
    {

        $id = $args['id'];
        $resUsers = new ModelUser();
        $response = $response->withJson($resUsers->getUsers_Id($id))->withStatus(200);
        return $response;

    }
    public function createUser(Request $request, Response $response, array $args)
    {
        $newuser = $request->getParsedBody();
        $resUsers = new ModelUser();

        $newuser['send_wpp'] = strtoupper($newuser['send_wpp']);
        if ($newuser['send_wpp'] == FALSE || $newuser['send_wpp'] == 'FALSE') {
            $newuser['send_wpp'] = 0;
        }
        $newuser['send_mail_permission'] = strtoupper($newuser['send_mail_permission']);
        if ($newuser['send_mail_permission'] == FALSE || $newuser['send_mail_permission'] == 'FALSE') {
            $newuser['send_mail_permission'] = 0;
        }

        $newuser['send_sms_permission'] = strtoupper($newuser['send_sms_permission']);
        if ($newuser['send_sms_permission'] == FALSE || $newuser['send_sms_permission'] == 'FALSE') {
            $newuser['send_sms_permission'] = 0;
        }
        
        $resBD = $resUsers->createUsers($newuser);
        
        if($resBD === true){

            return $response
            ->withJson([
                'res' => 'sucess',
                'userMessage' => 'Criado com sucesso'
            ])
            ->withStatus(200);

        }else{
           
            return $response
                ->withJson([
                    'res' => 'error',
                    'errorMessage'=> $resBD['msg'],
                    'errorCode' => $resBD['statuSql'],
                    'userMessage' => 'Não foi possível registrar este usuário'
                ])
                ->withStatus(200);
        }  

    }
    public function updateUser(Request $request, Response $response, array $args)
    {
       
        $userupdate = $request->getParsedBody();
        $id = $userupdate['id'];

        $userupdate['send_wpp'] = strtoupper($userupdate['send_wpp']);
        if ($userupdate['send_wpp'] == FALSE || $userupdate['send_wpp'] == 'FALSE') {
            $userupdate['send_wpp'] = 0;
        }
        $userupdate['send_mail_permission'] = strtoupper($userupdate['send_mail_permission']);
        if ($userupdate['send_mail_permission'] == FALSE || $userupdate['send_mail_permission'] == 'FALSE') {
            $userupdate['send_mail_permission'] = 0;
        }

        $userupdate['send_sms_permission'] = strtoupper($userupdate['send_sms_permission']);
        if ($userupdate['send_sms_permission'] == FALSE || $userupdate['send_sms_permission'] == 'FALSE') {
            $userupdate['send_sms_permission'] = 0;
        }

        $resUsers = new ModelUser();
        $resBD = $resUsers->updateUsers($id,$userupdate);

        if ($resBD === true) {

            return $response
                ->withJson([
                    'res' => 'sucess',
                    'userMessage' => 'Atualizado com sucesso'
                ])
                ->withStatus(200);

        } else {

            return $response
                ->withJson([
                    'res' => 'error',
                    'errorMessage' => $resBD['msg'],
                    'errorCode' => $resBD['statuSql'],
                    'userMessage' => 'Não foi possível atualizar este usuário'
                ])
                ->withStatus(200);
        }
    }
    public function deleteUser(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $resUsers = new ModelUser();
        $resBD = $resUsers->deleteUsers($id);

        if($resBD) {

            return $response->withJson([
                'res' => 'sucess',
                'userMessage' => 'Deletado com sucesso'
            ]);

        } else {

            return $response->withJson(['res' => 'error', 'status' => 400,]);
        }
    }

}




?>