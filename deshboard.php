<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  display: flex;
  min-height: 100vh;
  background: #f4f6fa;
}

/* Sidebar */
.sidebar {
  width: 250px;
  background: #2a3f54;
  color: #fff;
  display: flex;
  flex-direction: column;
  padding: 20px 0;
}
.sidebar h2 {
  text-align: center;
  margin-bottom: 30px;
  font-weight: 600;
}
.sidebar a {
  padding: 15px 20px;
  text-decoration: none;
  color: #fff;
  display: block;
  transition: background 0.3s;
}
.sidebar a:hover {
  background: #1a2736;
}

/* Main */
.main {
  flex: 1;
  display: flex;
  flex-direction: column;
}

/* Topbar */
.topbar {
  background: #fff;
  padding: 15px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #ddd;
}
.topbar h1 {
  font-size: 20px;
  font-weight: 600;
}
.topbar button {
  background: #2a3f54;
  color: #fff;
  border: none;
  padding: 8px 15px;
  border-radius: 5px;
  cursor: pointer;
}
.topbar button:hover {
  background: #1a2736;
}

/* Content */
.content {
  padding: 20px;
  flex: 1;
  overflow-y: auto;
}

/* General Card */
.card {
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  text-align: center;
  transition: 0.3s;
  margin-bottom: 20px;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.2);
}

/* Grid for Materials & Forms */
.card-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 15px;
}
.card-grid .card {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  min-height: 220px;
}
.card-grid .card img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  margin-bottom: 12px;
}

/* Student cards */
.student-cards {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  margin-top: 15px;
}
.user-card {
  background: #fff;
  padding: 15px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  flex: 1;
  min-width: 250px;
  display: flex;
  align-items: center;
  gap: 15px;
  min-height: 150px;
  transition: 0.3s;
  text-decoration: none;
  color: #000;
}
.user-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.2);
  background: #f9fafc;
}
.user-card img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
}

/* Contact form */
.contact-form {
  max-width: 400px;
  margin: 40px auto;
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.contact-form h3 {
  margin-bottom: 15px;
  text-align: center;
}
.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
}
.contact-form button {
  background: #2a3f54;
  color: #fff;
  border: none;
  padding: 10px 18px;
  border-radius: 6px;
  cursor: pointer;
  width: 100%;
}
.contact-form button:hover {
  background: #1a2736;
}

/* Make <a> look like block cards */
a.card-link {
  text-decoration: none;
  color: inherit;
}

@media (max-width: 768px) {
  .sidebar { width: 200px; }
  .topbar h1 { font-size: 16px; }
}
</style>
</head>
<body>
<div class="sidebar">
  <h2>Student Panel</h2>
  <a href="#" onclick="showContent('dashboard')">Dashboard</a>
  <a href="#" onclick="showContent('details')">Student Details</a>
  <a href="#" onclick="showContent('materials')">Materials</a>
  <a href="#" onclick="showContent('forms')">Forms</a>
  <a href="#" onclick="showContent('contact')">Contact</a>
</div>

<div class="main">
  <div class="topbar">
    <h1>Welcome, Student</h1>
    <a href="https://aucs.free.nf/">
    <button onclick="logout()">Logout</button>
    </a>
  </div>
  <div class="content" id="content-area"></div>
</div>

<script>
function showContent(section) {
  const content = document.getElementById("content-area");
  let html = "";

  if(section === "dashboard"){
    html = `
      <div class="card">
        <h1>ANNAMALAI <samp><img src="123.png" alt=""></samp> UNIVERSITEY</h1>
          <h2>Department of Computer Science and Engineering</h2>
          <h3>B.E.(Computer Science and Engineering)</h3>
          <style>
              img{
                  width:90px;
                  height: 70px;
              }
      </style>
      </div>
      <div class="card">
        <h1>Computer Science & Engineering</h1>
      </div>
    `;
  }
  else if(section === "details"){
    html = `
      <h3>Student Details</h3>
      <div class="student-cards">
        <a href="m.html" class="user-card card-link">
          <img src="img1.jpg" alt="Student Photo">
          <div class="info"><h3>Student details</h3></div>
        </a>
        <a href="m.html" class="user-card card-link">
          <img src="img2.png" alt="Student Photo">
          <div class="info"><h3>Letter format</h3></div>
        </a>
      </div>
    `;
  }
  else if(section === "materials"){
    html = `
      <h3>Materials</h3>
      <div class="card-grid">
        <a href="m.html" class="card card-link"><img src="img2.png" alt="Material"><h4>Mathematics Notes</h4></a>
        <a href="m.html" class="card card-link"><img src="img2.png" alt="Material"><h4>Operating Systems Slides</h4></a>
        <a href="m.html" class="card card-link"><img src="img2.png" alt="Material"><h4>Discrete Math Handouts</h4></a>
      </div>
    `;
  }
  else if(section === "forms"){
    html = `
      <h3>Forms</h3>
      <div class="card-grid">
        <a href="m.html" class="card card-link"><img src="img2.png" alt="Material"><h4>Exam Form</h4></a>
        <a href="m.html" class="card card-link"><img src="img2.png" alt="Material"><h4>Hostel Form</h4></a>
        <a href="m.html" class="card card-link"><img src="img2.png" alt="Material"><h4>Scholarship Form</h4></a>
      </div>
    `;
  }
  else if(section === "contact"){
    html = `
      <div class="contact-form">
        <h3>Contact Us</h3>
        <input type="text" placeholder="Enter your name">
        <input type="email" placeholder="Enter your email">
        <textarea rows="4" placeholder="Enter your message"></textarea>
        <button>Send Message</button>
      </div>
    `;
  }

  content.innerHTML = html;
}

function logout(){ alert("You have logged out!"); }
window.onload = function(){ showContent('dashboard'); };
</script>
</body>
</html>
