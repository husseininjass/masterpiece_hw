<div>
    @if (count($errors) >0)
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        {{-- <div class="alert alert-danger"  >
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div> --}}
        <script>
            var milliseconds = 5000;
            setTimeout(function () {
                document.getElementById('danger-alert').remove();
            }, milliseconds);
        </script>
    @endif
    @if (\Session::has('success'))
            {{-- <div class="alert alert-success  popupss" id="success-alert">
                <p>{{ \Session::get('success') }}</p>
                <div class="line"></div>
            </div> --}}
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <i class="fa-solid fa-circle-check" style="color: #3AA856;"></i></i>{{ \Session::get('success') }}
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
        <script>
            var milliseconds = 3000;
            setTimeout(function () {
                document.getElementById('success-alert').remove();
            }, milliseconds);
        </script>
    @endif
</div>