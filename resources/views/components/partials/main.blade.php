@props(['title','describe'])
<x-partials.bottom-header-area/>
<div class="blog-page area-padding">
    <div class="container">
        <div class="row">
            <x-partials.aside/>
            <!-- Start single blog -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-clear-fix/>
