package com.example.simulado.controller;

import ch.qos.logback.core.model.Model;
import com.example.simulado.models.Livro;
import com.example.simulado.service.AutorService;
import com.example.simulado.service.LivroService;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

import static sun.security.x509.OIDMap.addAttribute;

@Controller
@RequestMapping("/livros")
public class LivroController {
    private final LivroService livroService;
    private final AutorService autorService;

    public LivroController(LivroService livroService, AutorService autorService){
        this.livroService = livroService;
        this.autorService = autorService;
    }
    @GetMapping
    public String listar(Model model){
        model,addAttribute("livros", livroService.listarTodos());
        model.addAttribute("autores", autorService.listarTodos());
        return "livros";
    }

    private void addAttribute(String livros, List<Livro> livros1) {
    }

    @PostMapping
    public String salvar(@ModelAttribute Livro livro) {
        livroService.salvar(livro);
        return "redirect:/livros";
    }

    @GetMapping("deletar/{id")
    public String deletar(@PathVariable Long id){
        livroService.deletar(id);
        return "redirect:/livros";
    }

}
