package com.aula.doze.services;

import com.aula.doze.models.Servico;
import com.aula.doze.repositories.ServicoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class ServicoService {

    @Autowired
    private ServicoRepository servicoRepository;

    public Servico findById(Long id) {
        return servicoRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Serviço não encontrado com o ID: " + id));
    }

    @Transactional
    public Servico create(Servico servico) {
        servico.setId(null);
        return servicoRepository.save(servico);
    }

    @Transactional
    public Servico update(Servico servico) {
        Servico newServico = findById(servico.getId());
        newServico.setNomeServico(servico.getNomeServico());
        newServico.setQuantidade(servico.getQuantidade());
        newServico.setReserva(servico.getReserva());
        return servicoRepository.save(newServico);
    }

    @Transactional
    public void delete(Long id) {
        findById(id);
        servicoRepository.deleteById(id);
    }
}