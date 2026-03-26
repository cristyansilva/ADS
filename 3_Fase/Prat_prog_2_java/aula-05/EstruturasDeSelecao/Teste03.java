public class Teste03{
    public static void main(String args[]){
        int x=2;
        int y = 5;
        boolean b1 = false;
        boolean b2 = false;
        
        x++;
        b1 = y != x;
        b2 = (y >=x) && b1;
        System.out.println(b1 + " - " + x + " - " + b2 + " - " + y);
        
        y = y/x;
        b1 = ! b1;
        b2 =  (x == y ) || b1 && b2;
        
        System.out.println(b1 + " -  " + x + " - " + b2 + " - " + y);
    }
}


/*
 a) Quais foram os sucessivos valores armazenados na variável x durante a execução?
Os valores foram 2 (na inicialização) e 3 (após o comando x++).

b) Qual o valor será armazenado na variável y na linha 17?
O valor armazenado é 1.
 
c) Qual o resultado na tela após a execução do código acima?
true - 3 - true - 5
false - 3 - false - 1
 */