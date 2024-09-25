<?php
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="Pixel-logo.jpg" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="skill.html">Skills</a></li>
        <li><a href="portfolio.html">Portfolio</a></li>
        <li><a href="contactUs.html">Contact</a></li>
    </ul>
</nav>

<header>
    <h1>Contact Us</h1>
</header>
<main>
    <section class="contact-form">
        <h2>Request a Photographer Appointment</h2>
        <form action="" method="POST"> 
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="desired-photographer">Photographer</label>
            <select id="desired-photographer" name="desired-photographer">
                <option value="">Select a Photographer</option>
                <option value="Shizuka Rai">Shizuka Rai</option>
                <option value="Nobita Kafle">Nobita Kafle</option>
                <option value="Doraemon Gurung">Doraemon Gurung</option>
            </select>

            <label for="photography-type">Theme</label>
            <select id="photography-type" name="photography-type">
                <option value="">Select a Theme</option>
                <option value="Wedding">Wedding</option>
                <option value="Commercial">Commercial</option>
                <option value="Portrait">Portrait</option>
                <option value="Fashion">Fashion</option>
                <option value="Other">Other (please specify)</option>
            </select>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>

            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time</label>
            <input type="time" id="time" name="time" required>

            <label for="message">Description</label>
            <textarea id="message" name="message"></textarea>

            <button type="submit">Submit</button>
        </form>
    </section>
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h5>About Us</h5>
            <p>Pixels Photo Studio is a professional photography business dedicated to capturing the essence of moments through a blend of creativity, technology, and personalized service. Our studio is equipped with state-of-the-art photography equipment and a team of experienced photographers who specialize in various photography genres, including portrait, event, commercial, and fine art photography.</p>
        </div>
        <div class="footer-section">
            <h5>Quick Links</h5>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h5>Copyright</h5>
            <p>&copy; 2024 All Rights Reserved.
                All content, including but not limited to photographs, images, text, graphics, logos, icons, and design elements on this website, is the property of Pixels Photo Studio and is protected by international copyright laws. Unauthorized use, reproduction, or distribution of any content from this website is strictly prohibited without prior written permission from Pixels Photo Studio.
            </p>
        </div>
    </div>
</footer>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $desired_photographer = mysqli_real_escape_string($conn, $_POST["desired-photographer"]);
    $photography_type = mysqli_real_escape_string($conn, $_POST["photography-type"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

  
    $sql = "INSERT INTO contactus (name, phone, email, desired_photographer, photography_type, 
    location, date, time, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $name, $phone, $email, $desired_photographer, 
    $photography_type, $location, $date, $time, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for submitting the form!');</script>";
    } else {
        echo "<script>
        alert('Error submitting the form: ". $conn->error ."');
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
