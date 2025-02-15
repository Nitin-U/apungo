<!-- right offcanvas -->
<div class="offcanvas offcanvas-end offcanvas-md" id="offcanvasRight"
     data-bs-focus="false"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasRightLabel">Create {{ $page }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-focus="false"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @include($view_path.'includes.form',['button' => 'Create'])
    </div>
</div>
