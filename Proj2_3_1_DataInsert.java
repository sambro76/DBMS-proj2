import java.io.File;
import java.sql.*;
import java.util.Scanner;

public class Proj2_3_1_DataInsert{
	public static void main(String[] args) {
		try {
			//Oracle DB XE 11.2 Connection
			Connection myConn=DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521:xe","system","Apple123");
			Statement myStmt = myConn.createStatement();
			File file = new File("customer.txt");
			Scanner scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into customer values ("+ readLn+ ") ");	
			}

			scanner.close();
			
			file = new File("individual.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into individual values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("company.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into COMPANY values ("+ readLn+ ") ");	
			}
			
			scanner.close();

			file = new File("Owner.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into OWNER values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("rental_company.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into Rental_Company values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("bank.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into Bank values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("person.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into Person values ("+ readLn + ")");	
			}
			
			
			scanner.close();
			
			file = new File("category.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into CATEGORY values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("car.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into CAR values("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("owns.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into owns values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			file = new File("Rent.txt");
			scanner = new Scanner(file);
			scanner.useDelimiter("\r\n");
			while (scanner.hasNext()) {
				String readLn=scanner.next();
				System.out.println(readLn);
				myStmt.executeQuery("insert into Rent values ("+ readLn + ")");	
			}
			
			scanner.close();
			
			/*
			Insert the remaining foreign keys 
			myStmt.executeQuery("alter table employee add constraint empdeptfk foreign key(dno) references department(dnumber)");	
			myStmt.executeQuery("alter table department add constraint deptmgrfk foreign key(mgr_ssn) references employee(ssn)");
			myStmt.executeQuery("delete from works_on "
					+ " where pno in (select w.pno from works_on w "
					+ " where not exists (select pnumber from project p where w.pno=p.pnumber))");
			myStmt.executeQuery("alter table works_on add constraint wrkson_fk2 foreign key (pno) references project(pnumber)");
			
			*/
			myConn.close();
		}
		catch (Exception e) {
			e.printStackTrace();
		}
	}
}