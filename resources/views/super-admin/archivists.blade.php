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
    @livewireStyles
</head>

<body>
    @include('layouts.nav')
    <div id="wrapper" lang="fr">

        <div id="page-wrapper" style="padding-bottom: 50px;">

            <section role="main" id="app_sae_main" style="z-index: 1;">
                <div id="contain" style="margin-top: 100px">
                    <div class="container-fluid">
                        <div class="page-header">
                            <h1>
                                <i class="fa fa-user"></i>
                                Gestion des archivistes
                            </h1>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading clearfix">
                                        <div class="pull-left">
                                            <h4>Tous les archivistes</h4>
                                        </div>

                                        <div class="pull-right">
                                            <a href="archivists/create" type="button" class="btn btn-default btn-sm"
                                                id="user_newUser" title="Ajouter"><i class="fa fa-plus"> </i>Ajouter</a>
                                        </div>
                                    </div>
                                    <div class="panel-body" style="padding: 0;" id="list_user">
                                        <div>
                                            @livewire('archivist')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="hide" id="securityLevel"></span>
        </div>

        <script src="/js/bootstrap-toggle/bootstrap-toggle.js"></script>

        <script src="/js/script.js"></script>
        <script type="text/javascript">
            window.livewire.on('closeModal', () => {
                $('#exampleModal1').modal('hide');
                $('#exampleModal2').modal('hide');
            });
        </script>
        @livewireScripts
</body>

</html>
