
            <!-- Logged user notifications bar -->
            <li>
            <button id="notes" class=""><i class="fas fa-bell"><span>2</span></i></button>
            <div class="drop-menu-notes">
            <ul class="notifications">
            @forelse($userUnreadNotes as $note)
            <li>
            <h3 class="note-title">Knygos patvirtinimas</h3>
            <p class="note-paragraph">
                <a href="{{ route('knyga', auth()->user()->bookByIdForNotifications($note->data['book_id'])->slug) }}">
                    {{ auth()->user()->bookByIdForNotifications($note->data['book_id'])->title }}
                </a> knyga nuo siol listinguojama</p>
            </li>
            @empty
            <li>
            <h3 class="note-title"></h3>
            <p class="note-paragraph">Pranešimų nėra</p>
            </li>
            @endforelse
            </ul>
            </div>
            </li>
            <!-- Logged user menu -->
            <li>
            <button id="user-menu" class=""><i class="fas fa-user"></i></button>
            <div class="drop-menu">
            <ul>
            <li><a href="{{ route('valdymo-panele') }}">Valdymo panelė</a></li>
            <li><a href="{{ route('mano-profilis', auth()->user()->id ) }}">Mano profilis</a></li>
            <li><a href="">Atsijungti</a></li>
            </ul>
            </div>
            </li>

    <script>
        document.querySelector('#user-menu').addEventListener('click', function (){
            document.querySelector('.drop-menu').classList.toggle('display-on');
        });
        document.querySelector('#notes').addEventListener('click', function (){
            document.querySelector('.drop-menu-notes').classList.toggle('display-on');
        });
    </script>