<?php

namespace app\tenis\repositorio;

class UsersRepositorio
{
    public function usuarios()
    {
        $sql = "SELECT * FROM usuarios ";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->execute();
            return  $snt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            unset($con);
        }
    }


    public function delete($id_usuario)
    {
        $sql = "DELETE FROM usuarios
        WHERE id_usuario = :id_usuario;
        ";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':id_usuario', $id_usuario);
            $snt->execute();

        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            unset($con);
        }
    }
}
