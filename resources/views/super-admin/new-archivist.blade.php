<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta class="datePicker" data-datepicker-id="ryyp8n-773m-7vm15o">
    <link rel="icon" type="image/png" href="/img/logo.jpeg">
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

    <div id="wrapper" lang="fr">
        <div>
            <div id="contain" data-translate-catalog="auth/messages">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="page-header">
                                <small></small>
                                <span>Nouvel utilisateur</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">Compte utilisateur</div>
                            <div class="panel-body">
                                <form class="form-horizontal row" id="user_userAccountForm" method="POST"
                                    action="{{ isset($archivist) ? '/archivists/' . $archivist->id : '/archivists' }}">
                                    @csrf
                                    @if (isset($archivist))
                                        @method('PUT')
                                    @endif

                                    <div class="col-xs-12">
                                        <br>
                                        <div class="form-group">
                                            <label for="lastName" class="col-md-3 control-label">Nom :<span
                                                    style="color : red">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="lastName"
                                                    name="lastname" placeholder="Nom de l'archiviste" required
                                                    value="{{ isset($archivist) ? $archivist->lastname : old('lastname') }}">
                                            </div>
                                                    @error('lastname')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="firstName" class="col-md-3 control-label">Prénoms :<span
                                                    style="color : red">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="accountName"
                                                    name="firstname" placeholder="Prénoms de l'archiviste" required
                                                    value="{{ isset($archivist) ? $archivist->firstname : old('firstname') }}">
                                            </div>
                                                    @error('firstname')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-md-3 control-label">Téléphone :<span
                                                    style="color : red">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" id="phone"
                                                    name="phone_number" placeholder="Numéro de téléphone" required
                                                    value="{{ isset($archivist) ? $archivist->phone_number : old('phone_number') }}">
                                            </div>
                                                    @error('phone-number')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="courriel" class="col-md-3 control-label">Adresse e-mail :<span
                                                    style="color : red">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="courriel" name="email"
                                                    placeholder="E-mail" required
                                                    value="{{ isset($archivist) ? $archivist->email : old('email') }}">
                                            </div>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="direction" class="col-md-3 control-label">Direction :<span
                                                    style="color : red">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="direction" name="direction"
                                                placeholder="Nom de la direction" required
                                                value="{{ isset($archivist) ? $archivist->department->name : old('department') }}">
                                            </div>
                                                    @error('department')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 pull-right">
                                            <div class="form-group">
                                                <div class="">
                                                    <button type="button" onclick="chargerPage('/archivists')"
                                                        class="btn btn-warning" id="userAccountCancelBtn"
                                                        title="Annuler"><i class="fa fa-undo"></i> Annuler</button>
                                                    <button id="user_saveUser" type="submit" class="btn btn-success"
                                                        title="{{ isset($archivist) ? 'Modifier' : 'Enregistrer' }}"><i
                                                            class="fa fa-save"></i>
                                                        {{ isset($archivist) ? 'Modifier' : 'Enregistrer' }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="/js/bootstrap-toggle/bootstrap-toggle.js"></script>
            </div>
        </div>
        <script src="/js/script.js"></script>
</body>

</html>
