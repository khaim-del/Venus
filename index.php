<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <link rel="stylesheet" href="style.css" />
    <script src="project.js"></script>
</head>
<body>
    <?php
    // submit_form.php
    
    //header('Content-Type: application/json');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize form fields
        $name = filter_var(trim($_POST["name"]));
        $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
        $subject = filter_var(trim($_POST["subject"]));
        $message = filter_var(trim($_POST["message"]));
    
        // Check for missing fields
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            echo json_encode(["success" => false, "error" => "All fields are required."]);
            exit;
        }
    
        // Prepare email content
        $to = "your-email@example.com";  // Change to your email
        $email_subject = "New Message from $name: $subject";
        $email_body = "You have received a new message from your website contact form.\n\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Subject: $subject\n";
        $email_body .= "Message:\n$message\n";
    
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
    
        // Send the email
        if (mail($to, $email_subject, $email_body, $headers)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Failed to send email."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Invalid request method."]);
    }
   
// comments.php

$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "climate_lens";

//header('Content-Type: application/json');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed."]);
    exit;
}

// Handle POST request for new comments
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var(trim($_POST["name"]));
    $comment = filter_var(trim($_POST["comment"]));

    if (empty($name) || empty($comment)) {
        echo json_encode(["success" => false, "error" => "All fields are required."]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comment);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to save comment."]);
    }

    $stmt->close();
}

// Handle GET request for retrieving comments
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $conn->query("SELECT name, comment, created_at FROM comments ORDER BY created_at DESC");
    $comments = [];

    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    echo json_encode(["success" => true, "comments" => $comments]);
}

$conn->close();
?>
    <!-- Navigation -->
    <header>
        <nav class="navbar">
            <div class="logo">ClimateLens</div>
            <button class="menu-toggle">☰</button>
        </nav>
        <div class="hero">
            <h1>Our Solutions</h1>
            <p>Empowering Sustainable Practices</p>
            <a href="#get-involved" class="hero-btn">Get Involved</a>
        </div>
    </header>

    <!-- Solutions Section -->
    <section class="section solutions">
        <h2>Empowering Sustainable Practices</h2>
        <p>Discover our range of strategic initiatives to foster a sustainable future.</p>
        <div class="content-grid">
            <div class="content-box">
                <img src="education.jpg" alt="Education">
                <h3>Education</h3>
                <p>ClimateLens provides immersive learning experiences that equip individuals with the knowledge needed to promote sustainable practices.</p>
                <a href="#" class="btn">Get Started</a>
            </div>
            <div class="content-box">
                <img src="outreach.jpg" alt="Outreach">
                <h3>Outreach</h3>
                <p>Our outreach programs engage local communities, raising awareness and empowering them to combat climate change through collective efforts.</p>
                <a href="#" class="btn">Get Started</a>
            </div>
            <div class="content-box">
                <img src="advocacy.jpg" alt="Advocacy">
                <h3>Advocacy</h3>
                <p>Community-driven advocacy designed to highlight the importance of sustainable practices and motivate environmental responsibility.</p>
                <a href="#" class="btn">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial">
        <p>Thanks to ClimateLens, our community now has the tools and resources needed to adopt sustainable practices and effect positive change.</p>
    </section>

    <!-- Why Choose ClimateLens Section -->
    <section class="why-choose">
        <h2>Why Choose ClimateLens for Sustainability Education?</h2>
        <div class="content-grid">
            <div class="content-box">
                <h3>Community Focused</h3>
                <p>We work closely with local partners to lead engagements that resonate with the specific needs of the communities we serve.</p>
            </div>
            <div class="content-box">
                <img src="innovation.jpg" alt="Innovative Approach">
                <h3>Innovative Approach</h3>
                <p>Our innovative programs use cutting-edge technology to communicate impactful climate change messages.</p>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta">
        <h2>Join the Movement</h2>
        <p>Make your voice heard and become part of a sustainable future.</p>
        <a href="#get-involved" class="btn">Get Involved</a>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2024 ClimateLens</p>
    </footer>
</body>
</html>