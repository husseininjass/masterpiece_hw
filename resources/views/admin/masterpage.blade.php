<!-- head -->
@include('admin.includes.head') 
<!-- head -->

	<!-- SIDEBAR -->
	@include('admin.includes.sidebar')
	<!-- SIDEBAR -->


    
	<!-- CONTENT -->
	<section id="content">
        <!-- NAVBAR -->
        @include('admin.includes.nav')
		<!-- NAVBAR -->
        
		<!-- MAIN -->
        {{-- @include('admin.includes.main') --}}
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">@yield('main_body', "Home")</a>
                        </li>
                    </ul>
                </div>
                
                    
                    <span class="text">@yield('right_top_button')</span>
                
            </div>
            
                @yield("main")
        </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

    @include('admin.includes.scripts_footer')
    
@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif
@include('admin.includes.footer')
