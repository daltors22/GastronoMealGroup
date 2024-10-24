<header>
    <nav id="headerMobile" class="tp">
        <div class="imgLogoNav">
            <img src="images/G-meal-3.png" alt="logo" href="home.html"/>
        </div>
        <div class="lienNav">
            <div class="lien">
                <a href="index.php">Menu</a>
                <a href="#">Contact</a>
            </div>
            <div class="buttonNav">
                <a href="login.php"> <button class="btnWhite buttonNavig">Connexion</button></a>
                <a href="register.php"> <button class="btnBlack buttonNavig">Inscription</button></a>
            </div>
            <div class="iconeMenuMobile" @click="showTheMenuMobile">
                <img src="images/icoMenu.png" alt="icone menu mobile" class="imgIconeMenuMobile">
            </div>
            <div class="contentMenuMobile" :class="{ active: isMenuMobileShow }">
               
                <div class="Menu1Mobile"></div>
                <div class="Menu2Mobile"></div>
                <div class="Menu3Mobile"></div>
            </div>
        </div>
    </nav> 
</header>