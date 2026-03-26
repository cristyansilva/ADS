public class ContaPoupanca extends ContaBancaria {
    private double taxaDeJuros;
    
    public ContaPoupanca(double saldoInicial, double taxaDeJuros){
        super(saldoInicial);
        this.taxaDeJuros = taxaDeJuros;
    }
    
    @Override
    public void imprimirSaldo(){
        System.out.println("Saldo da conta poupança: " + this.saldo);
    }
}