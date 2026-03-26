public class ContaBancaria{
    protected double saldo;
    
    public ContaBancaria(double saldoInicial) {
        this.saldo = saldoInicial;
    }
    
    public void depositar(double valor){
        this.saldo += valor;
    }
    
    public boolean sacar(double valor){
        if (this.saldo >= valor){
            this.saldo -= valor;
            return true;
        }
        return false;
    }
    
    public double getSaldo(){
        return this.saldo;
    }
    
    public void imprimirSaldo(){
        System.out.println("Saldo da conta: " + this.saldo);
    }
}