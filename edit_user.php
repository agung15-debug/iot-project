<?php 
    include "connection.php";
    $query = "SELECT * FROM tb_user WHERE uid = '$_GET[uid]'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sistem Presensi</title>
</head>
<body class="font-poppins">
    <nav class="bg-teal-800">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center font-medium">
                    <a class="text-white hover:text-white px-3 py-2 rounded-md " href="./index.php">Log Presensi</a>
                    <a class="text-white hover:text-white px-3 py-2 rounded-md" href="./user.php">Daftar Karyawan</a>
                    <a class="text-white hover:text-white px-3 py-2 rounded-md" href="./add_card.php">Pendaftaran Kartu</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container mx-auto py-8">
           <div class="flex items-center justify-center">
                <div class="w-1/3 h-1/2 bg-teal-200 rounded-xl py-8 px-8">
                    <form action="update_user.php" method="POST">
                        <h1 class="text-center text-2xl font-bold mb-4">Pendaftaran Kartu</h1>
                        <label for="uid">UID :<br>
                            <input type="text" name="uid" class="w-full h-10 rounded-md px-2 py-1 mb-1 bg-gray-200" readonly="readonly" value="<?php echo $result['uid'];?>">
                            <p class="mb-4 text-sm opacity-50">UID bersifat permanen, tambahkan user jika terjadi kerusakan</p>
                        </label>
                        <label for="name">
                            <span>Name :</span><br/>
                            <input type="text" name="name" placeholder="Masukkan Nama" class="w-full h-10 rounded-md px-2 py-1 mb-4 focus:outline-teal-700" value="<?php echo $result['name'];?>">
                        </label>
                        <label for="no-handphone">
                            <span>No. Handphone :</span><br/>
                            <input type="text" name="phone" placeholder="Masukkan No. Handphone" class="w-full h-10 rounded-md px-2 py-1 mb-4 focus:outline-teal-700" value="<?php echo $result['phone'];?>">
                        </label>
                        <label for="address">
                            <span>Alamat :</span><br/>
                            <input type="text" name="address" placeholder="Masukkan Alamat" class="w-full h-10 rounded-md px-2 py-1 mb-4 focus:outline-teal-700" value="<?php echo $result['address'];?>">
                        </label>
                        <button type="submit" class="w-full h-12 rounded-md px-2 py-1 mt-4 bg-teal-800 text-white">Update</button>
                    </form>
                </div>
           </div>
        </div>
    </main>
</body>
</html>