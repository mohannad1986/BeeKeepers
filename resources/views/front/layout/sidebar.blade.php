<div class="container-fluid side-bar-container">
				<header class="pb-0">
					<a class="navbar-brand">
						<object class="side-logo" data="./svg/logo-8.svg" type="image/svg+xml">
						</object>
					</a>
				</header>
				{{-- <p class="side-comment">Tour</p>
				<li class="side a-collapse short ">
					<a href="./fa.html" class="side-item "><i class="fas fa-language  mr-1"></i>Persian <span
							class="badge badge-pill badge-success">new</span></a>
				</li> --}}
				{{-- <ul class="side a-collapse short ">
					<a class="ul-text"><i class="fas fa-tachometer-alt mr-1"></i> Pages
						<i class="fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
						<li class="side-item selected"><a href="./"><i class="fas fa-angle-right mr-2"></i>Dashboard</a>
						</li>
						<li class="side-item"><a href="./dark.html"><i class="fas fa-angle-right mr-2"></i>Dark Dashboard</a></li>
						<li class="side-item"><a href="./Login.html"><i class="fas fa-angle-right mr-2"></i>Login</a></li>
						<li class="side-item"><a href="./glogin.html"><i class="fas fa-angle-right mr-2"></i>Login Colored</a></li>
					</div>
				</ul> --}}

				{{-- <ul class="side a-collapse short">
					<a class="ul-text"><i class="fas fa-cog mr-1"></i> Customize
						<i class="fas fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
						<li class="side-item"><a href="./color.html"><i class="fas fa-angle-right mr-2"></i>Color</a></li>
						<li class="side-item"><a href="./typo.html"><i class="fas fa-angle-right mr-2"></i>Typography</a></li>
						<li class="side-item"><a href="./dark-mode.html"><i class="fas fa-angle-right mr-2"></i>Dark Mode</a></li>
						<li class="side-item"><a href="./rtl.html"><i class="fas fa-angle-right mr-2"></i>Rtl</a></li>
						<li class="side-item"><a href="./sidebar.html"><i class="fas fa-angle-right mr-2"></i>SideBar</a></li>
					</div>
				</ul> --}}
				{{-- <p class="side-comment">Element</p>
				<li class="side a-collapse short ">
					<a href="./animation.html" class="side-item "><i class="fas fa-fan fa-spin mr-1"></i>Animation</a>
				</li> --}}
				{{-- <li class="side a-collapse short ">
					<a href="./Icon.html" class="side-item "><i class="fas fa-icons  mr-1"></i>Icon</a>
				</li> --}}
{{--
				<ul class="side a-collapse short ">
					<a class="ul-text"><i class="fas fa-cube mr-1"></i> Base Component <span
							class="badge badge-danger">9</span><i class="fas fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
						<li class="side-item"><a href="./alert.html"><i class="fas fa-angle-right mr-2"></i>alert</a>
						</li>
						<li class="side-item"><a href="./badge.html"><i class="fas fa-angle-right mr-2"></i>Badge</a></li>
						<li class="side-item"><a href="./breadcrumb.html"><i class="fas fa-angle-right mr-2"></i>Breadcrumb</a></li>
						<li class="side-item"><a href="./button.html"><i class="fas fa-angle-right mr-2"></i>Button</a></li>
						<li class="side-item"><a href="./card.html"><i class="fas fa-angle-right mr-2"></i>Card</a></li>
						<li class="side-item"><a href="./collapse.html"><i class="fas fa-angle-right mr-2"></i>Collapse</a></li>
						<li class="side-item"><a href="./Input.html"><i class="fas fa-angle-right mr-2"></i>Input</a></li>
						<li class="side-item"><a href="./jumborton.html"><i class="fas fa-angle-right mr-2"></i>Jumborton</a></li>
						<li class="side-item"><a href="./pagination.html"><i class="fas fa-angle-right mr-2"></i>Pagination</a></li>
						<li class="side-item"><a href="./progress.html"><i class="fas fa-angle-right mr-2"></i>Progress</a></li>
					</div>
				</ul> --}}
				{{-- <ul class="side a-collapse short">
					<a class="ul-text"><i class="fas fa-layer-group mr-1"></i>Extra Component
						<i class="fas fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
						<li class="side-item"><a href="./modal.html"><i class="fas fa-angle-right mr-2"></i>Modal</a></li>
						<li class="side-item"><a href="./toast.html"><i class="fas fa-angle-right mr-2"></i>Toast</a></li>
						<li class="side-item"><a href="./widget.html"><i class="fas fa-angle-right mr-2"></i>Widget</a></li>
						<li class="side-item"><a href="./Chart.html"><i class="fas fa-angle-right mr-2"></i>Chart</a></li>

					</div>
				</ul> --}}
                {{-- ******************************************** --}}
                @can('اضافة_عسل')
                <ul class="side a-collapse short">
					<a class="ul-text"><i class="fas fa-layer-group mr-1"></i>نحال
						<i class="fas fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
						<li class="side-item"><a href="{{url('keepers_hony')}}/{{Auth()->user()->id}}"><i class="fas fa-angle-right mr-2"></i>عسلي</a></li>
						<li class="side-item"><a href="{{url('keepers_h_order')}}/{{Auth()->user()->id}}"><i class="fas fa-angle-right mr-2"></i>طلبات شراء عسل مني</a></li>
                        <li class="side-item"><a href="{{url('keepers_acces_order')}}/{{Auth()->user()->id}}"><i class="fas fa-angle-right mr-2"></i>طلبات شراء قدمتها</a></li>


					</div>
				</ul>
                @endcan
                {{-- ******************************************* --}}
                {{-- ******************************************** --}}
                @can('دخول_تاجر')
                <ul class="side a-collapse short">
					<a class="ul-text"><i class="fas fa-layer-group mr-1"></i>تاجر عسل
						<i class="fas fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
                        <li class="side-item"><a href="{{url('dealer_honey_orders')}}/{{Auth()->user()->id}}"><i class="fas fa-angle-right mr-2"></i>طلبات شراء قدمتها</a></li>


					</div>
				</ul>
                @endcan
                {{-- ******************************************* --}}
                {{-- ******************************************** --}}
                @can('دخول_تجهيزات')
                <ul class="side a-collapse short">
					<a class="ul-text"><i class="fas fa-layer-group mr-1"></i>مستلزمات
						<i class="fas fas fa-chevron-down arrow"></i></a>
					<div class="side-item-container hide animated">
						<li class="side-item"><a href="{{url('dealer_acces')}}/{{Auth()->user()->id}}"><i class="fas fa-angle-right mr-2"></i>مستلزماتي</a></li>
						<li class="side-item"><a href="{{url('accDealer_order')}}/{{Auth()->user()->id}}"><i class="fas fa-angle-right mr-2"></i>طلبات شراء مستلزمات </a></li>

					</div>
				</ul>
                @endcan
                {{-- ******************************************* --}}
                  {{-- ******************************************** --}}
                  @can('دخول_سائق')
                  <ul class="side a-collapse short">
                      <a class="ul-text"><i class="fas fa-layer-group mr-1"></i>مستخدمين
                          <i class="fas fas fa-chevron-down arrow"></i></a>
                      <div class="side-item-container hide animated">
                          <li class="side-item"><a href="{{url('active_users')}}"><i class="fas fa-angle-right mr-2"></i>مستخدمين مفعلين</a></li>
                          <li class="side-item"><a href="{{url('unactive_users')}}"><i class="fas fa-angle-right mr-2"></i> مستخدمين غير مفعلين  </a></li>
						  {{-- <li class="side-item"><a href="{{url('roles')}}"><i class="fas fa-angle-right mr-2"></i>   الرولز  </a></li> --}}

                      </div>
                  </ul>
                  @endcan
                  {{-- ******************************************* --}}
                   {{-- ******************************************** --}}
                  @can('دخول_سائق')
                  <ul class="side a-collapse short">
                      <a class="ul-text"><i class="fas fa-layer-group mr-1"></i>منتجات ومستلزمات
                          <i class="fas fas fa-chevron-down arrow"></i></a>
                      <div class="side-item-container hide animated">
                          <li class="side-item"><a href="{{url('hproducts')}}"><i class="fas fa-angle-right mr-2"></i>منتجات عسل </a></li>
                          <li class="side-item"><a href="{{url('accessories')}}"><i class="fas fa-angle-right mr-2"></i> متجر المستلزمات   </a></li>

                      </div>
                  </ul>
                  @endcan
                  {{-- ******************************************* --}}



				<p class="side-comment">support</p>
				<li class="side a-collapse short ">
					<a href="https://github.com/MajidAlinejad/Nozha-rtl-Dashboard" class="side-item  "><i class=" fab fa-github mr-1"></i>GitHub</a>
				</li>
				<li class="side a-collapse short ">
					<a href="https://github.com/MajidAlinejad/Nozha-rtl-Dashboard" class="side-item  "><i class=" far fa-question-circle mr-1"></i>Submit Issue</a>
				</li>
				<li class="side a-collapse short ">
					<a href="https://github.com/MajidAlinejad/Nozha-rtl-Dashboard" class="side-item  "><i class=" far fa-life-ring mr-1"></i>Help</a>
				</li>

				<p class="side-comment">donate</p>
				<li class="side a-collapse short pb-5">
					<a href="https://donateon.ir/alinejad.mj" class="side-item  "><i class=" fas fa-coffee mr-1"></i>Buy me a coffee</a>
				</li>


			</div>
