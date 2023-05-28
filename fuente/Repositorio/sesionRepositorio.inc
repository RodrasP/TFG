<?php

namespace app\tenis\repositorio;

class SesionRepositorio
{
    public function iniSes($email)
    {
        $sql = "SELECT email, pass, nombre_usuario, id_usuario, rol
                from usuarios 
                where email = :eCorreo";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':eCorreo', $email);
            $snt->execute();
            return  $snt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            unset($con);
        }
    }
}
