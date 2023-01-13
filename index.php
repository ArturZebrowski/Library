<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Told - Borrow a book!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" id="href">
    <header>
        <img src="assets/logo.webp" alt="Told">
    </header></a>

    <nav>
        <h2>The first month of renting a book<br>
            <strong>for free</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;$10 each subsequent month</h2>
        <span></span>
        <a class="rent" href="#smooth">
            <h1>RENT</h1>
            <img src="assets/arrow-right.webp" alt="">
        </a>
    </nav>

    <main>
        <?php
        //wyswietlanie ksiazek
            $conn = mysqli_connect('localhost','root','','library');
            $sql = 'SELECT `id_book`,`Title`,`Author`,`Release_date`,`Available`,`image` FROM `books`';
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)) {
                $id = $row['id_book']+2137;
                $title = $row['Title'];
                $author = $row['Author'];
                $release_date = $row['Release_date'];
                $status = $row['Available'];
                $image = $row['image'];

                echo "<div class='select'>";
                echo "<p> <img src='$image' alt='$title' id='image'> </p>";
                echo "<p> ISBN: $id<br> Title: $title<br> Author: $author<br> Release date: $release_date<br> <span id='status'>$status</span><br></p>";
                echo "</div>";
            }
            ?>
    </main>

    <section id="smooth">
        <form action="index.php" method="POST">
            <div class="container1">
                <input type="text" name="user" placeholder="Enter your ID"><br>
                <input type="text" name="isbn" placeholder="The ISBN number">
            </div>
            <div class="container2">
                <span id="dot1"></span>
                <span id="dot2"></span>
            </div>
            <div class="container3">
                <button id="rent" name="rent">RENT</button>

                <button id="return" name="return">RETURN</button>
            </div>
            <?php
            //wypozyczenie ksiazki
                if(isset($_POST['rent']) && (!empty($_POST['user'])) && (!empty($_POST['isbn'])) && (is_numeric($_POST['isbn']))) {
                    $user=$_POST["user"];
                    $isbn=$_POST["isbn"]-2137;

                    $sql1="INSERT INTO `borrow` (`id_borrow`,`id_user`,`id_book`,`Rental_date`,`Delivery_date`) VALUES ('','$user', '$isbn', NOW(), NULL);";
                    $sql2="UPDATE `books` SET `Available`='unavailable' WHERE `id_book`=$isbn;";
                    $res1=mysqli_query($conn, $sql1);
                    $res2=mysqli_query($conn, $sql2);

                        echo "<meta http-equiv='refresh' content='10'>";
                        echo "<p>Information about your order can be found on the e-mail provided when creating an account</p>";

                }else if(isset($_POST['rent'])){
                    echo "<p>Fill in the fields</p>";
                }

            //oddanie ksiazki
                if(isset($_POST['return']) && (!empty($_POST['user'])) && (!empty($_POST['isbn'])) && (is_numeric($_POST['isbn']))) {
                    $user=$_POST["user"];
                    $isbn=$_POST["isbn"]-2137;
    
                    $sql3="UPDATE `borrow` SET `Delivery_date`=NOW() WHERE `id_user`=$user AND `id_book`=$isbn;";
                    $sql4="UPDATE `books` SET `Available`='available' WHERE `id_book`=$isbn;";
                    $res3=mysqli_query($conn, $sql3);
                    $res4=mysqli_query($conn, $sql4);
    
                        echo "<meta http-equiv='refresh' content='10'>";
                        echo "<p>Thank you for using our services, more information will be sent by e-mail</p>";

                }else if(isset($_POST['return'])) {
                    echo "<p>Fill in the fields</p>";
                }

                if(isset($_POST['return']) && (!empty($_POST['user'])) && (!empty($_POST['isbn'])) && (is_numeric($_POST['isbn']))) {
                    $user=$_POST["user"];
                    $isbn=$_POST["isbn"]-2137;
                    
                    $sqlhide1="SELECT `Delivery_date` FROM `borrow` WHERE `id_user`=$user AND `id_book`=$isbn;";
                    $reshide1=mysqli_query($conn, $sqlhide1);

                    $sqlhide2="SELECT `Rental_date` FROM `borrow` WHERE `id_user`=$user AND `id_book`=$isbn;";
                    $reshide2=mysqli_query($conn, $sqlhide2);

                    $rowhide1=mysqli_fetch_assoc($reshide1);
                    $rowhide2=mysqli_fetch_assoc($reshide2);

                    $date1 = new DateTime($rowhide1['Delivery_date']);
                    $date2 = new DateTime($rowhide2['Rental_date']);

                    $diff = $date1->diff($date2);
                    $penalty = ($diff->y * 12) + $diff->m;
                }

                if(isset($_POST['return']) && (!empty($_POST['user'])) && (!empty($_POST['isbn']))  && (is_numeric($_POST['isbn'])) && $diff->invert == 1) {
                    $user=$_POST["user"];
                    $isbn=$_POST["isbn"]-2137;

                    $sql5="UPDATE `users` SET `Penalty`=`Penalty`+($penalty*10) WHERE `id_user`=$user;";
                    $res5=mysqli_query($conn, $sql5); 
                }
            ?>
        </form>
    </section>

    <footer>
                <p>Author: Artur Żebrowski C7</p>
                <a href="library.sql" download>Download database</a>
    </footer>
    
    <script src=app.js></script>
</body>
</html>