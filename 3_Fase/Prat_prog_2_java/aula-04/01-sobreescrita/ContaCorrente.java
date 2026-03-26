public class ContaCorrente extends ContaBancaria {
    private double taxaDeOperacao;
    
    public ContaCorrente(double saldoInicial, double taxaDeOeração){
        super(saldoInicial);
        this.taxaDeOperacao = taxaDeOperacao;
    }
    
    @Override
    public void imprimirSaldo(){
        System.out.println("Saldo da conta corrente: " + this.saldo);
    }
}