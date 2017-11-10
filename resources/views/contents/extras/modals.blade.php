<!--Modal: modalConfirmDelete-->
<div class="modal animated fadeIn" id="modalConfirm" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <div class="modal-content text-center">
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Are you sure?</p>
            </div>
            <div class="modal-body">
                <i class="fa fa-times fa-4x animated rotateIn"></i>
            </div>
            <div class="modal-footer flex-center">
                <a type="button" id="btnModalConfirmYes" class="btn btn-outline-secondary-modal waves-effect">Yes</a>
                <a type="button" id="btnModalConfirmNo" class="btn btn-primary-modal waves-effect btn-modal-confirm-no" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>
<!--Modal: modalConfirmDelete-->

<!--Modal: modalExpired-->
<div class="modal fade top" id="modalExpired" tabindex="-1" role="dialog" aria-labelledby="modalExpiredLabel" aria-hidden="true" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog modal-frame modal-bottom modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">

                    <p class="pt-3 pr-2">Please re-login to your existing account! </p>

                    <a href="{{ route('login') }}" type="button" class="btn btn-outline-secondary-modal waves-effect">Ok, thanks</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal: modalExpired-->