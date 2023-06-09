<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
	<div class="position-sticky pt-3 sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active text-dark" aria-current="page" href="/admin">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
						fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" class="feather feather-home align-text-bottom"
						aria-hidden="true">
						<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
						<polyline points="9 22 9 12 15 12 15 22"></polyline>
					</svg>
					Dashboard
				</a>
			</li>
			<?php if($_SESSION['user']['role'] == 'admin'): ?>
			<li class="nav-item">
				<a class="nav-link text-dark" href="/admin/packages/">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
						fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" class="feather feather-shopping-cart align-text-bottom"
						aria-hidden="true">
						<circle cx="9" cy="21" r="1"></circle>
						<circle cx="20" cy="21" r="1"></circle>
						<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
					</svg>
					Packages
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="/admin/locations">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
						fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" class="feather feather-bar-chart-2 align-text-bottom"
						aria-hidden="true">
						<line x1="18" y1="20" x2="18" y2="10"></line>
						<line x1="12" y1="20" x2="12" y2="4"></line>
						<line x1="6" y1="20" x2="6" y2="14"></line>
					</svg>
					Locations
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="/admin/users">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
						fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" class="feather feather-users align-text-bottom"
						aria-hidden="true">
						<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
						<circle cx="9" cy="7" r="4"></circle>
						<path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
						<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
					</svg>
					Users
				</a>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>