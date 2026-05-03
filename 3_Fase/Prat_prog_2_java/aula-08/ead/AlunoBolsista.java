public class AlunoBolsista extends Aluno {
    private String tipoBolsa; // Ex: "Integral", "Parcial 50%"

    public AlunoBolsista(int codigo, String nome, String dataNascimento, String email, String senha, String tipoBolsa) {
        super(codigo, nome, dataNascimento, email, senha); // Chamada ao construtor da superclasse
        this.tipoBolsa = tipoBolsa;
    }

    // Polimorfismo: Sobrescrita de método
    @Override
    public void exibeDados() {
        super.exibeDados(); // Chama a exibição original
        System.out.println("Bolsista: Sim | Tipo de Bolsa: " + tipoBolsa);
    }
}