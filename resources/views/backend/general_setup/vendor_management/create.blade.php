<!-- right offcanvas -->
<div class="offcanvas offcanvas-end offcanvas-lg" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasRightLabel">Create {{ $page }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
            @include($resource_path.'includes.form',['button' => 'Create'])
    </div>
</div>
