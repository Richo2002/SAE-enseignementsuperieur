<div x-data="{ 'archivistId':null }">
    <div class="table-responsive">
        <table class="table table-condensed dataTable no-footer"
            id="user_userList" style="margin: 0;"
            data-translate-catalog="auth/messages"
            data-table-id="rz4mor-e0wm-swr3mt" role="grid"
            aria-describedby="user_userList_info">
            <thead>
                <tr role="row">
                    <th name="userName" class="sorting_asc" tabindex="0"
                        aria-controls="user_userList" rowspan="1"
                        colspan="1" aria-sort="ascending"
                        aria-label="Identifiant: activer pour trier la colonne en descendant"
                        style="width: 212.25px;">Id</th>
                    <th class="sorting" tabindex="0"
                        aria-controls="user_userList" rowspan="1"
                        colspan="1"
                        aria-label="Nom complet: activer pour trier la colonne en ascendant"
                        style="width: 343.986px;">Nom complet</th>
                    <th class="sorting" tabindex="0"
                        aria-controls="user_userList" rowspan="1"
                        colspan="1"
                        aria-label="Courriel: activer pour trier la colonne en ascendant"
                        style="width: 288.25px;">Courriel</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1"
                        aria-label="Activé" style="width: 310.139px;">
                        Direction</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1"
                        aria-label="role"
                        class="sorting_disabled" rowspan="1"
                        colspan="1" aria-label="statut"
                        style="width: 310.139px;">Statut</th>
                    <th class="sorting_disabled" rowspan="1"
                        colspan="1" aria-label="actions"
                        style="min-width: 175px; width: 175.139px; text-align: right;">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivists as $archivist)
                    <tr class="disabled_user odd" role="row">
                        <td class="sorting_1">{{ $archivist->id }}</td>
                        <td>{{ $archivist->lastname . ' ' . $archivist->firstname }}</td>
                        <td>{{ $archivist->email }}</td>
                        <td>{{ $archivist->department->name }}</td>
                        <td class="userStatus">
                            @if ($archivist->status)
                                <i class="fa fa-check"></i>
                            @else
                                <i class="fa fa-ban"></i>
                            @endif
                        </td>
                        <td>
                            <div id="actionButtons"
                                class="btn-group pull-right">
                                <a href="/archivists/{{ $archivist->id }}/edit"
                                    class="editUser btn btn-info"
                                    data-original-title="Éditer" style="margin-right: 5px;">
                                    <span class="fa fa-fw fa-edit"></span>
                                </a>

                                @if ($archivist->status)
                                    <a href="#" id="{{ $archivist->id }}"
                                        class="confirmation-link disableUser btn btn-danger"
                                        title="Désactiver ce compte">
                                        <span class="fa fa-fw fa-times"></a>
                                @else
                                    <a href="#" id="{{ $archivist->id }}"
                                        class="confirmation-link enableUser btn btn-danger"
                                        title="Activer ce compte">
                                        <span class="fa fa-fw fa-check"></a>
                                @endif

                                <a href="#" id="{{ $archivist->id }}"
                                    class="removing-link deleteUser btn btn-info"
                                    title="Supprimer ce compte" style="margin-left: 5px;">
                                    <span class="fa fa-fw fa-trash"></span>
                                </a>

                                {{-- activation, désactivation avec livewire, pas fonctionnel
                                @if ($archivist->status)
                                    <a x-cloak x-on:click.prevent="archivistId = '{{ $archivist->id }}'" href="#"
                                        class="disableUser btn btn-danger"
                                        data-accountid="ccamus" title=""
                                        data-toggle="modal"
                                        data-target="#exampleModal2"
                                        data-original-title="Désactiver">
                                        <span class="fa fa-fw fa-times"></span>
                                    </a>
                                @else
                                    <a x-cloak x-on:click.prevent="archivistId = '{{ $archivist->id }}'" href="#"
                                        class="enableUser btn btn-danger"
                                        data-accountid="ccamus" title=""
                                        data-toggle="modal"
                                        data-target="#exampleModal1"
                                        data-original-title="Activer">
                                        <span class="fa fa-fw fa-check"></span>
                                    </a>
                                @endif --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form id="confirmation-form" action="" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="archivist_id" id="archivist_id" value="">
            <button type="submit">Confirmer</button>
        </form>

        <form id="removing-form" action="" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            <input type="hidden" name="archivist_id" id="archivist_id2" value="">
            <button type="submit">Confirmer</button>
        </form>

        {{-- formulaire d'activation/désactivation avec livewire, pas fonctionnel
        <div class="modal" id="exampleModal1" tabindex="-1" style="margin-top: 100px !important;"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5"
                            id="exampleModalLabel">Activation de compte</h3>
                        <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span x-text="archivistId"></span>
                        Êtes-vous sûr de vouloir activer le compte de cet arhiviste ?
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Annuler</button>
                        <button x-cloak x-on:click.prevent="$wire.enableOrDisable(archivistId)" type="submit"
                        class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="exampleModal2" tabindex="-1" style="margin-top: 100px !important;"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5"
                            id="exampleModalLabel">Désactivation de compte</h3>
                        <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir désactiver le compte de cet arhiviste ?
                    </div>

                    <div class="modal-footer">
                        @csrf
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Annuler</button>
                        <button x-cloak x-on:click.prevent="$wire.enableOrDisable(archivistId)" type="submit"
                        class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <script>
            var dataTableObjects = {};
            $(document).ready(function() {
                dataTableObjects['rz4mor-e0wm-swr3mt'] = $('*[data-table-id="rz4mor-e0wm-swr3mt"]').DataTable({
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
        <script type="text/javascript">
            window.livewire.on('closeModal', () => {
                $('#exampleModal1').modal('hide');
                $('#exampleModal2').modal('hide');
            });
        </script>
        <script>
            //activation/désactivation de compte: script
            const confirmationLinks = document.querySelectorAll('.confirmation-link');

            confirmationLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const archivistId = this.getAttribute('id');

                    document.getElementById('archivist_id').value = archivistId;

                    const userConfirmed = confirm(`Êtes-vous sûr de vouloir éditer l'archiviste avec l'id ${archivistId} ?`);

                    if (userConfirmed) {
                        document.getElementById('confirmation-form').action = `archivists/${archivistId}/enable-or-disable-account`;
                        document.getElementById('confirmation-form').submit();
                    }
                });
            });

            //suppression de compte: script
            const removingLinks = document.querySelectorAll('.removing-link');

            removingLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const archivistId = this.getAttribute('id');

                    document.getElementById('archivist_id2').value = archivistId;

                    const userConfirmed = confirm(`Êtes-vous sûr de vouloir supprimer l'archiviste avec l'id ${archivistId} ?`);

                    if (userConfirmed) {
                        document.getElementById('removing-form').action = `archivists/${archivistId}`;
                        document.getElementById('removing-form').submit();
                    }
                });
            });
        </script>
    </div>
</div>
