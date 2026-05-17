package com.example.simulado.repositories;


import com.example.simulado.models.Autor;
import jakarta.persistence.EntityManager;
import jakarta.persistence.PersistenceContext;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AutorRepositories extends JpaRepository<Autor, Long> {


}
