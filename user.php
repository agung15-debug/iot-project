<?php
    include "connection.php";

    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
        $result = mysqli_query($conn, "DELETE FROM tb_user WHERE uid='$uid'");
        header("Location: user.php");
    }

    $result = mysqli_query($conn, "SELECT * FROM tb_user");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sistem Presensi</title>
</head>
<body>
    <nav class="bg-teal-800 font-poppins">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center font-medium">
                    <a class="text-white hover:text-white px-3 py-2 rounded-md" href="./user.php">Daftar Karyawan</a>
                    <a class="text-white hover:text-white px-3 py-2 rounded-md" href="./add_card.php">Pendaftaran Kartu</a>
                    <a class="text-white hover:text-white px-3 py-2 rounded-md" href="./index.php">Ubah Mode</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
    <div class= "container mx-auto px-4 font-poppins my-4">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                        <thead
                            class="border-b bg-white font-medium dark:border-white dark:bg-teal-400">
                            <tr>
                            <th scope="col" class="px-6 py-4">UID</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">No. Handphone</th>
                            <th scope="col" class="px-6 py-4">Alamat</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row1 = mysqli_fetch_array($result)):;?>
                                <tr class="border-b bg-neutral-100 dark:border-white dark:bg-teal-100">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $row1[0];?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row1[1];?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row1[2];?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row1[3];?></td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="w-full">
                                        <div class="flex items-center">
                                            <a href="edit_user.php?uid=<?php echo $row1[0];?>">
                                                <button class="w-8 h-8 text-white bg-green-500 rounded-md flex justify-center items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
                                                </button>
                                            </a>
                                            <div class="w-4"></div>
                                            <a onclick="DeleteConfirm('<?php echo $row1[0];?>')">
                                                <button class="w-8 h-8 text-white bg-red-500 rounded-md flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                </svg>
                                                </button>
                                            </a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile;?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function DeleteConfirm(uid) {
            // confirm("Are you sure to delete the record");
            console.log(uid);
           var r =  confirm("Are you sure to delete the record");
              if(r == true){
                window.location.href = "user.php?uid="+uid;
              }
        }
    </script>
</body>
</html>