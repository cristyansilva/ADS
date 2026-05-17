package com.aula.doze.services;

import com.aula.doze.models.Hospede;
import com.aula.doze.repositories.HospedeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class HospedeService {

    @Autowired
    private HospedeRepository hospedeRepository;

    public Hospede findById(Long id) {
        return hospedeRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Hóspede não encontrado com o ID: " + id));
    }

    @Transactional
    public Hospede create(Hospede hospede) {
        hospede.setId(null); // Garante que é uma criação
        return hospedeRepository.save(hospede);
    }

    @Transactional
    public Hospede update(Hospede hospede) {
        Hospede newHospede = findById(hospede.getId());
        newHospede.setNome(hospede.getNome());
        newHospede.setEmail(hospede.getEmail());
        return hospedeRepository.save(newHospede);
    }

    @Transactional
    public void delete(Long id) {
        findById(id); //
        try {
            hospedeRepository.deleteById(id);
        } catch (Exception e) {
            throw new RuntimeException("Não é possível excluir pois há entidades relacionadas.");
        }
    }
}