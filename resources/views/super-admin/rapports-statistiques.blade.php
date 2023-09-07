<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta class="datePicker" data-datepicker-id="ryyp8n-773m-7vm15o">
        <link rel="icon" type="image/png" href="./presentation/img/logo.jpeg">
        <link href="public/css/bootstrap-toggle/bootstrap-toggle.css" rel="stylesheet" data-auto="1">
        <link href="public/css/bootstrap-datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet" data-auto="1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="public/css/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
        <script src="public/js/jQuery-3.4.1/jquery-3.4.1.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/jQueryUI_1.12.1/jquery-ui.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/DataTables/datatables.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/jQueryUI_touch-punch_1.0.7/jquery.ui.touch-punch.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/less_1.7.0/less.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/bootstrap_3.1.1/all.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/metisMenu_1.0.1/metisMenu.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/dataForm_0.0.1/dataForm.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/gritter/gritter.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/gritter/gritter.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/typeahead_0.11.1/typeahead.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/konami-code/jquery.raptorize.1.0.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/bootstrap-tree/bootstrap-tree.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/dataList_0.0.1/dataList.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/datePicker/bootstrap-datepicker.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/moment_2.14.1/moment.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/dateTimePicker/bootstrap-datetimepicker.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/csrf/csrfprotector.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/bootstrap-toggle/bootstrap-toggle.min.js" type="text/javascript" data-auto="1"></script>
        <script src="public/js/datePicker/locales/bootstrap-datepicker.fr.js" type="text/javascript" data-auto="1"></script>


        <title>Système d'Archivage Electronique</title>
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
                                    <table class="table dataTable" id="list">
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
            <script src="/js/script.js"></script>
        </div>
    </body>
</html>
