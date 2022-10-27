<a href="{{ route('producto', ['product'=> $p->id ]) }}" class="d-block card producto text-decoration-none">
    <div class="content-image position-relative"> 
        <span class="plus position-absolute">+</span>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product w-100" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product w-100">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text mb-0 fw-light">
            <span class="font-size-16 text-primary mb-3 d-block text-uppercase">{{ $p->name }}</span>
        </p>
    </div>
</a>