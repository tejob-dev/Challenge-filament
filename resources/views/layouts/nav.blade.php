<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            Challengedb
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', App\Models\Contact::class)
                            <a class="dropdown-item" href="{{ route('contacts.index') }}">Contacts</a>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <a class="dropdown-item" href="{{ route('users.index') }}">Utilisateurs</a>
                            @endcan
                            @can('view-any', App\Models\MaisonCertif::class)
                            <a class="dropdown-item" href="{{ route('maison-certifs.index') }}">Maison Certifié</a>
                            @endcan
                            @can('view-any', App\Models\TypeDeSurface::class)
                            <a class="dropdown-item" href="{{ route('type-de-surfaces.index') }}">Type De Surfaces</a>
                            @endcan
                            @can('view-any', App\Models\CritereImmeuble::class)
                            <a class="dropdown-item" href="{{ route('critere-immeubles.index') }}">Critere Immeubles</a>
                            @endcan
                            @can('view-any', App\Models\AcheteNow::class)
                            <a class="dropdown-item" href="{{ route('achete-nows.index') }}">Achete Nows</a>
                            @endcan
                            @can('view-any', App\Models\TerrainCertif::class)
                            <a class="dropdown-item" href="{{ route('terrain-certifs.index') }}">Terrain Certifié</a>
                            @endcan
                            @can('view-any', App\Models\Certification::class)
                            <a class="dropdown-item" href="{{ route('certifications.index') }}">Certifications</a>
                            @endcan
                            @can('view-any', App\Models\RendezVous::class)
                            <a class="dropdown-item" href="{{ route('all-rendez-vous.index') }}">All Rendez Vous</a>
                            @endcan
                            @can('view-any', App\Models\EtatAchat::class)
                            <a class="dropdown-item" href="{{ route('etat-achats.index') }}">Etat Achats</a>
                            @endcan
                            @can('view-any', App\Models\ExigenceParticuliere::class)
                            <a class="dropdown-item" href="{{ route('exigence-particulieres.index') }}">Exigence Particulieres</a>
                            @endcan
                            @can('view-any', App\Models\SurfaceAnnexe::class)
                            <a class="dropdown-item" href="{{ route('surface-annexes.index') }}">Surface Annexes</a>
                            @endcan
                            @can('view-any', App\Models\TypeCertification::class)
                            <a class="dropdown-item" href="{{ route('type-certifications.index') }}">Type Certifications</a>
                            @endcan
                            @can('view-any', App\Models\ExigenceImmeuble::class)
                            <a class="dropdown-item" href="{{ route('exigence-immeubles.index') }}">Exigence Immeubles</a>
                            @endcan
                        </div>

                    </li>
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Access Management <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', Spatie\Permission\Models\Role::class)
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            @endcan
                    
                            @can('view-any', Spatie\Permission\Models\Permission::class)
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                            @endcan
                        </div>
                    </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>