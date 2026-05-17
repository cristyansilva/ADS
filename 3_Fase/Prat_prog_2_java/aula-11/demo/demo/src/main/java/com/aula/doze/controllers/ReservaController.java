package com.aula.doze.controllers;

import com.aula.doze.models.Reserva;
import com.aula.doze.services.ReservaService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import java.net.URI;
import java.util.List;

import com.aula.doze.services.HospedeService; // Adicione este import se necessário

@RestController
@RequestMapping("/reservas")
@Validated
public class ReservaController {

    @Autowired
    private ReservaService reservaService;

    @Autowired
    private HospedeService hospedeService; // Injete o HospedeService aqui para validação

    @GetMapping("/{id}")
    public ResponseEntity<Reserva> findById(@PathVariable Long id) {
        Reserva obj = reservaService.findById(id);
        return ResponseEntity.ok().body(obj);
    }

    // Endpoint customizado ajustado com a regra da Tarefa 3
    @GetMapping("/hospede/{hospedeId}")
    public ResponseEntity<List<Reserva>> findAllByHospedeId(@PathVariable Long hospedeId) {
        // 1. Valida se o hóspede existe usando o service dele
        this.hospedeService.findById(hospedeId);
        // Nota: Se o seu findById disparar uma exceção customizada (como ResourceNotFoundException),
        // o Spring Boot já vai tratar e retornar o erro correto.

        // 2. Se existir, busca a lista de reservas normalmente
        List<Reserva> list = reservaService.findAllByHospede_Id(hospedeId);
        return ResponseEntity.ok().body(list);
    }

    @PostMapping
    public ResponseEntity<Void> create(@Valid @RequestBody Reserva obj) {
        obj = reservaService.create(obj);
        URI uri = ServletUriComponentsBuilder.fromCurrentRequest()
                .path("/{id}").buildAndExpand(obj.getId()).toUri();
        return ResponseEntity.created(uri).build();
    }

    @PutMapping("/{id}")
    public ResponseEntity<Void> update(@Valid @RequestBody Reserva obj, @PathVariable Long id) {
        obj.setId(id);
        reservaService.update(obj);
        return ResponseEntity.noContent().build();
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id) {
        reservaService.delete(id);
        return ResponseEntity.noContent().build();
    }
}