@if (session()->has('success'))
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="alert alert-success">
                {!! session()->get('success') !!}
            </div>
        </div>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        </div>
    </div>
    @endif