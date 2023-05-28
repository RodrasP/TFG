<?php

namespace app\tenis\repositorio;

class RegisterRepositorio
{
    public function register($user, $email, $pass)
    {
        $sql = "INSERT into usuarios (nombre_usuario, email, pass, rol)
                values(
    	        :nombre_usuario,
    	        :email,
    	        :pass,
                'vecino');";
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':nombre_usuario', $user);
            $snt->bindValue(':email', $email);
            $snt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT));
            $snt->execute();
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            unset($con);
        }
    }
}
