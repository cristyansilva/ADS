public class Teste{ //metodo principal para testar as classes
     public static void main(String[] args){
         //Criando 3 objetos computador
         Computador computador1 = new Computador("Dell", "Inspirion", 8);
         Computador computador2 = new Computador("HP", "Pavilion", 16);
         Computador computador3 = new Computador("Apple", "MacBook Pro", 32);
     
        //Testando os metodos Getters e Setters
        System.out.println("Antes da modificação: ");
        computador1.exibeDados(); //chama metodo exibe dados da classe computador
        System.out.println("------------------------");
        computador1.setMemoriaRAMGB(16);
        computador1.setModelo("Latitude");
        System.out.println("Depois da modificação: ");
        computador1.exibeDados();
        System.out.println("*********** Fim do teste Comptador\n");
        
        //criando 3 objetos automovel
        Automovel automovel1 = new Automovel("Toyota", "Corolla", 2020);
        Automovel automovel2 = new Automovel("Honda", "Civic", 2019);
        Automovel automovel3 = new Automovel("Ford", "Focus", 2018);
        
        //testando os metodos getters e setters
        System.out.println("Antes da modificação: ");
        automovel1.exibeDados();
        System.out.println("--------------------");
        automovel1.setAno(2021);
        automovel1.setModelo("Camry");
        System.out.println("Depois da modificação: ");
        automovel1.exibeDados();
        System.out.println("******* Fim do teste Automovel\n");
        
        //criando 3 objetos Imovel
        Imovel imovel1 = new Imovel("Apartamento", 70.5, 2);
        Imovel imovel2 = new Imovel("Casa", 150.75, 3);
        Imovel imovel3 = new Imovel("Sobrado", 200, 4);
        
        //testando os metodos getters e setters
        System.out.println("Antes da modificação: ");
        imovel1.exibeDados();
        System.out.println("--------------------");
        imovel1.setArea(80.2);
        imovel1.setQuartos(3);
        System.out.println("Depois da modificação: ");
        imovel1.exibeDados();
        System.out.println("******* Fim do teste Imovel\n");

    }
}