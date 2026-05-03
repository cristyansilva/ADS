package com.aula.doze.models;

import jakarta.persistence.*;
import jakarta.validation.constraints.NotEmpty;
import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;
import java.util.Objects;

@Entity
@Table(name = Servico.TABLE_NAME)
public class Servico {

    public interface CreateServico {}
    public interface UpdateServico {}

    public static final String TABLE_NAME = "servico";

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", unique = true)
    private Long id;

    @Column(name = "nome_servico", length = 100, nullable = false)
    @NotNull(groups = CreateServico.class)
    @NotEmpty(groups = CreateServico.class)
    @Size(groups = CreateServico.class, min = 2, max = 100)
    private String nomeServico;

    @Column(name = "quantidade", nullable = false)
    @NotNull(groups = CreateServico.class)
    private Integer quantidade;

    // Relacionamento Muitos para Um com Reserva
    @ManyToOne
    @JoinColumn(name = "reserva_id", nullable = false)
    private Reserva reserva;

    // Construtor Vazio
    public Servico() {
    }

    // Construtor com Parâmetros
    public Servico(Long id, String nomeServico, Integer quantidade, Reserva reserva) {
        this.id = id;
        this.nomeServico = nomeServico;
        this.quantidade = quantidade;
        this.reserva = reserva;
    }

    // Getters e Setters
    public Long getId() { return id; }
    public void setId(Long id) { this.id = id; }

    public String getNomeServico() { return nomeServico; }
    public void setNomeServico(String nomeServico) { this.nomeServico = nomeServico; }

    public Integer getQuantidade() { return quantidade; }
    public void setQuantidade(Integer quantidade) { this.quantidade = quantidade; }

    public Reserva getReserva() { return reserva; }
    public void setReserva(Reserva reserva) { this.reserva = reserva; }

    // Equals e HashCode
    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Servico servico = (Servico) o;
        return Objects.equals(id, servico.id);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id);
    }
}