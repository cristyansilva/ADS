package com.example.simulado.service;


import com.example.simulado.models.Autor;
import com.example.simulado.repositories.AutorRepositories;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class AutorService {
    private final AutorRepositories autorRepositories;

    public AutorService(AutorRepositories autorRepositories) {
        this.autorRepositories = autorRepositories;
    }

    public List<Autor> ListarTodos(){
        return autorRepositories.findAll();
    }

    public Autor buscarPorId(Long id){
        return autorRepositories.findById(id)
                .orElseThrow(() -> new RuntimeException("Autor não encontrado"));
    }

    public Object listarTodos() {
    }
}
