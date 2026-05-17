package com.aula.doze.services;

import com.aula.doze.models.Reserva;
import com.aula.doze.repositories.ReservaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;

@Service
public class ReservaService {

    @Autowired
    private ReservaRepository reservaRepository;

    public Reserva findById(Long id) {
        return reservaRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Reserva não encontrada com o ID: " + id));
    }

    @Transactional
    public Reserva create(Reserva reserva) {
        reserva.setId(null);
        return reservaRepository.save(reserva);
    }

    @Transactional
    public Reserva update(Reserva reserva) {
        Reserva newReserva = findById(reserva.getId());
        newReserva.setDataReserva(reserva.getDataReserva());
        newReserva.setHospede(reserva.getHospede());
        return reservaRepository.save(newReserva);
    }

    @Transactional
    public void delete(Long id) {
        findById(id);
        reservaRepository.deleteById(id);
    }

    // Método customizado exigido no desafio
    public List<Reserva> findAllByHospede_Id(Long hospedeId) {
        // OBS: O ReservaRepository precisa ter o método findByHospede_Id ou findByHospedeId declarado.
        return reservaRepository.findByHospede_Id(hospedeId);
    }
}