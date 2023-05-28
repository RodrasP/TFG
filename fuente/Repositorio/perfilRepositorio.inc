<?php

namespace app\tenis\repositorio;

class PerfilRepositorio
{
    public function perfil($id_usuario)
    {
        $sql = "SELECT id_reserva, id_pista, fecha_reserva, hora_inicio
        FROM reservas_tenis
        WHERE id_usuario = :id_usuario;
        ";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':id_usuario', $id_usuario);
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
