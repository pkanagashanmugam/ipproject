<?php
    $my=new mysqli("localhost","root","","project");
    $doci=$_POST['checkIn'];
    $doco=$_POST['checkOut'];
    $room=$_POST['noRooms'];
    $uname = $_POST['receivedValue'];
    $hname = $_POST['hotel'];

    $mainQuery = "SELECT email, phno FROM userreg WHERE name = ?";
    $stmt = $my->prepare($mainQuery);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // User found
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['phno'];
        $insertQuery = "INSERT INTO bookingdet (name, email, phno, checkin, checkout, rooms, hotel) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $my->prepare($insertQuery);
        $insertStmt->bind_param("sssssss", $uname, $email, $phone, $doci, $doco, $room, $hname);
        if ($insertStmt->execute()) {
            echo "BOOKING SUCCESSFUL";
        } else {
            echo "BOOKING UNSUCCESSFUL";
            header("Location: booking.html");
            exit();
        }
        $insertStmt->close();
    } else {
        echo "User not found";
    }
    $stmt->close(); 
?>
