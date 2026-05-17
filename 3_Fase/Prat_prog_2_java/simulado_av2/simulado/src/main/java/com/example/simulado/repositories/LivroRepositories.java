package com.example.simulado.repositories;


import com.example.simulado.models.Autor;
import com.example.simulado.models.Livro;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface LivroRepositories extends JpaRepository<Livro,Long> {
    List<Livro> findByAutor(Long autor_id);   //busca livvros por autor

    List<Livro> findByAutorId(Long autorId);

    void deletarById(Long id);
}
