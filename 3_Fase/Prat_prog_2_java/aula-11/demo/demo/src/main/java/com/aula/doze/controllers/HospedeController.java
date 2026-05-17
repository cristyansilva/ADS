package com.aula.doze.controllers;

import com.aula.doze.models.Hospede;
import com.aula.doze.services.HospedeService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import java.net.URI;

@RestController
@RequestMapping("/hospedes")
@Validated
public class HospedeController {

    @Autowired
    private HospedeService hospedeService;

    @GetMapping("/{id}")
    public ResponseEntity<Hospede> findById(@PathVariable Long id) {
        Hospede obj = hospedeService.findById(id);
        return ResponseEntity.ok().body(obj);
    }

    @PostMapping
    public ResponseEntity<Void> create(@Valid @RequestBody Hospede obj) {
        obj = hospedeService.create(obj);
        URI uri = ServletUriComponentsBuilder.fromCurrentRequest()
                .path("/{id}").buildAndExpand(obj.getId()).toUri();
        return ResponseEntity.created(uri).build(); // Retorna 201
    }

    @PutMapping("/{id}")
    public ResponseEntity<Void> update(@Valid @RequestBody Hospede obj, @PathVariable Long id) {
        obj.setId(id);
        hospedeService.update(obj);
        return ResponseEntity.noContent().build(); // Retorna 204
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id) {
        hospedeService.delete(id);
        return ResponseEntity.noContent().build(); // Retorna 204
    }
}