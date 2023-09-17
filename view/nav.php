<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">

                <div class="topmenu">

                <div class="logo"><img width="50px" src="plugins/images/automation.png" alt="home" /><h1>ERP Alvaro Iglesias</h1></div>

                <li class="ocultar">Has iniciado sesión como: <?php echo $sesion_role;?></li>
                <a href="cerrarsesion.php"> Cerrar sesion  <img width="30px" src="images/log-out.png" alt=""></a> 
                </div>
                
            </div>
</nav>

        <style>

            .navbar-header {
                background-color: purple !important;
            }

            h1{

                font-size: 20px;

            }

            .navbar-header .logo{
                gap: 10px;
                display: flex;
                height: 50px;
                align-items: center;
            }

            .topmenu{
                margin-left: 20px;
                margin-right: 20px;
                color: white;
                display: flex;
                height: 60px;
                justify-content: space-between;
                align-items: center;

            }

            .topmenu a{

                color: white;

            }
            .flexear{

                display: flex;
                align-items: center;
                
            }

            @media (max-width: 700px) {
                .ocultar{
                    display: none;
                }
            }
        </style>
      