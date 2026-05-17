package com.aula.doze.repositories;

import com.aula.doze.models.Reserva;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import java.util.List;

@Repository
public interface ReservaRepository extends JpaRepository<Reserva, Long> {

    // É ESTA LINHA QUE FALTA LÁ NO SEU REPOSITÓRIO:
    List<Reserva> findByHospede_Id(Long hospedeId);

}