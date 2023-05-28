<?php

namespace app\tenis\repositorio;

class BuscarFechasRepositorio
{
    public function listadosHoras($id_pista)
    {
        $sql = "SELECT CAST(CONVERT(VARCHAR, fecha_reserva) AS DATE) AS fecha_reserva, hora_inicio
        FROM reservas_tenis
        WHERE id_pista = :id_pista AND fecha_reserva BETWEEN CAST(GETDATE() AS DATE) AND CAST(DATEADD(DAY, 7, GETDATE()) AS DATE)";
        require_once __DIR__ . '/../../core/conexionBd.inc';

        try {
           
            $con = (new \ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindValue(':id_pista', $id_pista);
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
