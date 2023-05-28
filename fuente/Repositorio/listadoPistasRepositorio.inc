<?php

namespace app\tenis\repositorio;

class ListadoPistasRepositorio
{
    public function listadoPistas()
    {
        $sql = "SELECT *
        FROM pistas";
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

    public function listadoPistasByURL($tipo_pista)
    {
        $sql = "SELECT *
        FROM pistas
        WHERE id_pista= :tipo_pista";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':tipo_pista', $tipo_pista);
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
