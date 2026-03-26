public class Pessoa {
    private String nome;
    private int idade;
    // Construtor 
    public Pessoa(String nome, int idade) {
        this.nome = nome;
        this.idade = idade; 
    }
    // Métodos Get e Set 
    public String getNome() {
        return this.nome;
    }
    // Altera o nome da pessoa 
    public void setNome(String nome) {
        this.nome = nome; 
    }
    // Retorna a idade da pessoa 
    public int getIdade() {
        return this.idade; 
    }
    // Altera a idade da pessoa 
    public void setIdade(int idade) {
        this.idade = idade; 
    }

    public void exibeDados() {
        System.out.println("Nome: " + nome);
        System.out.println("Idade: " + idade); 
    }
}