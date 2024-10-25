<!--
Namne: Kyle Stranick
Date: 10/25/2024
Assignment: Project 2
ITN 264-201
-->


<?php

// Function to generate the header
function generateHeader($title, $stylesheets = [])
{
  echo '

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . htmlspecialchars($title) . '</title>

    <!-- Add the Bootstrap CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Add Font Awesome css file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer">';

  foreach ($stylesheets as $stylesheet) {
    echo '<link rel="stylesheet" href="' . htmlspecialchars($stylesheet) . '">';
  }
  echo '
  </head>';
}

// Function to generate a footer
function generateFooter()
{
  echo '
  <footer class="bg-dark text-light py-4 mt-5">
  <div class="container text-center">
    <p>&copy; 2024 Pizza Byte. All Rights Reserved.</p>
    <p>Powered by Kyle Stranick\'s PHP Services inc. All Rights Reserved.</p>
  </div>
  </footer>

  <!-- Add the Bootstrap JS file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  ';
}
