<html>

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

    </head>

    <body>

        @include('layouts.nav')

        <div id="contain">
            <div class="container-fluid">
                <div class="page-header" style="margin-top: 100px;">
                    <h1>
                        <i class="fa-regular fa-file-lines"></i> Rapports Statistiques
                    </h1>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading clearfix">
                                <div class="pull-left">
                                    <h4>Toutes les statistiques</h4>
                                </div>
                                <div class="pull-right">
                                    <button type="button" onclick="chargerPage('/generate-statistiques')"
                                        class="btn btn-default btn-sm" id="newArchivecancel"
                                        title="Retourner vers la page précédente"><i class="fa fa-undo"></i> Retour
                                    </button>
                                </div>
                            </div>
                            <div class="panel-body" style="padding: 0;">
                                <div class="table-responsive">
                                    <table class="table table-condensed dataTable no-footer"
                                    id="user_userList" style="margin: 0;"
                                    data-translate-catalog="auth/messages"
                                    data-table-id="rz68hp-ijdr-awoavx" role="grid"
                                    aria-describedby="user_userList_info">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1" aria-sort="ascending">
                                                    Rapport par {{ $statsBy }}</th>

                                                <th rowspan="1" colspan="1">
                                                    Nombre d'archives</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 0; $i < count($stats_values); $i++)
                                                <tr>
                                                    <td> {{ $stats_values[$i]->name }}</td>
                                                    <td> {{ $number_archives[$i] }}</td>
                                                </tr>
                                            @endfor

                                            @php
                                                $total = 0;
                                            @endphp

                                            @foreach ($number_archives as $number_archive)
                                                @php
                                                    $total += $number_archive;
                                                @endphp
                                            @endforeach

                                            <tr>
                                                <td>Total des archives</td>
                                                <td>{{ $total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var dataTableObjects = {};
            $(document).ready(function() {
                dataTableObjects['rz68hp-ijdr-awoavx'] = $('*[data-table-id="rz68hp-ijdr-awoavx"]').DataTable({
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
