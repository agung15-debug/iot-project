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
                    <a class="text-white hover:text-white px-3 py-2 rounded-md " href="./log.php">Log Presensi</a>
                    <a class="text-white hover:text-white px-3 py-2 rounded-md " href="./index.php">Ubah Mode</a>
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
                            <th scope="col" class="px-6 py-4">Time</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include "table-log.php"; while($row1 = mysqli_fetch_array($result)):;?>
                                <tr class="border-b bg-neutral-100 dark:border-white dark:bg-teal-100">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $row1[0];?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row1[1];?></td>
                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row1[2];?></td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                    <div class="h-8 w-1/2 rounded-full flex justify-center items-center text-white <?php 
                                       switch($row1[3]){
                                        case "Check In":
                                            echo "bg-green-500";
                                            break;
                                        case "Check Out":
                                            echo "bg-red-500";
                                            break;
                                        case "Late":
                                            echo "bg-orange-700";
                                            break;
                                        case "Early Leave":
                                            echo "bg-red-400";
                                            break;
                                        case "On Break":
                                            echo "bg-yellow-500";
                                            break;
                                        case "Returned":
                                            echo "bg-blue-500";
                                            break;
                                        default:
                                            echo "bg-gray-500";
                                            break;
                                       }
                                    ?>">
                                            <?php echo $row1[3];?>
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
</body>
<script>
   setTimeout(function(){
        location.reload();
}, 5000); 
</script>
</html>