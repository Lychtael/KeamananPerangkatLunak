<!-- INI UNTUK DOKUMENTASI DAN CATATAN -->

### **Metode dalam Model (OOP)**
**AuthController.php**
- `register($username, $email, $password)`
- `login($email, $password)`
- `logout()`

**PostController.php**
- `index()` → Menampilkan semua postingan
- `show($id)` → Menampilkan detail postingan
- `create($data)` → Menyimpan postingan baru
- `update($id, $data)` → Memperbarui postingan
- `delete($id)` → Menghapus postingan

**CommentController.php**
- `store($postId, $commenterName, $commentText)` → Menambahkan komentar
- `getCommentsByPostId($postId)` → Menampilkan komentar berdasarkan ID postingan