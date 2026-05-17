package com.aula.doze.controllers;

import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.http.ResponseEntity;
import java.util.List;

// Faltavam estas anotações para o Spring reconhecer a classe como um Controller!
@RestController
@RequestMapping("/task")
public class TaskController {

    // Nota: Lembre-se de declarar e injetar aqui com @Autowired o userService e taskService
    // se for utilizar este controller de tarefas na aplicação.

    @GetMapping("/user/{userId}")
    public ResponseEntity<List<Object>> findByUserId(@PathVariable Long userId) {
        // Validação solicitada no enunciado
        /* User user = this.userService.findById(userId);
        if (user == null) {
            return ResponseEntity.notFound().build();
        }
        List<Task> tasks = this.taskService.findByUserId(userId);
        return ResponseEntity.ok().body(tasks);
        */

        return ResponseEntity.ok().build();
    }
}