@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" style="width: 100%;" role="alert">
        <strong><i class="fas fa-check-circle"></i></strong> {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show mt-5" style="width: 100%;" role="alert">
        <strong><i class="fas fa-exclamation-triangle"></i></strong> {{ session()->get('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-5" style="width: 100%;" role="alert">
        <strong><i class="fas fa-exclamation-circle "></i></strong> {{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif