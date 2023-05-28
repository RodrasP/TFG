<?php

namespace app\tenis\repositorio;

class ReservarRepositorio
{
    public function reservar($id_pista, $fecha_reserva, $hora_inicio, $hora_fin, $id_user, $nombre_user)
    {
        $sql = "INSERT INTO reservas_tenis (id_pista, fecha_reserva, hora_inicio, hora_fin, id_usuario, nombre_usuario)
        VALUES (:id_pista, :fecha_reserva, :hora_inicio, :hora_fin, :id_usuario, :nombre_usuario);
        ";
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':id_pista', $id_pista);
            $snt->bindValue(':fecha_reserva', $fecha_reserva);
            $snt->bindValue(':hora_inicio', $hora_inicio);
            $snt->bindValue(':hora_fin', $hora_fin);
            $snt->bindValue(':id_usuario', $id_user);
            $snt->bindValue(':nombre_usuario', $nombre_user);
            $snt->execute();
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            unset($con);
        }
    }
}
