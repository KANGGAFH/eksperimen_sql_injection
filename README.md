# 🧪 Uji Coba SQL Injection untuk Pemula

Proyek ini merupakan simulasi sederhana untuk memahami bagaimana **SQL Injection** dapat terjadi pada form login yang tidak aman. Tujuan Uji Coba ini adalah untuk edukasi dan meningkatkan kesadaran tentang pentingnya keamanan dalam pengembangan aplikasi web.

---

## ⚠️ Peringatan
> Proyek ini **hanya untuk tujuan pembelajaran**.  
> Jangan gunakan teknik ini untuk menyerang situs atau sistem yang tidak Anda miliki atau tidak diberi izin secara resmi.

---

## 📁 Struktur Proyek

| File          | Deskripsi                                   |
|---------------|----------------------------------------------|
| `login_rentan.php`   | Form login yang rentan terhadap SQL Injection |
| `login_aman.php`   | Form login yang aman terhadap SQL Injection |
| `database.sql`| Struktur database dan tabel `users`          |

---

## 🗃️ Database

Struktur tabel `users`:

| Field    | Type        | Null | Key | Default | Extra          |
|----------|-------------|------|-----|---------|----------------|
| id       | int(11)     | NO   | PRI | NULL    | auto_increment |
| username | varchar(50) | YES  |     | NULL    |                |
| password | varchar(50) | YES  |     | NULL    |                |


📸 *isi tabel:*  

![Screenshot_17](https://github.com/user-attachments/assets/db401c31-9cf3-4f63-a415-732a1b72a774)


---

## 💻 Cara Menjalankan

1. **Aktifkan XAMPP** (Apache + MySQL)
   
2. **Import Database :**
   - Buka phpMyAdmin
   - Buat database baru, misal database_login
   - import database.sql
  
3. **Buka file di browser :**
   contohnya : *http:localhost/eksperimen_sql_injection/login_rentan.php*

4. **Coba login dengan input :**
   username: ' OR '1'='1
   password: ' OR '1'='1
   
   ![Screenshot_28](https://github.com/user-attachments/assets/d4af66a0-5da1-41d4-b3d7-c520e27c6ce3)

   ![Screenshot_14](https://github.com/user-attachments/assets/7b2f8a5e-e7d5-4a0b-9f34-0afe1a0d618c)

**🤔Kenapa bisa berhasil ?** Karena query SQL yang terbentuk adalah :

SELECT * FROM users WHERE username = '' OR '1'='1' AND password = '' OR '1'='1'

bagian '1'='1' akan selalu bernilai **TRUE** meskipun username dan password salah akan tetapi tetap bisa login.

---

🛡️ **Cara Mengatasi**

Gunakan Prepapred Statements (PDO/MySQLi) untuk menghindari SQL Injection, misal :

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?"); <br>
$stmt->bind_param("ss", $username, $password);<br>
$stmt->execute();<br>

*lihat di login_aman.php*

📜 Lisensi
MIT License © 2025 Kangga F




   


   

  











   
