<?php

namespace app\tenis\repositorio;

class DeleteReservaRepositorio
{
    public function delete($id_reserva)
    {
        $sql = "DELETE FROM reservas_tenis
        WHERE id_reserva = :id_reserva;
        ";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':id_reserva', $id_reserva);
            $snt->execute();
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($snt);
            unset($con);
        }
    }
}
