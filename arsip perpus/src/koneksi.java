
import java.sql.Connection;
import java.sql.DriverManager;

public class koneksi {
    public static Connection getconection07175(){
        Connection conn07175 = null;
        String driver07175 = "com.mysql.jdbc.Driver";
        String url07175 = "jdbc:mysql://localhost:3306/arsipbuku";
        String user07175 = "root";
        String pass07175 = "";
        try {
            Class.forName(driver07175);
            conn07175 = DriverManager.getConnection(url07175, user07175, pass07175);
            System.out.println("Berhasil Koneksi Database");
        }catch(Exception e){
            System.out.println("Gagal Koneksi Database");
            e.printStackTrace();
        }
        return conn07175;
    } 
}
