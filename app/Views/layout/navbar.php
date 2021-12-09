<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #1c4094;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #FFFAFA;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 8px;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #1c4094;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #1c347c;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">✖</a>
  <br>
  <a href="<?= base_url('tentang') ?>"><i class="fas fa-bullhorn"></i>&nbsp;&nbsp;Tentang</a>
  <?php if (logged_in()) : ?>
  	<a href="<?= base_url('admin') ?>"><i class="fas fa-th-list"></i>&nbsp;&nbsp;Kelola Data</a>
	<a href="<?= base_url('logout') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Logout Admin</a>
  <?php else : ?>
	<a href="<?= base_url('registrasi') ?>"><i class="fas fa-user-edit"></i>&nbsp;Registrasi</a>
	<a href="<?= base_url('hackathon') ?>"><i class="fas fa-th-list"></i>&nbsp;&nbsp;Peserta</a>
	<a href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login Admin</a>
  <?php endif; ?>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "200px";
  document.getElementById("main").style.marginLeft = "200px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
