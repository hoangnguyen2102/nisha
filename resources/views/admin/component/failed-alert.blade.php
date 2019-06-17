<div class="message-box message-box-danger animated fadeIn" style="display:block;" id="message-box-danger">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span>{{ $title }}</div>
            <div class="mb-content">
                <p>{{ $content }}</p>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close" id="closeAlertFailed" type="button">@lang('label.Close')</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('closeAlertFailed').onclick = function () {
        console.log('hihi');
        document.getElementById('message-box-danger').style.display = "none";
    }
</script>