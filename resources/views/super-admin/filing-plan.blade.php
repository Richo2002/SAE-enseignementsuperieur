<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/css/style.css">
    <title>Système d'Archivage Electronique</title>
    <style>
        ul,
        li,
        ol {
            list-style: none;
            text-decoration: none;
            padding-left: 15px;
        }

        .expand::before {
            cursor: pointer;
            color: #ffffffff;
            padding: 0 2.5px;
            font-family: "Font Awesome 6 Free";
            content: "\f0fe";
        }

        .collapse_::before {
            font-family: "Font Awesome 6 Free";
            content: "\f146";
            cursor: pointer;
            padding: 0 2.5px;
            color: #ffffffff;
        }

        /*.no-sign::before {
    content: none;
  }*/

        #toggleAll {
            padding: 10px 30px;
            color: #ffffffff;
            background-color: rgb(216, 27, 123);
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-bottom: 30px;
        }

        #toggleAll:hover {
            background-color: rgb(78, 61, 56);
        }

        span {
            font-weight: bold;
            cursor: pointer;
            text-align: left;
            padding: 5px 12px;
            position: relative;
            display: block;
            margin-bottom: 10px;
            width: max-content;
            justify-content: space-between;
            color: #ffffffff;
        }

        #niveau0,
        .niveau1,
        .niveau2,
        .niveau3 {
            border: none;
            border-radius: 5px;
        }

        #niveau0 {
            background-color: rgb(68, 173, 70);
        }

        .niveau1 {
            background-color: rgb(34, 88, 166);
        }

        .niveau2 {
            background-color: rgb(96, 70, 111);
        }

        .niveau3 {
            background-color: rgb(13, 110, 119);
        }

        .plan_tree, #toggleAll {
            margin-left: 150px;
            margin-top: 25px;
        }

        .sub-menu {
            display: none;
        }

        .menu-button {
            font-size: 16px;
            color: #ffffffff;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            cursor: pointer;
            outline: none;
        }

        .sub-menu.active {
            display: block;
            background-color: #ffffffff;
            color: rgb(49, 63, 65);
            border: 2px solid rgb(170, 144, 51);
            width: max-content;
            padding: 8px;
            padding-right: 20px;
            margin: 7px;
        }

        a,
        a:hover,
        a:visited {
            text-decoration: none;
        }

        .page-header {
            margin-top: 100px;
        }

        .mover {
            display: none;
        }

        .mover.active {
            display: block;
        }

        button {
            background: none;
            background-color: none;
            border: none;
            outline: none;
        }

        a {
            cursor: pointer;
        }

        .divcach {
            display: none;
        }

    </style>
</head>

<body>
    @include('layouts.nav')

    <div class="container-fluid">
        <div class="page-header">
            <h1>
                <i class="fa fa-sitemap"></i>
                Plan de classement
            </h1>
        </div>
    </div>

    <button id="toggleAll">Déplier le plan de classement</button>

    <div class="plan_tree">

        <ul id="organigram">
            <li>
                <span class="expand" id="niveau0" onclick="toggleNode(this)"> Racine du plan
                    <button class="menu-button" onclick="contextMenu('sub-menu0')">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                </span>

                <div class="sub-menu" id="sub-menu0">
                    <ol>
                        <li data-target="content1-divcach"><a href=""><i class="fa fa-plus"
                                    style="font-size: 14px;">&nbsp;</i>Ajouter</a></li>
                    </ol>
                </div>
                <ul style="display: none;">
                    @foreach ($filingPlan as $direction)
                        <li>
                            <span class="expand niveau1" onclick="toggleNode(this)"> {{ $direction->name }}
                                <button class="menu-button" onclick="contextMenu( 'sub-menu{{ $direction->id }}' )">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </span>
                            <div class="sub-menu" id="sub-menu{{ $direction->id }}">
                                <ol>
                                    <li class="parentDir" data-target="content2-divcach"
                                        data-direction-id="{{ $direction->id }}"><a href=""><i class="fa fa-plus"
                                                style="font-size: 14px;">&nbsp;</i>Ajouter</a></li>
                                    <li data-target="content4-divcach"><a href=""
                                            onclick="edit('{{ $direction->id }}', '{{ $direction->name }}', 'direction')"><i
                                                class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Modifier</a>
                                    </li>
                                </ol>
                            </div>
                        </li>


                        <ul>
                            @foreach ($direction->services as $service)
                                <li>
                                    <span class="expand niveau2" onclick="toggleNode(this)"> {{ $service->name }}
                                        <button class="menu-button"
                                            onclick="contextMenu('sub-menu1_{{ $service->id }}')">
                                            <i class="fa-solid fa-bars"></i>
                                        </button>
                                    </span>
                                    <div class="sub-menu level2" id="sub-menu1_{{ $service->id }}">
                                        <ol>
                                            <li class="parentSer" data-target="content2-divcach"
                                                data-direction-id="{{ $service->id }}"><a href=""><i
                                                        class="fa fa-plus"
                                                        style="font-size: 14px;">&nbsp;</i>Ajouter</a></li>
                                            <li data-target="content4-divcach"><a href=""
                                                    onclick="edit('{{ $service->id }}', '{{ $service->name }}', 'service')"><i
                                                        class="fa fa-wrench"
                                                        style="font-size: 13px;">&nbsp;</i>Modifier</a></li>
                                        </ol>
                                    </div>
                                </li>

                                <ul>
                                    @foreach ($service->children as $subService)
                                        <li>
                                            <span class="no-sign niveau3" onclick="toggleNode(this)">
                                                {{ $subService->name }}
                                                <button class="menu-button"
                                                    onclick="contextMenu('sub-menu2_{{ $subService->id }}')">
                                                    <i class="fa-solid fa-bars"></i>
                                                </button>
                                            </span>
                                            <div class="sub-menu" id="sub-menu2_{{ $subService->id }}">
                                                <ol>
                                                    <li data-target="content4-divcach"><a href=""
                                                            onclick="edit('{{ $subService->id }}', '{{ $subService->name }}', 'subService')"><i
                                                                class="fa fa-wrench"
                                                                style="font-size: 13px;">&nbsp;</i>Modifier</a></li>
                                                </ol>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            </li>
        </ul>

    <!--forulaire pour ajouter un sous-service-->
    <div class="flexform">
        <div class="container-fluid divcach" id="content2-divcach">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Ajout d'une sous-série</div>
                    <div class="panel-body">
                        <form class="form-horizontal row" id="plan_addService" method="POST" action="">
                            @csrf
                            <input type="hidden" id="direction_id_input" name="direction_id" value="">
                            <div class="col-xs-12">
                                <br>
                                <div class="form-group">
                                    <label for="nomServ" class="col-md-3 control-label">Saisissez :
                                        <em style="color : red">*</em></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="nomServ" name="name"
                                            value="" placeholder="Nom de la sous-série">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 pull-right">
                                        <div class="form-group">
                                            <div class="">
                                                <button type="button" class="close-button btn btn-warning"
                                                    onclick="closeForm(this)">
                                                    <i class="fa fa-times"></i> Fermer
                                                </button>
                                                <button type="submit" class="btn btn-success" title="Enregistrer"><i
                                                        class="fa fa-save"></i>
                                                    Ajouter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--forulaire pour modifier un service-->
    <div class="flexform">
        <div class="container-fluid divcach" id="content4-divcach">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Modifiation</div>
                    <div class="panel-body">
                        <form class="form-horizontal row" id="plan_ModService" method="POST" action="">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="direction_id_input" name="direction_id" value="">
                            <div class="col-xs-12">
                                <br>
                                <div class="form-group">
                                    <label for="nomServ" class="col-md-3 control-label">Nouveau nom :
                                        <em style="color : red">*</em></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="nameToModify" name="name"
                                            value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 pull-right">
                                        <div class="form-group">
                                            <div class="">
                                                <button type="button" class="close-button btn btn-warning"
                                                    onclick="closeForm(this)">
                                                    <i class="fa fa-times"></i> Fermer
                                                </button>
                                                <button type="submit" class="btn btn-success" title="Enregistrer"><i
                                                        class="fa fa-save"></i>
                                                    Modifier
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--forulaire pour ajouter un service-->
    <div class="flexform">
        <div class="container-fluid divcach" id="content1-divcach">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Ajout d'une Série</div>
                    <div class="panel-body">
                        <form class="form-horizontal row" id="plan_addDirection" method="POST"
                            action="/directions">
                            @csrf
                            <div class="col-xs-12">
                                <br>
                                <div class="form-group">
                                    <label for="getName" class="col-md-3 control-label">Saisissez :
                                        <em style="color : red">*</em></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="getName" name="name"
                                            placeholder="Nom de la série" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 pull-right">
                                        <div class="form-group">
                                            <div class="">
                                                <button type="button" class="close-button btn btn-warning"
                                                    onclick="closeForm(this)">
                                                    <i class="fa fa-times"></i> Fermer
                                                </button>
                                                <button type="submit" class="btn btn-success" title="Enregistrer">
                                                    <i class="fa fa-save"></i> Ajouter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


    <script>
        function edit(itemId, serviceName, type) {

            // Utilisez JavaScript pour pré-remplir le champ de saisie du formulaire
            const form = document.getElementById('plan_ModService');
            const nameInput = form.querySelector('#nameToModify');
            nameInput.value = serviceName;

            if (type === 'direction') {
                form.action = '/directions/' + itemId;
            }
            else if (type === 'service') {
                form.action = '/parent-services/' + itemId;
            }
            else if (type === 'subService') {

                form.action = '/child-services/'+ itemId;
            }
        }



        // Récupérer toutes les balises <li> avec l'attribut data-target
        const toggleLinks = document.querySelectorAll('[data-target]');

        // Ajouter un écouteur d'événement sur chaque lien
        toggleLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Empêcher le comportement par défaut du lien

                // Cacher tous les divs
                const hiddenDivs = document.querySelectorAll('.divcach');
                hiddenDivs.forEach(div => {
                    div.style.display = 'none';
                });

                // Afficher le div associé au lien cliqué
                const targetId = link.getAttribute('data-target');
                const divToShow = document.getElementById(targetId);
                divToShow.style.display = 'block';

                // Récupérer l'ID de la direction à partir de l'attribut data-direction-id
                const parentId = link.getAttribute('data-direction-id');

                // Modifier l'action du formulaire pour inclure l'ID de la direction
                const form = document.getElementById('plan_addService');
                const isDirection = link.classList.contains('parentDir');
                // Vérifie si le parent est une direction
                form.action = isDirection ?
                    '/directions/' + parentId + '/parent-services' :
                    '/parent-services/' + parentId + '/child-services';

            });
        });

        function closeForm(button) {
            const form = button.closest('.divcach');
            form.style.display = 'none';
        }





        document.addEventListener('click', function(event) {
            const allSubmenus = document.querySelectorAll('.sub-menu');

            // Vérifier si le clic a été effectué en dehors de tous les sous-menus actifs
            const isClickInsideSubmenu = [...allSubmenus].some(submenu => {
                return submenu.contains(event.target);
            });

            // Si le clic a été effectué en dehors de tous les sous-menus actifs, ils seront masqués
            if (!isClickInsideSubmenu) {
                allSubmenus.forEach(submenu => {
                    submenu.classList.remove('active');
                });
            }
        });

        function change() {
            const allMovers = document.querySelector('.mover');
            allMovers.classList.toggle('active');
        }

        //ouvrir le menu contxtuel
        function contextMenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            submenu.classList.toggle('active');

            const allSubmenus = document.querySelectorAll('.sub-menu');
            allSubmenus.forEach(item => {
                if (item !== submenu) {
                    item.classList.remove('active');
                }
            })
        }

        //au clic du burger l'élément ne se déplie pas
        const allInnerButtons = document.querySelectorAll('.menu-button');

        allInnerButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });


        function toggleNode(element) {
            const childList = element.parentNode.querySelector('ul');
            if (childList) {
                if (childList.style.display === 'none' || childList.style.display === '') {
                    childList.style.display = 'block';
                    element.classList.remove('expand');
                    element.classList.add('collapse_');
                } else {
                    childList.style.display = 'none';
                    element.classList.remove('collapse_');
                    element.classList.add('expand');
                }
            }
            updateToggleButton();
        }

        function updateToggleButton() {
            const expandButtons = document.querySelectorAll('.expand');
            const collapseButtons = document.querySelectorAll('.collapse_');
            const allNodes = [...expandButtons, ...collapseButtons];
            const allExpanded = allNodes.every(button => button.classList.contains('collapse_'));

            const toggleAllButton = document.getElementById('toggleAll');
            toggleAllButton.textContent = allExpanded ? 'Replier le plan de classement' : 'Déplier le plan de classement';
        }

        document.getElementById('toggleAll').addEventListener('click', function() {
            const expandButtons = document.querySelectorAll('.expand');
            const collapseButtons = document.querySelectorAll('.collapse_');
            const allNodes = [...expandButtons, ...collapseButtons];
            let shouldExpand = false;

            allNodes.forEach(button => {
                const childList = button.parentNode.querySelector('ul');
                if (shouldExpand || (childList && childList.style.display !== 'block')) {
                    shouldExpand = true;
                }
            });

            allNodes.forEach(button => {
                const childList = button.parentNode.querySelector('ul');
                if (shouldExpand) {
                    if (childList) {
                        childList.style.display = 'block';
                    }
                    button.classList.remove('expand');
                    button.classList.add('collapse_');
                } else {
                    if (childList) {
                        childList.style.display = 'none';
                    }
                    button.classList.remove('collapse_');
                    button.classList.add('expand');
                }
            });

            updateToggleButton();
        });
    </script>
    <script src="/js/script.js"></script>
</body>

</html>
