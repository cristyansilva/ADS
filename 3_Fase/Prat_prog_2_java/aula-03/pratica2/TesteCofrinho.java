public class TesteCofrinho{
    public static void mains(String args[]){
        Cofrinho c1, c2, c3;
        
        Pessoa p;
        
        p = new Pessoa(Teclado.leString("Nome do dono do primeiro Cofrinho: "),
         Teclado.leInt("idade: "));
    
     //inscanciar o primeiro cofrinho vazio com o dono ja instanciado acima
        c1 = new Cofrinho(p);
     
     //depositar 5 moedas de 50 centavos no primeiro cofrinho
        c1.depositarUmaMoedaCincoentaCentavos();
        c1.depositarUmaMoedaCincoentaCentavos();
        c1.depositarUmaMoedaCincoentaCentavos();
        c1.depositarUmaMoedaCincoentaCentavos();
        c1.depositarUmaMoedaCincoentaCentavos();
        
        //depositar 2 moedas de 25 cent
        c1.depositarUmaMoedaVinteCincoCentavos();
        c1.depositarUmaMoedaVinteCincoCentavos();
        
        //depositar 2 moedas de 10 cent
        c1.depositarUmaMoedaDezCentavos();
        c1.depositarUmaMoedaDezCentavos();
        
        //instanciar o segundo cofrinho com o nome e idade do dono lido no teclado
        //e armazenar a referencia em uma variavel
        c2 = new Cofrinho(Teclado.leString("Nome do dono do segundo cofrinho: "),
                Teclado.leInt("idade: "));
                
        c2.depositarUmaMoedaCincoentaCentavos();
        c2.depositarUmaMoedaCincoentaCentavos();
        
        //instanciar o terceiro cofrinho para o mesmo dono do segundo
        c3 = new Cofrinho(c2.getDono());
        
        c3.depositarUmaMoedaDezCentavos();
        c3.depositarUmaMoedaDezCentavos();
        c3.depositarUmaMoedaDezCentavos();
        
    System.out.println("\f-----------------------------------");
    System.out.println(c1.informaTotal());
    System.out.println(c2.informaTotal());
    System.out.println(c3.informaTotal());
    System.out.println("-------------------------------------");
    //calcular e exibit o total dos tres cofrinhos:
    double total;
    total = c1.calcularTotal()+c2.calcularTotal()+c3.calcularTotal();
    System.out.println("Valor total dos tres cofrinhos: " + total);
    }
}