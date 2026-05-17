package com.example.simulado.service;


import com.example.simulado.models.Livro;
import com.example.simulado.repositories.LivroRepositories;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class LivroService {
    private final LivroRepositories livroRepositories;
    private final AutorService autorService;

    public LivroService(LivroRepositories livroRepositories, AutorService autorService) {
        this.livroRepositories = livroRepositories;
        this.autorService = autorService;
    }

    public Livro salvar(Livro livro){
        autorService.buscarPorId((long) livro.getAutor().getId());
        return livroRepositories.save(livro);
    }
    public List<Livro> listarTodos() {
        return livroRepositories.findAll();
    }
    public List<Livro> listarPorAutor(Long autorId) {
        return livroRepositories.findByAutorId(autorId);
    }
    public Livro BuscarPorId(Long id){
        return livroRepositories.findById(id)
                .orElseThrow(() -> new RuntimeException("Livro não encontrado"));
    }

    public void deletar(Long id){
        livroRepositories.deletarById(id);
    }
}
