public class TesteContas{
    public static void main(String[] args){
        ContaBancaria conta1 = new ContaCorrente(1000, 10);
        ContaBancaria conta2 = new ContaPoupanca(2000, 0.05);
        
        conta1.depositar(500);
        
        conta2.depositar(1000);
        
        conta1.imprimirSaldo();
        
        conta2.imprimirSaldo();
    }
}