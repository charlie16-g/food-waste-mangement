<?php
include("../connection.php");

if($connection){
    echo "Database Connected Successfully";
}
?>
<!DOCTYPE html>
<html>
<head>

<title>NGO Dashboard</title>

<link rel="stylesheet" href="ngo.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<div class="container">

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
<i class="fa-solid fa-leaf"></i>
<span>ADMIN</span>
</div>

<ul class="menu">

<li><i class="fa-solid fa-house"></i> Dashboard</li>
<li><i class="fa-solid fa-chart-column"></i> Analytics</li>
<li><i class="fa-solid fa-hand-holding-heart"></i> Donations</li>
<li><i class="fa-solid fa-message"></i> Feedback</li>
<li><i class="fa-solid fa-user"></i> Profile</li>

</ul>

<div class="sidebar-bottom">

<button onclick="toggleDarkMode()">
<i class="fa-solid fa-moon"></i> Dark Mode
</button>

<a href="#" class="logout">
<i class="fa-solid fa-right-from-bracket"></i> Logout
</a>

</div>

</div>


<!-- MAIN CONTENT -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<div class="menu-icon">
<i class="fa-solid fa-bars"></i>
</div>

<h2 class="brand">
🍏 Pure Plate
</h2>

<div class="profile">
<i class="fa-solid fa-user"></i>
</div>

</div>


<!-- LOCATION FILTER -->

<div class="filter-box">

<label>Select Location:</label>

<select id="locationFilter">

<option value="all">All</option>
<option value="Coimbatore">Coimbatore</option>
<option value="Mumbai">Mumbai</option>
<option value="Pune">Pune</option>

</select>

<button onclick="filterTable()">
Get Details
</button>

</div>


<!-- TABLE -->

<div class="table-container">

<table id="donationTable">

<thead>

<tr>

<th>Name</th>
<th>Food</th>
<th>Category</th>
<th>Phone</th>
<th>Date / Time</th>
<th>Address</th>
<th>Quantity</th>
<th>Location</th>

</tr>

</thead>

<tbody>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['food']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['datetime']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td class="location"><?php echo $row['location']; ?></td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</div>

<script src="script.js"></script>

</body>
</html>