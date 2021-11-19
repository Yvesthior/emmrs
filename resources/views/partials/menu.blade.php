<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('stock_medicament_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-pills">

                        </i>
                        <span>{{ trans('cruds.stockMedicament.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('nouvelle_entree_access')
                            <li class="{{ request()->is("admin/nouvelle-entrees") || request()->is("admin/nouvelle-entrees/*") ? "active" : "" }}">
                                <a href="{{ route("admin.nouvelle-entrees.index") }}">
                                    <i class="fa-fw fas fa-pills">

                                    </i>
                                    <span>{{ trans('cruds.nouvelleEntree.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('entrees_medicament_access')
                            <li class="{{ request()->is("admin/entrees-medicaments") || request()->is("admin/entrees-medicaments/*") ? "active" : "" }}">
                                <a href="{{ route("admin.entrees-medicaments.index") }}">
                                    <i class="fa-fw fas fa-pills">

                                    </i>
                                    <span>{{ trans('cruds.entreesMedicament.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('sorties_medicament_access')
                            <li class="{{ request()->is("admin/sorties-medicaments") || request()->is("admin/sorties-medicaments/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sorties-medicaments.index") }}">
                                    <i class="fa-fw fas fa-pills">

                                    </i>
                                    <span>{{ trans('cruds.sortiesMedicament.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('medicament_access')
                            <li class="{{ request()->is("admin/medicaments") || request()->is("admin/medicaments/*") ? "active" : "" }}">
                                <a href="{{ route("admin.medicaments.index") }}">
                                    <i class="fa-fw fas fa-pills">

                                    </i>
                                    <span>{{ trans('cruds.medicament.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('stocke_materiel_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-laptop">

                        </i>
                        <span>{{ trans('cruds.stockeMateriel.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('entree_materiel_access')
                            <li class="{{ request()->is("admin/entree-materiels") || request()->is("admin/entree-materiels/*") ? "active" : "" }}">
                                <a href="{{ route("admin.entree-materiels.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.entreeMateriel.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('incrementation_materiel_access')
                            <li class="{{ request()->is("admin/incrementation-materiels") || request()->is("admin/incrementation-materiels/*") ? "active" : "" }}">
                                <a href="{{ route("admin.incrementation-materiels.index") }}">
                                    <i class="fa-fw fas fa-pills">

                                    </i>
                                    <span>{{ trans('cruds.incrementationMateriel.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('sorty_access')
                            <li class="{{ request()->is("admin/sorties") || request()->is("admin/sorties/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sorties.index") }}">
                                    <i class="fa-fw fas fa-laptop">

                                    </i>
                                    <span>{{ trans('cruds.sorty.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('materiel_access')
                            <li class="{{ request()->is("admin/materiels") || request()->is("admin/materiels/*") ? "active" : "" }}">
                                <a href="{{ route("admin.materiels.index") }}">
                                    <i class="fa-fw fas fa-laptop">

                                    </i>
                                    <span>{{ trans('cruds.materiel.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('donnee_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.donnee.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('site_access')
                            <li class="{{ request()->is("admin/sites") || request()->is("admin/sites/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sites.index") }}">
                                    <i class="fa-fw fas fa-map-marked-alt">

                                    </i>
                                    <span>{{ trans('cruds.site.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('fabriquant_access')
                            <li class="{{ request()->is("admin/fabriquants") || request()->is("admin/fabriquants/*") ? "active" : "" }}">
                                <a href="{{ route("admin.fabriquants.index") }}">
                                    <i class="fa-fw fas fa-plus-circle">

                                    </i>
                                    <span>{{ trans('cruds.fabriquant.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('classe_therapeutique_access')
                            <li class="{{ request()->is("admin/classe-therapeutiques") || request()->is("admin/classe-therapeutiques/*") ? "active" : "" }}">
                                <a href="{{ route("admin.classe-therapeutiques.index") }}">
                                    <i class="fa-fw fas fa-podcast">

                                    </i>
                                    <span>{{ trans('cruds.classeTherapeutique.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('formule_access')
                            <li class="{{ request()->is("admin/formules") || request()->is("admin/formules/*") ? "active" : "" }}">
                                <a href="{{ route("admin.formules.index") }}">
                                    <i class="fa-fw fas fa-database">

                                    </i>
                                    <span>{{ trans('cruds.formule.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('famille_access')
                            <li class="{{ request()->is("admin/familles") || request()->is("admin/familles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.familles.index") }}">
                                    <i class="fa-fw fas fa-database">

                                    </i>
                                    <span>{{ trans('cruds.famille.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('fournisseur_access')
                            <li class="{{ request()->is("admin/fournisseurs") || request()->is("admin/fournisseurs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.fournisseurs.index") }}">
                                    <i class="fa-fw fas fa-database">

                                    </i>
                                    <span>{{ trans('cruds.fournisseur.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('reference_access')
                            <li class="{{ request()->is("admin/references") || request()->is("admin/references/*") ? "active" : "" }}">
                                <a href="{{ route("admin.references.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.reference.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('representants_locaux_access')
                            <li class="{{ request()->is("admin/representants-locauxes") || request()->is("admin/representants-locauxes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.representants-locauxes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.representantsLocaux.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('forme_access')
                            <li class="{{ request()->is("admin/formes") || request()->is("admin/formes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.formes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.forme.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('dosage_access')
                            <li class="{{ request()->is("admin/dosages") || request()->is("admin/dosages/*") ? "active" : "" }}">
                                <a href="{{ route("admin.dosages.index") }}">
                                    <i class="fa-fw fas fa-database">

                                    </i>
                                    <span>{{ trans('cruds.dosage.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('conditionnement_access')
                            <li class="{{ request()->is("admin/conditionnements") || request()->is("admin/conditionnements/*") ? "active" : "" }}">
                                <a href="{{ route("admin.conditionnements.index") }}">
                                    <i class="fa-fw fab fa-gulp">

                                    </i>
                                    <span>{{ trans('cruds.conditionnement.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('destination_access')
                            <li class="{{ request()->is("admin/destinations") || request()->is("admin/destinations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.destinations.index") }}">
                                    <i class="fa-fw fas fa-plane-departure">

                                    </i>
                                    <span>{{ trans('cruds.destination.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>