<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="<?= DIRCSS ?>backoffice.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <!--<img src="--><?//= DIRIMG ?><!--FaturaPlus_Logo_Oficial.png" alt="LogoImg" class="d-inline-block align-top nav-logo">-->
        <i class='bx bx-layer-plus bx-tada icon'></i>
        <div class="logo_name">FaturaPlus</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>

        <!--<li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>-->

        <li>
            <a href="#">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Painel Principal</span>
            </a>
            <span class="tooltip">Painel Principal</span>
        </li>
        <li>
            <a href="router.php?c=users&a=index">
                <i class='bx bx-user' ></i>
                <span class="links_name">Utilizadores</span>
            </a>
            <span class="tooltip">Utilizadores</span>
        </li>
        <li>
            <a href="router.php?c=bills&a=index">
                <i class='bx bx-spreadsheet' ></i>
                <span class="links_name">Faturas</span>
            </a>
            <span class="tooltip">Faturas</span>
        </li>
        <li>
            <a href="router.php?c=lines&a=index">
                <i class='bx bx-list-plus' ></i>
                <span class="links_name">Linhas das Faturas</span>
            </a>
            <span class="tooltip">Linhas das Faturas</span>
        </li>
        <li>
            <a href="router.php?c=products&a=index">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Produtos</span>
            </a>
            <span class="tooltip">Produtos</span>
        </li>
        <li>
            <a href="router.php?c=ivas&a=index">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Iva</span>
            </a>
            <span class="tooltip">Iva</span>
        </li>
        <li>
            <a href="router.php?c=enterprises&a=index">
                <i class='bx bxs-business'></i>
                <span class="links_name">Empresas</span>
            </a>
            <span class="tooltip">Empresas</span>
        </li>
        <li>
            <a href="router.php?c=settings&a=index">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Definições</span>
            </a>
            <span class="tooltip">Definições</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <!--<img src="profile.jpg" alt="profileImg">-->
                <div class="name_job">
                    <div class="name">Utilizador</div>
                    <div class="job">Funcionario</div>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out" ></i>
        </li>
</div>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
    });

    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
        }else {
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
        }
    }
</script>
</body>
</html>
