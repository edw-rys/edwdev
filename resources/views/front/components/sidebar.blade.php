<!-- desktop header -->
<header class="desktop-header-1 d-flex align-items-start flex-column">
	
	<!-- logo image -->
	<div class="site-logo">
		<a href="/">
			<img src="{{ img_me('gadas.svg') }}" alt="Edw" style="width: 5.5em" />
		</a>
	</div>
	
	<!-- main menu -->
	<nav>
		<ul class="vertical-menu scrollspy">
			<li class="active"><a href="/"><i class="icon-home"></i>Home</a></li>
			<li><a href="#about"><i class="icon-user-following"></i>Acerca de mi</a></li>
			<li><a href="#services"><i class="icon-briefcase"></i>Servicios</a></li>
			<li><a href="#experience"><i class="icon-graduation"></i>Experiencia</a></li>
			<li><a href="#works"><i class="icon-layers"></i>Trabajos</a></li>
			{{-- <li><a href="#blog"><i class="icon-note"></i>Blog</a></li> --}}
			<li><a href="#contact"><i class="icon-bubbles"></i>Contacto</a></li>
		</ul>
	</nav>
	
	<!-- site footer -->
	<div class="footer">
		<!-- copyright text -->
		<span class="copyright">© {{ \Carbon\Carbon::now()->year}} e-dev.</span>
	</div>

</header>