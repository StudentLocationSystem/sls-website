<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Student Location System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../components/style_header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
    
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">  
                <a href="#">
                    <img src="../../assets/image/sls_logo.png" width="50px" style="margin-top: 10px;">
                </a>
            </h3> 
            <label for="sidebar-toggle" class="ti-menu-alt" style="cursor: pointer;"></label>
        </div>
        
        <div class="sidebar-menu">
            <ul>
            <a href="../home/home.php">
                <li>
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                </li>
                </a>
                <a href="../class/class.php">
                <li>     
                    <i class="fas fa-list"></i>
                    <span>Salas</span>
                </li>
                </a>
                <a href="">
                <li>
                        <i class="fas fa-map"></i>
                        <span>Mapeamentos</span>
                </li>
                </a>
                <a href="../../models/logout.php">
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </li>
                </a>
            </ul>
        </div>
    </div>
    
    
   