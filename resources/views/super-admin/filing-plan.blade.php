<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="stylesheet" href="/css/style.css">
<title>Système d'Archivage Electronique</title>
<style>

ul, li, ol{
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

  #toggleAll{
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

  #toggleAll:hover{
    background-color: rgb(78, 61, 56);
  }

  span{
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

#niveau0, .niveau1, .niveau2, .niveau3{
  border: none;
  border-radius: 5px;
}
#niveau0{
  background-color: rgb(68, 173, 70);
}

.niveau1{
  background-color: rgb(34, 88, 166);
}

.niveau2{
  background-color: rgb(96, 70, 111);
}

.niveau3{
  background-color: rgb(13, 110, 119);
}

.wrapper-tree{
    margin-left: 150px;
    margin-top: 25px;
  }

  .sub-menu{
    display: none;
  }

  .menu-button{
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

  .sub-menu.active{
    display: block;
    background-color: #ffffffff;
    color: rgb(49, 63, 65);
    border: 2px solid rgb(170, 144, 51);
    width: max-content;
    padding: 8px;
    margin: 7px;
    padding-left: 0;
  }
a, a:hover, a:visited{
  text-decoration: none;
}

.page-header{
  margin-top: 100px;
}
</style>
</head>
<body>
  <div class="navbar">
    <div><img alt="Logo du Ministère de l'eau et des mines" src="./presentation/img/sceauBenin.png" class="logo"></div>
    <div class="menu-burger" onclick="toggleMenu()"><i class="fa-solid fa-bars" style="color: #ffffff; "></i></div>
    @include('layouts.nav')
</div>

<div class="container-fluid">
  <div class="page-header">
    <h1>
        <i class="fa fa-sitemap"></i>
        Plan de classement
    </h1>
  </div>
</div>

<div class="wrapper-tree">
  <button id="toggleAll">Déplier le plan de classement</button>
  <ul id="organigram">
    <li>
      <span class="expand" id="niveau0" onclick="toggleNode(this)"> Ministère
                  <button class="menu-button" onclick="contextMenu('sub-menu0')">
                    <i class="fa-solid fa-bars"></i>
                  </button>

      </span>
      <div class="sub-menu" id="sub-menu0">
        <ol>
          <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter une direction</a></li>
          <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
          <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
          <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le ministère</a></li>
        </ol>
      </div>
      <ul style="display: none;">
        <li>
          <span class="expand niveau1" onclick="toggleNode(this)"> Direction 1
            <button class="menu-button" onclick="contextMenu('sub-menu1')">
              <i class="fa-solid fa-bars"></i>
            </button>
          </span>
          <div class="sub-menu" id="sub-menu1">
            <ol>
              <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un service</a></li>
              <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
              <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
              <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer la direction</a></li>
            </ol>
          </div>

          <ul style="display: none;">
            <li>
              <span class="expand niveau2" onclick="toggleNode(this)"> Service 1
                <button class="menu-button" onclick="contextMenu('sub-menu2')">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </span>
              <div class="sub-menu" id="sub-menu2">
                <ol>
                  <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un sous-service</a></li>
                  <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                  <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                  <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le sous-service</a></li>
                </ol>
              </div>

              <ul style="display: none;">
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 1</span>
                </li>
              </ul>
            </li>
            <li>
              <span class="expand niveau2" onclick="toggleNode(this)"> Service 2
                <button class="menu-button" onclick="contextMenu('sub-menu3')">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </span>
              <div class="sub-menu" id="sub-menu3">
                <ol>
                  <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un sous-service</a></li>
                  <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                  <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                  <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le sous-service</a></li>
                </ol>
              </div>
            </li>
            <li>
              <span class="expand niveau2" onclick="toggleNode(this)"> Service 3
                <button class="menu-button" onclick="contextMenu('sub-menu4')">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </span>
              <div class="sub-menu" id="sub-menu4">
                <ol>
                  <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un sous-service</a></li>
                  <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                  <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                  <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le sous-service</a></li>
                </ol>
              </div>

              <ul style="display: none;">
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 1</span>
                </li>
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 2</span>
                </li>
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 3</span>
                </li>
              </ul>
            </li>
            <li>
              <span class="expand niveau2" onclick="toggleNode(this)"> Service 4
                <button class="menu-button" onclick="contextMenu('sub-menu5')">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </span>
              <div class="sub-menu" id="sub-menu5">
                <ol>
                  <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un sous-service</a></li>
                  <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                  <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                  <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le sous-service</a></li>
                </ol>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <span class="expand niveau1" onclick="toggleNode(this)"> Direction 2
            <button class="menu-button" onclick="contextMenu('sub-menu6')">
              <i class="fa-solid fa-bars"></i>
            </button>
          </span>
            <div class="sub-menu" id="sub-menu6">
              <ol>
                <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un service</a></li>
                <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer la direction</a></li>
              </ol>
            </div>

          <ul style="display: none;">
            <li>
              <span class="expand niveau2" onclick="toggleNode(this)"> Service 1
                <button class="menu-button" onclick="contextMenu('sub-menu7')">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </span>
                <div class="sub-menu" id="sub-menu7">
                  <ol>
                    <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un sous-service</a></li>
                  <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                  <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                  <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le sous-service</a></li>
                  </ol>
                </div>

              <ul style="display: none;">
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 1</span>
                </li>
              </ul>
            </li>
            <li>
              <span class="expand niveau2" onclick="toggleNode(this)"> Service 2
                <button class="menu-button" onclick="contextMenu('sub-menu8')">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </span>
                <div class="sub-menu" id="sub-menu8">
                  <ol>
                    <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un sous-service</a></li>
                  <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                  <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                  <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer le sous-service</a></li>
                  </ol>
                </div>

              <ul style="display: none;">
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 1</span>
                </li>
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 2</span>
                </li>
                <li>
                  <span class="no-sign niveau3" onclick="toggleNode(this)">Sous-service 3</span>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <!--<span class="no-sign"></span>-->
          <span class="expand niveau1" onclick="toggleNode(this)"> Direction 3
            <button class="menu-button" onclick="contextMenu('sub-menu9')">
              <i class="fa-solid fa-bars"></i>
            </button>
          </span>
            <div class="sub-menu" id="sub-menu9">
              <ol>
                <li><a href=""><i class="fa fa-plus" style="font-size: 14px;">&nbsp;</i>Ajouter un service</a></li>
                <li><a href=""><i class="fa fa-share" style="font-size: 14px;">&nbsp;</i>Déplacer</a></li>
                <li><a href=""><i class="fa fa-wrench" style="font-size: 13px;">&nbsp;</i>Options avancées</a></li>
                <li><a href=""><i class="fa fa-trash-can" style="font-size: 13px;">&nbsp;</i>Supprimer la direction</a></li>
              </ol>
            </div>
        </li>
      </ul>
    </li>
  </ul>
</div>

<div>
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Ajout d'une direction, d'un service ou d'un sous-service</div>
                    <div class="panel-body">
                        <form class="form-horizontal row" id="plan_addService">
                            <div class="col-xs-12">
                                <br><div class="form-group">
                                    <label for="direction" class="col-md-3 control-label">Sélectionnez une direction : <em style="color : red">*</em></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="direction" name="direction">
                                            <option value="dir1">Direction 1</option>
                                            <option value="dir2">Direction 2</option>
                                            <option value="dir3">Direction 3</option>
                                          </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="service" class="col-md-3 control-label">Sélectionnez un service : <em style="color : red">*</em></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="service" name="direction">
                                            <option value="ser1">Service 1</option>
                                            <option value="ser">Service 2</option>
                                            <option value="ser">Service 3</option>
                                          </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="getName" class="col-md-3 control-label">Entrer le nom du service à ajouter : <em style="color : red">*</em></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="getName" name="getName" placeholder="nom de la direction/service/sous-service">
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-xs-6 pull-right">
                                      <div class="form-group">
                                          <div class="">
                                              <button type="button" onclick="chargerPage('planClassement.html')" class="btn btn-warning" id="userAccountCancelBtn" title="Annuler"><i class="fa fa-undo"></i> Annuler</button>
                                              <button id="user_saveUser" type="button" class="btn btn-success" title="Enregistrer"><i class="fa fa-save"></i> Enregistrer</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <span class="hide" id="securityLevel"></span>
                              <span class="hide" id="emptyOrganization_text">Aucune organisation choisie</span>
                              <span class="hide" id="badPasswordVerification_text">Les mots de passe ne correspondent pas</span>
                              <span class="hide" id="invalidEmail_text">Le courriel est mal-form&#xE9;</span>
                              <span class="hide" id="empty_text">Les champs avec une &#xE9;toile sont obligatoires</span>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

<script>
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

//au clic du burger le niveau ne defile pas
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
<script src="js/script.js"></script>
</body>
</html>
