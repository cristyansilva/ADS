public class Computador {
    // 1. Atributos (privados para garantir o encapsulamento)
    private String processador;
    private double capacidadeProcessador;
    private int memoriaRam;
    private int discoRigido;

    // 2. Construtor (permite criar o objeto com valores iniciais)
    public Computador(String processador, double capacidade, int ram, int hd) {
        this.processador = processador;
        this.capacidadeProcessador = capacidade;
        this.memoriaRam = ram;
        this.discoRigido = hd;
    }

    // 3. Método Getter (para ler o valor)
    public double getCapacidadeProcessador() {
        return capacidadeProcessador;
    }

    // 4. Método Setter (para alterar o valor)
    public void setCapacidadeProcessador(double capacidadeProcessador) {
        this.capacidadeProcessador = capacidadeProcessador;
    }
}