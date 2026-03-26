import java.io.*;

/** Classe que permite fazer leitura de dados do teclado, com mtodos estticos.
 *  Iso significa que no h necessidade de instanciar um objeto para invocar os mtodos.
 *  Sintaxe p/ chamada: <nome_da_classe>.<nome_do_mtodo>(<mensagem de solicitao>)
 *  Exemplo de chamada: Teclado.leInt("Digite um nmero inteiro")
 */ 

public class Teclado
{
     private static String s;
     private static InputStreamReader i = new InputStreamReader (System.in);
     private static BufferedReader d = new BufferedReader(i);

     
     /**
        L um inteiro, exibindo na tela uma mensagem de solicitao.
        @return int
     */
     public static int leInt (String msg)
     {   int a = 0;
         System.out.print(msg);
         try
         {
             s = d.readLine();
             a = Integer.parseInt(s);
         }
         catch (IOException e)
         {
             System.out.println ("Erro de I/O: "+e );
         }
         catch (NumberFormatException e)
         {
             System.out.println ("o valor digitado deve ser inteiro: "+e );
         }
         return (a);
     }
     
     /**
        L um double, exibindo na tela uma mensagem de solicitao.
        @return double
     */
     public static double leDouble(String msg)
     {   double a = 0;
         System.out.print(msg);
         try
         {
             s = d.readLine();
             a = Double.parseDouble(s);
         }
         catch (IOException e)
         {
             System.out.println ("Erro de I/O: " + e);
         }
         catch (NumberFormatException e)
         {
             System.out.println ("o valor digitado deve ser numero: "+e );
         }
         return (a);
     }
     
     /**
        L um string, exibindo na tela uma mensagem de solicitao.
        @return String
     */
     public static String leString(String msg)
     {   s = "";
         System.out.print(msg);
         try
         {
            s = d.readLine();
         }
         catch (IOException e)
         {
            System.out.println ("Erro de I/O: " + e);
         }
         return (s);
     }
    
     /**
        L um caractere exibindo na tela uma mensagem de solicitao.
        @return Char
     */
     public static Character leChar(String msg)
     {   s = "";
         System.out.print(msg);
         try
         {
            s = d.readLine();
         }
         catch (IOException e)
         {
            System.out.println ("Erro de I/O: " + e);
         }
         return (s.charAt(0));
     }


}//fim da classe


