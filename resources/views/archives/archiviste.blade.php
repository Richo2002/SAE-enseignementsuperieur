<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta class="datePicker" data-datepicker-id="ryyp8n-773m-7vm15o">
    <link href="/css/bootstrap-toggle/bootstrap-toggle.css" rel="stylesheet" data-auto="1">
    <link href="/css/bootstrap-datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet" data-auto="1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <script src="/js/jQuery-3.4.1/jquery-3.4.1.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/jQueryUI_1.12.1/jquery-ui.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/DataTables/datatables.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/jQueryUI_touch-punch_1.0.7/jquery.ui.touch-punch.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/less_1.7.0/less.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/bootstrap_3.1.1/all.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/metisMenu_1.0.1/metisMenu.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/dataForm_0.0.1/dataForm.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/gritter/gritter.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/gritter/gritter.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/typeahead_0.11.1/typeahead.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/konami-code/jquery.raptorize.1.0.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/bootstrap-tree/bootstrap-tree.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/dataList_0.0.1/dataList.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/datePicker/bootstrap-datepicker.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/moment_2.14.1/moment.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/dateTimePicker/bootstrap-datetimepicker.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/csrf/csrfprotector.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/bootstrap-toggle/bootstrap-toggle.min.js" type="text/javascript" data-auto="1"></script>
    <script src="/js/datePicker/locales/bootstrap-datepicker.fr.js" type="text/javascript" data-auto="1"></script>
    <title>Système d'Archivage Electronique</title>

    <script>
        $(document).ready(function() {
            $('*[data-datepicker-id="ryyp8n-773m-7vm15o"]').datepicker(DatePickerParams);
        });
    </script>

        <style>
            .archiveInfos table {
                border-collapse: collapse;
                border: 1px solid black;
                border-radius: 7px;
                width: max-content;
                margin: 20px auto;
            }

            .archiveInfos th, .archiveInfos td {
                border: none;
                border-left: 1px solid black;
                text-align: left;
                padding: 8px;
            }

            .archiveInfos th {
                background-color: rgb(200, 200, 244);
                height: 50px;
            }

            .archiveInfos tr:nth-child(even) {
                background-color: rgb(200, 200, 244);
                border-bottom: 1px solid black;
            }

            .archiveInfos td {
                border-left: 1px solid black;
            }
            .archiveInfos tr:nth-child(odd) {
                background-color: #f2f2f2;

                border-bottom: 1px solid black;
            }

            .archiveInfos .bold{
                font-weight: bold;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Arrière-plan semi-transparent */
                z-index: 9999999999;
            }

            @media screen and (max-width: 875px) {
                .archiveInfos table {
                    border-collapse: collapse;
                    border: 1px solid black;
                    border-radius: 7px;
                    width: max-content;
                    margin: 5px auto;
                }
            }

            .alert-danger {
                position: fixed;
                top: 100px;
                right: 0px;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            }

        </style>

    </head>

    <body>
        @include('layouts.nav')

        <div id="contain">
            <div class="container-fluid" data-translate-catalog="auth/messages">
            <div class="page-header" style="margin-top: 100px;">
                <h1>
                    <i class="fa-regular fa-file-zipper"></i>
                    Manipulation des archives
                </h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Espace de recherche sur les archives</div>
                        <div class="panel-body">
                            <form class="form-horizontal row" id="user_userAccountForm" method="POST" action="{{ route('archives.search') }}">
                                @csrf
                                <div class="col-xs-12">
                                    <br>
                                    <div class="form-group">
                                        <label for="searchBy" class="col-md-3 control-label">Rehercher par :
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="searchBy" name="searchBy">
                                                <option value="call_number">Cote</option>
                                                <option value="parent_name">Série</option>
                                                <option value="child_name">Sous-série</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="searchValue" class="col-md-3 control-label">Motif de recherche :
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="searchValue" name="searchValue" placeholder="saisissez votre motif de recherche">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateDebut" class="col-md-3 control-label">Date d'archivage après :</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control" id="dateDebut" name="dateDebut">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateEnd" class="col-md-3 control-label">Date d'archivage avant :</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control" id="dateEnd" name="dateEnd">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-6 pull-right">
                                        <div class="form-group">
                                            <div >
                                                <button id="searchValider" type="submit" class="btn btn-success" title="Rechercher des archives">
                                                    <i class="fa fa-search"></i> Rechercher
                                                </button>
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

        <div class="container-fluid" data-translate-catalog="auth/messages">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading clearfix">

                            <div class="pull-left">
                                <h4>Archives ({{ count($filteredArchives) }})</h4>
                            </div>
                            <div class="pull-right">
                                <a href="/archives/create" type="button" class="btn btn-default btn-sm"
                                id="newArchiveBtn" title="Ajouter"><i class="fa fa-plus"> </i> Ajouter</a>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 0;">
                            <div class="table-responsive">
                                <table class="table table-condensed dataTable no-footer"
                                id="user_userList" style="margin: 0;"
                                data-translate-catalog="auth/messages"
                                data-table-id="rz68hp-ijdr-awoavv" role="grid"
                                aria-describedby="user_userList_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 100.25px;">Id</th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="user_userList" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Identifiant: activer pour trier la colonne en descendant"
                                                style="width: 175.25px;">Cote</th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="user_userList" rowspan="1"
                                                colspan="1"
                                                aria-label="Courriel: activer pour trier la colonne en ascendant"
                                                style="width: 325.25px;">Série</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Activé" style="width: 300.139px;">
                                                Sous-série</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Activé" style="width: 280.139px;">
                                                Analyse</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="role"
                                                class="sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="statut"
                                                style="width: 310.139px;">Date d'archivage</th>
                                            <th class="sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="actions"
                                                style="min-width: 175px; width: 175.139px; text-align: center;">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($filteredArchives) != 0)
                                            @php
                                                $numero=1
                                            @endphp
                                            @foreach ($filteredArchives as $archive)
                                                <tr id="{{ $archive->id }}" role="row">
                                                    <td> {{ $numero++ }} </td>
                                                    <td>{{ $archive->call_number }}</td>
                                                    <td>{{ $archive->service->direction->name }}</td>
                                                    <td>{{ $archive->service->name }}</td>
                                                    <td>{{ $archive->analyze }} </td>
                                                    <td>{{ $archive->created_at->addYears($archive->duree)->format('d-m-Y') }}</td>
                                                    <td>
                                                        <div id="actionButtons" class="btn-group pull-right">

                                                            <a href="#infos_archiveID{{ $archive->id }}"
                                                                class="editUser btn btn-info show-archive-info"
                                                                data-accountid="ccamus" title="Voir plus d'informations"
                                                                data-info-id="{{ $archive->id }}">
                                                                <span class="fa fa-fw fa-info"></span>
                                                            </a>

                                                            <a href="{{ route('files.view', $archive) }}" class="btn  btn-info"
                                                                title="Voir les fichiers"  style="margin-left:5px;">
                                                                <span class="fa fa-fw fa-eye"></span>
                                                            </a>

                                                            <a href="{{ route('archives.download', $archive) }}" class="btn  btn-info"
                                                                title="Télécharger les fichiers"  style="margin-left:5px;">
                                                                <span class="fa-solid fa-download"></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" style="text-align: center;">Aucun enregistrement disponible.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" id="error-message">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif



<div>
    @if(count($filteredArchives) != 0)
        @foreach ($filteredArchives as $archive)
            @if ($archive->id )
                <div class="overlay" id="overlay">
                    <div class="info-content" id="info-content">
                        <div  class="archiveInfos" id="infos_archiveID{{ $archive->id }}">

                            <table>
                                <thead>
                                    <th class="bold">Métadonnées de gestion</th>
                                    <th>Valeur pour l'archive</th>
                                </thead>
                                <tr>
                                    <td class="bold">Cote</td>
                                    <td class="sorting_1">{{ $archive->call_number }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Série</td>
                                    <td>{{ $archive->service->direction->name }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Sous-série</td>
                                    <td>{{ $archive->service->name }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Projet ou Programme</td>
                                    <td>{{ $archive->project }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Analyse</td>
                                    <td>{{ $archive->analyze }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Pièces jointes</td>
                                    <td>{{ $archive->piece }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Soumissionnaires</td>
                                    <td>{{ $archive->tenderer }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date extreme</td>
                                    <td>{{ $archive->extreme_date }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Observations</td>
                                    <td>{{ $archive->observation }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date de création</td>
                                    <td>{{ $archive->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Durée d'utilité administrative</td>
                                    <td>{{ $archive->duree }} ans</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date d'archivage</td>
                                    <td>{{ $archive->created_at->addYears($archive->duree) }}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Sort final</td>
                                    <td>{{ $archive->final_sort }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>


<script>


 document.addEventListener("DOMContentLoaded", function() {

        var errorMessage = document.getElementById("error-message");


        setTimeout(function() {
            errorMessage.style.display = "none";
        }, 5000); // 5000 millisecondes = 5 secondes
    });


    // Fonction pour afficher les informations d'archive
    function showArchiveInfo(archiveId) {
      var overlay = document.getElementById('overlay');
      var infoContent = document.getElementById('info-content');
      var archiveInfo = document.getElementById('infos_archiveID' + archiveId);

      overlay.style.display = 'block';
      infoContent.innerHTML = '';
      infoContent.appendChild(archiveInfo.cloneNode(true));
      infoContent.style.display = 'block';
  }

  // Fonction pour masquer les informations d'archive
  function hideArchiveInfo() {
      var overlay = document.getElementById('overlay');
      var infoContent = document.getElementById('info-content');

      overlay.style.display = 'none';
      infoContent.style.display = 'none';
  }

  // Ajouter des gestionnaires d'événements aux boutons "Voir plus"
  var showButtons = document.querySelectorAll('.show-archive-info');
  showButtons.forEach(function(button) {
      button.addEventListener('click', function(event) {
          event.preventDefault();
          var archiveId = button.getAttribute('data-info-id');
          showArchiveInfo(archiveId);
      });
  });

  // Gestionnaire d'événement pour masquer les informations d'archive en cliquant sur l'overlay
  var overlay = document.getElementById('overlay');
  overlay.addEventListener('click', function() {
      hideArchiveInfo();
  });


  var dataTableObjects = {};
    $(document).ready(function() {
        dataTableObjects['rz68hp-ijdr-awoavv'] = $('*[data-table-id="rz68hp-ijdr-awoavv"]').DataTable({
            "sDom": "<\"dataTable-footer clearfix\"<\"pull-left\"f>><\"table-responsive\"t><\"dataTable-footer\"<\"pull-left\"li><\"pull-right\"p><\"clearfix\">>",
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sProcessing": "Traitement...",
                "sSearch": "Filtre : ",
                "sLengthMenu": "Montrer _MENU_ lignes",
                "sInfo": "Montrer _START_ \u00e0 _END_ de _TOTAL_ lignes",
                "sInfoEmpty": "Montrer 0 \u00e0 0 de 0 lignes",
                "sInfoFiltered": "(filtr\u00e9 depuis _MAX_ lignes totales)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement...",
                "sZeroRecords": "Aucun enregistrement correspondant trouv\u00e9",
                "sEmptyTable": "Pas de donn\u00e9es disponibles dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr\u00e9c\u00e9dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                        },
                        "oAria": {
                            "sSortAscending": ": activer pour trier la colonne en ascendant",
                            "sSortDescending": ": activer pour trier la colonne en descendant"
                        }
                    },
                    "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [2, 3, 4]
                    }, {
                        "bSearchable": false,
                        "aTargets": [2, 3, 4]
                    }]
                });
            });
        $('[title]').tooltip();
        $('[title]').tooltip();

    </script>

    <script src="/js/script.js"></script>
    </body>
</html>
