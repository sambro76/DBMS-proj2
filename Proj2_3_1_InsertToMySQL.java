import java.io.File;
import java.sql.*;
import java.util.Scanner;

public class Proj2_3_1_InsertToMySQL{
	public static void main(String[] args) {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection myConn=DriverManager.getConnection("jdbc:mysql://localhost:3306/mysqldb","root","");
			Statement myStmt = myConn.createStatement();
			File file = new File("customer.txt");
			Scanner scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into customer values ("+ readLn+ ") ");	
			}

			scanner.close();
			
			file = new File("individual.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into individual values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("company.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into COMPANY values ("+ readLn+ ") ");	
			}
			
			scanner.close();

			file = new File("Owner.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into OWNER values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("rental_company.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into Rental_Company values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("bank.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into Bank values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("person.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into Person values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("category.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into CATEGORY values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("car.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into CAR values("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("Rent.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.execute("insert into Rent values ("+ readLn + ")");	
			}
			
			scanner.close();
			myConn.close();
		}
		catch (Exception e) {
			e.printStackTrace();
		}
	}
}