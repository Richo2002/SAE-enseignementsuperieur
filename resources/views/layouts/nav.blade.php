<div class="navbar">
    <div><img alt="Logo du Ministère de l'eau et des mines" src="/img/sceauBenin.png" class="logo"></div>
    <div class="menu-burger" onclick="toggleMenu()"><i class="fa-solid fa-bars" style="color: #ffffff; "></i></div>
    <ul class="menu">
        <li class="navbar-links"><a href="/dashboard">Accueil</a></li>


        <li class="navbar-links">
            <a href="#" onclick="toggleSubmenu('submenu-gestion')">
                <i class="fa-solid fa-gear" style="color: #ffffff; font-size: 13px;"></i> Gestion
                <i class="fa-solid fa-caret-down" style="color: #ffffff; font-size: 13px;"></i>
            </a>
            <ul class="submenu" id="submenu-gestion">
                @if (Auth::user()->type=="Archiviste")
                    <li>
                        <a href="archiviste.html">
                            <i class="fa-solid fa-plus" style="color: #ffffff; font-size: 13px;"></i> Archiviste
                        </a>
                    </li>
                @endif
                <li>
                    <a href="journal.html">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff; font-size: 13px;"></i>
                        Journal des activités
                    </a>
                </li>
                <li>
                    <a href="/filing-plan">
                        <i class="fa-solid fa-sitemap" style="color: #ffffff;  font-size: 13px;"></i> Plan de
                        classement
                    </a>
                </li>
                <li>
                    <a href="archivists">
                        <i class="fa-solid fa-users" style="color: #ffffff;   font-size: 13px;"></i>
                        Utilisateurs
                    </a>
                </li>
                <li>
                    <a href="gestionarchive.html">
                        <i class="fa-solid fa-list-check" style="color: #ffffff; font-size: 13px;"></i>
                        Gestion des archives
                    </a>
                </li>
                <li>
                    <a href="statistiques.html">
                        <i class="fa-regular fa-file-lines" style="color: #ffffff; font-size: 13px;"></i> Rapports
                        statistiques
                    </a>
                </li>

            </ul>
        </li>



        <li class="navbar-links">
            <a href="#" onclick="toggleSubmenu('submenu-username')">
                <i class="fa-solid fa-user-plus" style="color: #ffffff; font-size: 13px;"></i>
                {{ Auth::user()->lastname }}
                <i class="fa-solid fa-caret-down" style="color: #ffffff; font-size: 13px;"></i>
            </a>
            <ul class="submenu" id="submenu-username">
                <li>
                    <a href="myprofile.html">
                        <i class="fa-solid fa-user" style="color: #ffffff; font-size: 13px;"></i> Profil</a>
                    </li>
                @if (Auth::user())
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" >
                                <i class="fa-solid fa-right-from-bracket" style="color: #ffffff; font-size: 13px;"></i>
                                Déconnexion
                            </button>
                        </form>

                    </li>
                @endif
            </ul>
        </li>
    </ul>
</div>
