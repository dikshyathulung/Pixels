<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixels</title>
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

    <div class="search-bar">
        <input type="search" id="search-input" placeholder="Search Inspiration">
        <div class="filter-sort">
            <label for="filter-by">Photos</label>
            <select id="filter-by">
                <option value="">New</option>
                <option value="name">Popular</option>
                <option value="category">Trending</option>
            </select>
        </div>
        <ul id="search-results">
        </ul>
    </div>

    <div class="gallery-container">
        <div id="gallery" class="gallery">
        </div>
        <div class="gallery-nav">
            <button class="prev-btn">Prev</button>
            <button class="next-btn">Next</button>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h5>About Us</h5>
                <p>Pixels Photo Studio is a professional photography business dedicated to
                   capturing the essence of moments through a blend of creativity, technology
                   , and personalized service. Our studio is equipped with state-of-the-art photography 
                   equipment and a team of experienced photographers who specialize in various photograph
                   y genres, including portrait, event, commercial, and fine art photography.</p>
            </div>
            <div class="footer-section">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="contactUs.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h5>Copyright</h5>
                <p>&copy; 2024 All Rights Reserved.
                    All content, including but not limited to photographs, images, text, graphics, 
                    logos, icons, and design elements on this website, is the property of Pixels Photo
                     Studio and is protected by international copyright laws. Unauthorized use, 
                     reproduction, or distribution of any content from this website is strictly 
                     prohibited without prior written permission from Pixels Photo Studio.
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function loadGallery() {
                fetch('gallery_data.json')
                    .then(response => response.json())
                    .then(data => {
                        const gallery = document.getElementById('gallery');
                        gallery.innerHTML = ''; // Clear existing items
                        data.forEach(item => {
                            const galleryItem = document.createElement('div');
                            galleryItem.classList.add('gallery-item');
                            galleryItem.innerHTML = `
                                <img src="uploads/${item.file}" alt="${item.caption}">
                                <p>${item.caption}</p>
                            `;
                            gallery.appendChild(galleryItem);
                        });
                    })
                    .catch(error => console.error('Error loading gallery:', error));
            }
            loadGallery();
        });
    </script>
</body>
</html>
