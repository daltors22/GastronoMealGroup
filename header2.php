<header>
    <nav id="headerMobile2" class="tp2">
        <div class="imgLogoNav2">
            <img src="images/G-meal-3.png" alt="logo" href="home.html"/>
        </div>
        <div class="lienNav2">
            <div class="lien2">
                <a href="index.php">Menu</a>
                <a href="contact.php">Contact</a>
                <a href="messagerie.php">Messagerie</a>
            </div>
            <div class="buttonNav2">
                <a href="index.php"><button class="btnBlack2 buttonNavig2">Déconnexion</button></a>
            </div>
            <div class="userAvatar2">    
                <a href="profilClient.php"><img src="images/Pf-3.png" alt="Avatar utilisateur"></a>
            </div>
            <div class="iconeMenuMobile" @click="showTheMenuMobile">
                <img src="images/icoMenu.png" alt="icone menu mobile" class="imgIconeMenuMobile">
            </div>
            <div class="contentMenuMobile" :class="{ active: isMenuMobileShow }" ref="menuMobileClosed">
                <div class="Menu1Mobile">
                    <a href="index.php"><button class="btnBlack2 buttonNavig2">Déconnexion</button></a>
                </div>
                <div class="Menu2Mobile"><a href="index.php">Menu</a></div>
                <div class="Menu3Mobile"><a href="contact.php">Contact</a></div>
                <div class="Menu4Mobile"><a href="messagerie.php">Messagerie</a></div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#headerMobile2',
        
            data: {
                isMenuMobileShow: false,
            },

            methods:{
                showTheMenuMobile() {
                    this.isMenuMobileShow = true;
                },
                handleClickOutside(event) {
                    const menuMobileClosed = this.$refs.menuMobileClosed;
                    if ( !menuMobileClosed & !menuMobileClosed.contains(event.target)) {
                        this.isMenuMobileShow = false;
                        console.log('ferme');
                    }
                    console.log('ouvert');
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