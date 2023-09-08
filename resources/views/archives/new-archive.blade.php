<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="./presentation/img/logo.jpeg">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <title>Système d'Archivage Electronique</title>

        <style>

            #customFileInput {
                border: 2px dashed grey;
                cursor: pointer;
                padding: 20px 10px 20px 10px;
                text-align: center;
                color: grey;
                opacity: 1;
                min-height:100px;
            }

            .hideDiv{
                display: none;
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
                    Enregistrement d'une nouvelle archive
                </h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Nouvelle Archive</div>
                    <div class="panel-body">
                        <form class="form-horizontal row" id="newArchive_form" method="POST" action="/archives" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xs-12">
                                <br>

                                <div class="form-group">
                                    <label for="cote" class="col-md-3 control-label">Cote :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="cote" name="call_number" placeholder="saisissez la cote de l'archive" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="serie" class="col-md-3 control-label">Série :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="serie" name="service_id" required>
                                            <option value="">Sélectionnez une série</option>
                                            @foreach($filingPlan as $direction)
                                                <option value="{{ $direction->id }}" data-services="{{ json_encode($direction->services) }}">{{ $direction->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group hideDiv" id="show_hide">
                                    <label for="sousSerie" class="col-md-3 control-label">Sous-série :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="sousSerie" name="service_id" required>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="analyse" class="col-md-3 control-label">Analyse :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="analyse" name="analyze" placeholder="saisissez les analyses sur l'archive" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="projet" class="col-md-3 control-label">Projet/Programme :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="projet" name="project" placeholder="saisissez le nom du projet ou du programme">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pieces" class="col-md-3 control-label">Pièces constitutives :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="pieces" name="piece" placeholder="saisissez le nom des pièces constitutives">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="soumissionnaires" class="col-md-3 control-label">Soumissionnaires :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="soumissionnaires" name="tenderer" placeholder="siaisissez le nom des soumissionnaires">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-md-3 control-label">Dates extremes :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="date" name="extreme_date" placeholder="saisissez les dates extremes pour cette archive">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="notes" class="col-md-3 control-label">Notes/Observations :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="notes" name="observation" placeholder="saisissez les observations">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="duree" class="col-md-3 control-label">Durée d'utilité administrative :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="duree" name="duree">
                                           <option value="5">05 ans</option>
                                           <option value="1">01 an</option>
                                           <option value="2">02 ans</option>
                                           <option value="3">03 ans</option>
                                           <option value="4">04 ans</option>
                                           <option value="6">06 ans</option>
                                           <option value="7">07 ans</option>
                                           <option value="8">08 ans</option>
                                           <option value="9">09 ans</option>
                                           <option value="10">10 ans</option>
                                           <option value="15">15 ans</option>
                                           <option value="20">20 ans</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sortfinal" class="col-md-3 control-label">Sort final :</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="sortfinal" name="final_sort">
                                            <option value="Tri">Tri</option>
                                            <option value="Conservation">Conservation</option>
                                            <option value="Destruction">Destruction</option>
                                        </select>
                                    </div>
                                </div>

                                <div  id="fileInputsContainer" class="form-group">
                                    <label for="document_filesBrowser" class="col-md-3 control-label">Choix des documents (obligatoire) :</label>
                                    <input type="file" name="myfiles[]" id="document_filesBrowser" class="hide" accept=".pdf" multiple required>
                                    <div class="col-md-9">
                                        <div id="document_dropZone">
                                            <label for="document_filesBrowser" class="form-control" id="customFileInput">
                                                Cliquez ici pour sélectionner tous les fichiers en un clic
                                            </label>
                                        </div>
                                    </div> <br>
                                </div>

                                <div class="form-group"  id="hidePart" style="display:none;">
                                    <label for="document_filesBrowser" class="col-md-3 control-label">Fichiers sélectionnés :</label>
                                    <div class="col-md-9">
                                        <table id="documentList" class="table table-condensed">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>

                                <style>
                                    #documentList{
                                        border: 1px solid rgba(0, 0, 0, 0.5);
                                    }

                                    #documentList td{
                                        border: 1px solid rgba(0, 0, 0, 0.5);
                                    }

                                </style>

                                <div class="row">
                                    <div class="col-xs-6 pull-right">
                                        <div style="margin-top: 20px;">
                                            <button type="button" onclick="chargerPage('/archives')"
                                                class="btn btn-warning" id="newArchivecancel"
                                                title="Annuler"><i class="fa fa-undo"></i> Annuler</button>
                                            <button id="saver" type="submit" class="btn btn-success" title="Enregistrer"><i class="fa fa-save"></i> Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const fileInput = document.getElementById('document_filesBrowser');
            const toShow = document.getElementById('hidePart');
            const fileTable = document.getElementById('documentList').getElementsByTagName('tbody')[0];

            fileInput.addEventListener('change', function() {
                fileTable.innerHTML = ''; // Efface le contenu précédent du tableau
                for (let i = 0; i < fileInput.files.length; i++) {
                    const fileName = fileInput.files[i].name;
                    const row = fileTable.insertRow(i);
                    const cell = row.insertCell(0);
                    cell.innerHTML = fileName;
                }
                toShow.style.display = 'block';
            });




            var serieSelect = document.getElementById('serie');
            var sousSerieSelect = document.getElementById('sousSerie');
            var subSerieDiv = document.getElementById('show_hide');

            var sousSerieData = {
                @foreach($filingPlan as $direction)
                    {{ $direction->id }}: {!! json_encode($direction->services) !!},
                @endforeach
            };

            serieSelect.addEventListener('change', function () {
                sousSerieSelect.innerHTML = '';

                var selectedDirectionId = serieSelect.value;
                var selectedSousSeries = sousSerieData[selectedDirectionId];

                if (selectedDirectionId !== '') {
                    subSerieDiv.classList.remove('hideDiv');
                } else {
                    subSerieDiv.classList.add('hideDiv');
                }

                selectedSousSeries.forEach(function (service) {
                    var option = document.createElement('option');
                    option.value = service.id;
                    option.textContent = service.name;
                    sousSerieSelect.appendChild(option);
                });
            });


        </script>

        <script src="/js/script.js"></script>
    </body>
</html>
