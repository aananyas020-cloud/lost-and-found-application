<?php

include "db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['person_name'];
    $email = $_POST['email'];
    $type = $_POST['item_type'];
    $item = $_POST['item_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date = $_POST['item_date'];

    $sql = "INSERT INTO items
    (person_name, email, item_type, item_name,
    category, description, location, item_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssss",
        $name,
        $email,
        $type,
        $item,
        $category,
        $description,
        $location,
        $date
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
        alert('Item submitted successfully!');
        window.location.href='index.php';
        </script>";

    } else {
        echo "Error submitting item.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>