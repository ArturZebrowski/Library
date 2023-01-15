<?php
$conn = mysqli_connect('localhost','root','','library');
$sql = "SELECT `id_user`, `Firstname`, `Lastname`, `Penalty` FROM `users`";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $id = $row['id_user'];
    $first = $row['Firstname'];
    $last = $row['Lastname'];
    $pen = $row['Penalty'];

    echo "<p>$id. $first $last, charge: $pen$</p>";
}

?>