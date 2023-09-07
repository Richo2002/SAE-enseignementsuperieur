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
            <div class="container-fluid" data-translate-catalog="auth/messages">
                <div class="page-header" style="margin-top: 100px;">
                    <h1>
                        <i class="fa-regular fa-file-lines"></i> Rapports Statistiques
                    </h1>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">Définition des critères du rapport statistiques</div>
                        <div class="panel-body">
                            <form class="form-horizontal row" method="POST" action="{{ route('statistiques.generate') }}">
                                @csrf
                                <div class="col-xs-12">
                                    <br>
                                    <div class="form-group">
                                        <label for="statsBy" class="col-md-3 control-label">Générer le rapport par :
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="statsBy" name="statsBy">
                                                <option value="department">Direction</option>
                                                <option value="service">Série</option>
                                                <option value="subService">Sous-série</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="firstDate" class="col-md-3 control-label">Date de début :</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control" id="firstDate" name="firstDate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastDate" class="col-md-3 control-label">Date de fin :</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control" id="lastDate" name="lastDate">
                                        </div>
                                    </div> --}}

                                </div>

                                <div class="row">
                                    <div class="col-xs-6 pull-right">
                                        <div class="form-group">
                                            <div>
                                                <button id="statsByValider" type="submit" class="btn btn-success"
                                                    title="Générer les rapports"><i class="fa fa-save"></i> Générer les
                                                    rapports</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        <script src="/js/script.js"></script>
    </body>

</html>
