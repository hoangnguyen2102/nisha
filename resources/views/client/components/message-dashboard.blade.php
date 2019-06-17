<div class="message-box message-box-primary animated fadeIn" style="display:block;" id="message-box-primary">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span> {{ $title }}</div>
            <div class="mb-content">
                <p>{{ $content }}</p>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close" id="closeAlert" type="button">@lang('label.Close')</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('closeAlert').onclick = function () {
        document.getElementById('message-box-primary').style.display = "none";
    }
</script>