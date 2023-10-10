<!DOCTYPE html>
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

    <link rel="stylesheet" href="/css/table.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    @include('layouts.nav')

    <div id="wrapper" lang="fr">

        <div id="page-wrapper" style="padding-bottom: 100px;">
            <div id="loadingModal" style="display: none">
                <span
                    style="z-index:2; background-color: rgba(200,200,200,0.3); position: fixed; height: 100%; width: 100% "></span>
                <div style="position: fixed; z-index:3; bottom: 50%; right: 42%;">
                    <i class="fa fa-spinner fa-spin fa-5x"></i>
                </div>
            </div>
            <section role="main" id="app_sae_main" style="z-index: 1;">
                <div id="contain" data-translate-catalog="auth/messages">
                    <div class="container-fluid">
                        <div class="page-header">
                            <h1>
                                {{-- <i class="fa fa-user"></i> --}}
                                Visualisation des fichiers
                            </h1>
                        </div>
                    </div>
                    <div class="container-fluid" style="width: max-content; margin-left: 0;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading clearfix">
                                        <div class="pull-left">
                                            <h4>L'archive sélectionnée contient {{ count($files) }}  fichiers que voici :</h4>
                                        </div>
                                        <div class="pull-right">
                                            @if(Auth::user()->type == "Archiviste")
                                                <a href="/archives" type="button" class="btn btn-default btn-sm"
                                                title="Retourner vers la page des archives">
                                                <i class="fa fa-undo"></i> Retour</a>
                                            @else
                                                <a href="{{ route('archives.mngt') }}" type="button" class="btn btn-default btn-sm"
                                                title="Retourner vers la page des archives">
                                                <i class="fa fa-undo"></i> Retour</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="panel-body" style="padding: 0;" id="list_files">
                                        <div class="table-responsive">
                                            <table class="table table-condensed dataTable no-footer"
                                                style="margin: 0;" data-table-id="rz4mor-e0wm-swr3mt" role="grid">
                                                <thead>
                                                    <tr role="row">
                                                        <th name="fileId" class="sorting_asc" rowspan="1"
                                                            colspan="1" style="width: 100.25px;">Id</th>
                                                        <th class="sorting" rowspan="1"
                                                            colspan="1" style="width: 500.986px;">Nom complet</th>
                                                        <th class="sorting" rowspan="1"
                                                            colspan="1" style="width: 288.25px;">Date de création</th>
                                                        <th>Visualiser</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                        $numero=1
                                                    @endphp
                                                    @foreach ($files as $file)
                                                        <tr>
                                                            <td>{{ $numero++ }}</td>
                                                            <td>{{ $file->basename }}</td>
                                                            <td>{{ $file->created_at }}</td>
                                                            <td>
                                                                <a href="{{ route('view.pdf', $file) }}" class="btn  btn-info" title="Visualiser le fichier">
                                                                    <span class="fa fa-fw fa-eye"></span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="hide" id="securityLevel"></span>
        </div>

        <style>
            .alert-danger {
                position: fixed;
                top: 100px;
                right: 0px;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            }
        </style>

        @if($errors->any())
        <div class="alert alert-danger" id="error-message">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function()
            {
                var errorMessage = document.getElementById("error-message");

                setTimeout(function() {
                    errorMessage.style.display = "none";
                }, 5000); // 5000 millisecondes = 5 secondes
            });
        </script>

        <script src="/js/bootstrap-toggle/bootstrap-toggle.js"></script>

        <script src="/js/script.js"></script>
</body>

</html>
