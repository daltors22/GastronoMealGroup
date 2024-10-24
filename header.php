<header>
    <nav id="headerMobile" class="tp">
        <div class="imgLogoNav">
            <img src="images/G-meal-3.png" alt="logo" href="home.html"/>
        </div>
        <div class="lienNav">
            <div class="lien">
                <a href="index.php">Menu</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="buttonNav">
                <a href="login.php"> <button class="btnWhite buttonNavig">Connexion</button></a>
                <a href="register.php"> <button class="btnBlack buttonNavig">Inscription</button></a>
            </div>
            <div class="iconeMenuMobile" @click="showTheMenuMobile">
                <img src="images/icoMenu.png" alt="icone menu mobile" class="imgIconeMenuMobile">
            </div>
            <div class="contentMenuMobile" :class="{ active: isMenuMobileShow }" ref="menuMobileClosed">
                <div class="Menu1Mobile">
                <a href="login.php"> <button class="btnWhite buttonNavig">Connexion</button></a>
                <a href="register.php"> <button class="btnBlack buttonNavig">Inscription</button></a>
                </div>
                <div class="Menu2Mobile"><a href="index.php">Menu</a></div>
                <div class="Menu3Mobile"><a href="contact.php">Contact</a></div>
            </div>
        </div>
    </nav> 
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#headerMobile',
        
            data: {
                isMenuMobileShow: false,
            },

            methods:{
                showTheMenuMobile() {
                    this.isMenuMobileShow = true;
                },
                handleClickOutside(event) {
                    const menuMobileClosed = this.$refs.menuMobileClosed;
                    if (!menuMobileClosed && menuMobileClosed.contains(event.target)) {
                        this.isMenuMobileShow = false;
                    }
                },
            },
            mounted() {
                document.addEventListener('click', this.handleClickOutside);
            },
            beforeDestroy() {
                document.removeEventListener('click', this.handleClickOutside);
            },
        });
    </script>
</header>