<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text">
                <img src="{{ asset('asset/Admin/assets/img/TKJ.png') }}" width="40px" height="40px"> PTIPD TKJ SMKN5
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{ route('absen.index') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('absen.kelas') }}">
                    <i class="ti-view-list"></i>
                    <p>Rekap Absen</p>
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.index') }}">
                    <i class="ti-user"></i>
                    <p>Siswa</p>
                </a>
            </li>
            <li>
                <a href="{{ route('kelas.index') }}">
                    <i class="ti-crown"></i>
                    <p>Kelas</p>
                </a>
            </li>
            {{--
            <li>
                <a href="#">
                    <i class="ti-pencil-alt2"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ti-map"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ti-bell"></i>
                    <p>Notifications</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>