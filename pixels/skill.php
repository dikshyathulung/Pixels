<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixels - Skills</title>
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

    <div class="team-row" id="team-row">
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h5>About Us</h5>
                <p>Pixels Photo Studio is a professional 
                    photography business dedicated to capturing the essence of 
                    moments through a blend of creativity, technology, and personalized
                     service. Our studio is equipped with state-of-the-art photography 
                     equipment and a team of experienced photographers who specialize 
                     in various photography genres, including portrait, event, commercial, 
                     and fine art photography.</p>
            </div>
            <div class="footer-section">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="skill.html">Skills</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contactUs.html">Contact</a></li>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('fetchphotographers.php')
                .then(response => response.json())
                .then(data => {
                    const teamRow = document.getElementById('team-row');
                    data.forEach(photographer => {
                        const photographerDiv = document.createElement('div');
                        photographerDiv.classList.add('team-member');
                        photographerDiv.innerHTML = `
                            <img src="${photographer.photo}" alt="${photographer.name}">
                            <h3>${photographer.name}</h3>
                            <p>${photographer.bio}</p>
                            <p>Tags: ${photographer.tags}</p>
                            <p>Contact: ${photographer.email}</p>
                        `;
                        teamRow.appendChild(photographerDiv);
                    });
                })
                .catch(error => console.error('Error fetching photographers:', error));
        });
    </script>
</body>
</html>
