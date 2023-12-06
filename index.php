<?php
    include "connection.php";
    $query = "SELECT * FROM tb_time";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Presensi</title>
</head>
<body class="font-poppins">
    <nav class="bg-teal-800">
        <div class="flex justify-center items-center py-8">
            <p class="text-6xl text-white">SISTEM PRESENSI</p>
        </div>
    </nav>
    <main>
    <div class="container mx-auto py-8">
           <div class="flex items-center justify-center">
                <div class="w-1/3 h-1/2 bg-teal-200 rounded-xl py-8 px-8">
                    <form action="mode.php" method="POST">
                                <div class="relative flex justify-center">
                                    <span>Mode :</span> <br/>
                                </div>
                            <label class="relative flex justify-center items-center text-xl">
                                <span>Add</span>
                                <input type="checkbox" class="absolute left-1/2 -translate-x-1/2 w-full h-full peer appearance-none rounded-md" id="toggleButton" name="mode" value="read" checked/>
                                <span class="w-16 h-10 flex items-center flex-shrink-0 ml-4 p-1 bg-gray-300 rounded-full duration-300 ease-in-out peer-checked:bg-teal-400 after:w-8 after:h-8 after:bg-white after:rounded-full after:shadow-md after:duration-300 peer-checked:after:translate-x-6"></span>
                                <div class="w-4"></div>
                                <span>Read</span>
                        </label>
                        <div id="time" class="mt-4">
                            <label for="enter">
                                <div class="relative flex justify-center">
                                    <span>Waktu Masuk :</span> <br/>
                                </div>
                                <div class="relative flex justify-center content-center px-2 py-1 mb-4">
                                    <input type="time" name="start-enter" id="start-enter" class="w-1/3 h-10 rounded-md focus:outline-teal-700 mr-4 px-2 py-1" value="<?php if(isset($result['start_enter'])){echo $result['start_enter'];}?>">
                                    <input type="time" name="end-enter" id="end-enter" class="w-1/3 h-10 rounded-md focus:outline-teal-700 px-2 py-1" value="<?php if(isset($result['end_enter'])){echo $result['end_enter'];}?>">
                                </div>
                            </label>
                            <label for="break">
                                <div class="relative flex justify-center">
                                    <span>Rentang Waktu Mulai Istirahat :</span> <br/>
                                </div>
                                <div class="relative flex justify-center content-center px-2 py-1 mb-4">
                                    <input type="time" name="start-break" id="start-break" class="w-1/3 h-10 rounded-md focus:outline-teal-700 mr-4 px-2 py-1" value="<?php if(isset($result['start_break'])){echo $result['start_break'];}?>">
                                    <input type="time" name="end-break" id="end-break" class="w-1/3 h-10 rounded-md focus:outline-teal-700 px-2 py-1" value="<?php if(isset($result['end_break'])){echo $result['end_break'];}?>">
                                </div>
                            </label>
                            <label for="returned">
                                <div class="relative flex justify-center">
                                    <span>Rentang Waktu Selesai Istirahat :</span> <br/>
                                </div>
                                <div class="relative flex justify-center content-center px-2 py-1 mb-4">
                                    <input type="time" name="start-returned" id="start-returned" class="w-1/3 h-10 rounded-md focus:outline-teal-700 mr-4 px-2 py-1" value="<?php if(isset($result['start_returned'])){echo $result['start_returned'];}?>">
                                    <input type="time" name="end-returned" id="end-returned" class="w-1/3 h-10 rounded-md focus:outline-teal-700 px-2 py-1" value="<?php if(isset($result['end_returned'])){echo $result['end_returned'];}?>">
                                </div>
                            </label>
                            <label for="leave">
                                <div class="relative flex justify-center">
                                    <span>Waktu Pulang :</span> <br/>
                                </div>
                                <div class="relative flex justify-center content-center px-2 py-1">
                                    <input type="time" name="start-leave" id="start-leave" class="w-1/3 h-10 rounded-md px-2 py-1 mb-4 focus:outline-teal-700 mr-4" value="<?php if(isset($result['start_leave'])){echo $result['start_leave'];}?>">
                                    <input type="time" name="end-leave" id="end-leave" class="w-1/3 h-10 rounded-md px-2 py-1 mb-4 focus:outline-teal-700" value="<?php if(isset($result['end_leave'])){echo $result['end_leave'];}?>">
                                </div>
                            </label>
                        </div>
                       <div class="flex justify-center">
                        <button type="submit" class="w-2/3 h-12 rounded-md px-2 py-1 mt-8 bg-teal-800 text-white">Submit</button>
                       </div>
                    </form>
                </div>
           </div>
        </div>
    </main>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#toggleButton').change(function() {
                if ($(this).is(':checked')) {
                    // Code to execute when the toggle button is checked
                    $("#time").show();
                } else {
                    // Code to execute when the toggle button is unchecked
                    $("#time").hide();
                }
            });
        });
    </script>
    
</body>
</html>
