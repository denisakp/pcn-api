<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

return function (App $app) {

    $app->group('/api', function(App $app){
        $app->get('/user', function(Request $request, Response $response){
            print_r($request->getAttribute('jwt'));

        });
    });

    $app->post('/login', function(Request $request, Response $response){
        $input = $request->getParsedBody();
        $con = $this->get('db');

        $sql = $con->prepare("SELECT id_client, pseudo_client, mdp_client FROM client WHERE pseudo_client = :email");
        $sql->bindParam('email' , $input['pseudo']);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_OBJ);

        if($user && password_verify($input['passwd'], $user->mdp_client)){
            $token = JWT::encode([
                'ID' => $user->id_client, 'Pseudo' => $user->pseudo_client], 
                $settings['jwt']['secret'], "HS256");
                return $response->withJson(['token' => $token]);
        } else {
            return $response->write('Error');
        }
    });

};
