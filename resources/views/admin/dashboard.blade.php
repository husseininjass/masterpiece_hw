<!-- head -->
@include('admin.includes.head') 
<!-- head -->

   {{-- <input type="checkbox" id="menu-toggle"> --}}
    <!-- SIDEBAR -->
    
	@include('admin.includes.sidebar')
	<!-- SIDEBAR -->

    
    <div class="main-content">
        
        
        <!-- header -->
        @include('admin.includes.header')
		<!-- header -->
        
        <main>
            
            <div class="page-header">
                <h1>Dashboard</h1>
                {{-- <small>Home / Dashboard</small> --}}
                <ul class="breadcrumbb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">@yield('main_body', "Dashboard")</a>
                    </li>
                </ul>
            
                <div>
                    @if (count($errors) >0)
                    <div class="alert alert-danger"  >
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        var milliseconds = 5000;
                        setTimeout(function () {
                            document.getElementById('danger-alert').remove();
                        }, milliseconds);
                    </script>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success  popupss" id="success-alert">
                            <p>{{ \Session::get('success') }}</p>
                            <div class="line"></div>
                        </div>
                        <script>
                            var milliseconds = 3000;
                            setTimeout(function () {
                                document.getElementById('success-alert').remove();
                            }, milliseconds);
                        </script>
                    @endif
                </div>
            </div>
            @yield("main")
            
        </main>
        
    </div>
    @include('admin.includes.scripts_footer')
    @include('admin.includes.footer')

