<ul class="plain-nav-tabs nav nav-tabs js-enable-tab-url" id="component-1" role="tablist">
@if(auth()->guard('client')->user())
    <li class="nav-item">
        <a class="nav-link " data-toggle="tab" href="#component-1-1" role="tab" aria-controls="component-1-1" aria-selected="true"><strong>My Products</strong></a>
    </li>
    @endif
    <li class="nav-item active">
        <a class="nav-link" data-toggle="tab" href="#component-1-2" role="tab" aria-controls="component-1-2" aria-selected="false"><strong>All Products</strong></a>
    </li>
</ul>