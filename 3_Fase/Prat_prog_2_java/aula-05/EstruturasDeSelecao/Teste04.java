import java.util.Scanner;

public class Teste04 {
    public static void main(String[] args) {
        Scanner leitor = new Scanner(System.in);     
        int tempa1, tempa2, tempb1, tempb2, tempc1, tempc2;
        System.out.print("Digite a1: ");
        tempa1 = leitor.nextInt();
        System.out.print("Digite a2: ");
        tempa2 = leitor.nextInt();

        System.out.print("Digite b1: ");
        tempb1 = leitor.nextInt();
        System.out.print("Digite b2: ");
        tempb2 = leitor.nextInt();

        System.out.print("Digite c1: ");
        tempc1 = leitor.nextInt();
        System.out.print("Digite c2: ");
        tempc2 = leitor.nextInt();

        boolean a = (tempa1 == tempa2);
        boolean b = (tempb1 == tempb2);
        boolean c = (tempc1 == tempc2);

        System.out.println(a + " " + b + " " + c);


        if (a) {
            if (b) {
                System.out.println("C1");
                if (c) {
                    System.out.println("C2");
                    System.out.println("C3");
                } else {
                    System.out.println("C4");
                }
            } else {
                System.out.println("C5");
            }
        }

        System.out.println("C6");

        leitor.close();
    }
}