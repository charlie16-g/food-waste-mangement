<?php
session_start();

// Connect to database
$connection = mysqli_connect("localhost", "root", "", "demo");

// Dummy session data for demonstration
if(!isset($_SESSION['name'])) $_SESSION['name'] = 'Admin';

// Fetch stats
$user_count = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as total FROM login"))['total'];
$donation_count = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as total FROM food_donations"))['total'];

// Fetch donations
$donations = mysqli_query($connection, "SELECT * FROM food_donations ORDER BY date DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Dashboard</title>
    <link rel="stylesheet" href="restaurants.css">
</head>
<body>
    <div class="sidebar">
        <h2>RESTAURANT</h2>
        <a href="index.php">Dashboard</a>
        <a href="add_food.php">Add Food</a>
        <a href="view_donations.php">View Donations</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <div class="top-boxes">
            <div class="top-box">
                <div>Total Donations</div>
                <span class="number"><?php echo $donation_count; ?></span>
            </div>
            <div class="top-box">
                <div>Total Users</div>
                <span class="number"><?php echo $user_count; ?></span>
            </div>
        </div>

        <div class="table-container">
            <h3>Your Food Donations</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Food</th>
                        <th>Category</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($donations)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['food']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['phoneno']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><button>View</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>